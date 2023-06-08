#!/bin/bash
#
# CRON: 5 6-18 * * * /var/www/html/test/schema.sh

cd /var/www/html/tv-klara/schema || exit 1

klasser="EK19 NA19 SA19 EK20 NA20 SA20 EK21 NA21 SA21"
week=$(date +%W)
url="https://sms.schoolsoft.se/klaragymnasium/jsp/public/right_public_schedule.jsp?school=klarasol"
datestamp=$(date +%Y%m%d%H%M%S)

pkill -U op firefox
sleep 42

firefox -headless -screenshot schema-EK19-pre.png ${url}\&class=13272\&term=${week} 2>/dev/null
firefox -headless -screenshot schema-NA19-pre.png ${url}\&class=13328\&term=${week} 2>/dev/null
firefox -headless -screenshot schema-SA19-pre.png ${url}\&class=13271\&term=${week} 2>/dev/null

firefox -headless -screenshot schema-EK20-pre.png ${url}\&class=14156\&term=${week} 2>/dev/null
firefox -headless -screenshot schema-NA20-pre.png ${url}\&class=14157\&term=${week} 2>/dev/null
firefox -headless -screenshot schema-SA20-pre.png ${url}\&class=14158\&term=${week} 2>/dev/null

firefox -headless -screenshot schema-EK21-pre.png ${url}\&class=16794\&term=${week} 2>/dev/null
firefox -headless -screenshot schema-NA21-pre.png ${url}\&class=16796\&term=${week} 2>/dev/null
firefox -headless -screenshot schema-SA21-pre.png ${url}\&class=16795\&term=${week} 2>/dev/null



for klass in ${klasser}
do
	test -f schema-${klass}-trim.png && rm schema-${klass}-trim.png
	convert schema-${klass}-pre.png -trim schema-${klass}-trim.png

	test -f schema-${klass}-chop.png && rm schema-${klass}-chop.png
	convert schema-${klass}-trim.png -gravity North -chop 1x40 schema-${klass}-chop.png

	#test -f schema-${klass}-sharp.png && rm schema-${klass}-sharp.png
	#convert schema-${klass}-chop.png -sharpen "0x1.0" schema-${klass}-charp.png

	#test -f schema-${klass}-resize.png && rm schema-${klass}-resize.png
	#convert schema-${klass}-chop.png -resize "630x" schema-${klass}-resize.png

	#cp -p schema-${klass}-charp.png schema-${klass}-${datestamp}.png
	cp -p schema-${klass}-chop.png schema-${klass}-${datestamp}.png
	
	chmod 755 schema-${klass}-${datestamp}.png
	
	ln -sf schema-${klass}-${datestamp}.png schema-${klass}-today.png

done


chmod 755 schema-*.png

find . -name 'schema-*.png' -mmin +180 -delete >/dev/null 
