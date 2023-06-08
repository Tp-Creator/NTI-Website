#!/bin/bash
#
# CRON: 5 6-18 * * * /var/www/html/test/schema.sh
set -x
cd /var/www/html/tv/schema || exit 1

klasser="HA19 IT19 IT20 IT21 TE19 TE20 TE21"
week=$(date +%W)
url="https://sms.schoolsoft.se/nti/jsp/public/right_public_schedule.jsp?school=ntisollentuna"
datestamp=$(date +%Y%m%d%H%M%S)
chromecmd="google-chrome --headless --disable-gpu --dump-dom "

pkill -U op firefox
sleep 3 

#firefox -headless -screenshot schema-HA18-pre.png ${url}\&class=35018\&term=${week} 2>/dev/null
firefox -headless -screenshot schema-HA19-pre.png ${url}\&class=42617\&term=${week} 2>/dev/null

#tmpurl="${url}&class=42617&term=${week}"

${chromecmd} ${url}\&class=42617\&term=${week} > schema-HA19-pre.html

#firefox -headless -screenshot schema-IT18-pre.png ${url}\&class=38267\&term=${week} 2>/dev/null
firefox -headless -screenshot schema-IT19-pre.png ${url}\&class=42616\&term=${week} 2>/dev/null
firefox -headless -screenshot schema-IT20-pre.png ${url}\&class=49139\&term=${week} 2>/dev/null
firefox -headless -screenshot schema-IT21-pre.png ${url}\&class=54991\&term=${week} 2>/dev/null

#firefox -headless -screenshot schema-TE18-pre.png ${url}\&class=35019\&term=${week} 2>/dev/null
firefox -headless -screenshot schema-TE19-pre.png ${url}\&class=42618\&term=${week} 2>/dev/null
firefox -headless -screenshot schema-TE20-pre.png ${url}\&class=49138\&term=${week} 2>/dev/null
firefox -headless -screenshot schema-TE21-pre.png ${url}\&class=54992\&term=${week} 2>/dev/null


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
