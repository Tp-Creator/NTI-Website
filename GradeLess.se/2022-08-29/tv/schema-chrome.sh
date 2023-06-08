#!/bin/bash
#
# CRON: 5 6-18 * * * /var/www/html/test/schema.sh
#test $DEBUG=true && set -x
cd /var/www/html/tv/schema || exit 1

klasser="IT20:62440 IT21:62441 IT22:62443 TE20:62460 TE21:62428 TE22:62431"
week=$(date +%W)
url="https://sms.schoolsoft.se/nti/jsp/public/right_public_schedule.jsp?school=ntisollentuna"
datestamp=$(date +%Y%m%d%H%M%S)
chromecmd_dom="google-chrome --headless --disable-gpu --dump-dom "
#chromecmd="google-chrome --headless --disable-gpu --hide-scrollbars --window-size=1024,2550 --screenshot="
#chromecmd="google-chrome --headless --disable-gpu --hide-scrollbars --window-size=2550,2550 --screenshot="
chromecmd="google-chrome --headless --disable-gpu --hide-scrollbars --window-size=2550,1080 --screenshot="

pkill -U op google-chrome
sleep 3 

#firefox -headless -screenshot schema-HA18-pre.png ${url}\&class=35018\&term=${week} 2>/dev/null
#firefox -headless -screenshot schema-HA19-pre.png ${url}\&class=42617\&term=${week} 2>/dev/null

for klass in ${klasser}
do
	k=$(echo $klass|cut -d ":" -f 1)
	c=$(echo $klass|cut -d ":" -f 2)
	f="schema-${k}-pre.png"
	#tmpurl="${url}&class=42617&term=${week}"

	#${chromecmd_dom} ${url}\&class=${c}\&term=${week} > schema-${k}-pre.html 2>/dev/null
	#sleep 2
	${chromecmd}${f} ${url}\&class=${c}\&term=${week} 2>/dev/null
	sleep 60
done

for klass in ${klasser}
do
	k=$(echo $klass|cut -d ":" -f 1)
	c=$(echo $klass|cut -d ":" -f 2)
	f="schema-${k}-pre.png"

	test -f schema-${k}-trim.png && rm schema-${k}-trim.png
	convert schema-${k}-pre.png -trim schema-${k}-trim.png

	test -f schema-${k}-chop.png && rm schema-${k}-chop.png
	convert schema-${k}-trim.png -gravity North -chop 1x36 schema-${k}-chop.png

	#test -f schema-${k}-sharp.png && rm schema-${k}-sharp.png
	#convert schema-${k}-chop.png -sharpen "0x1.0" schema-${k}-charp.png

	#test -f schema-${k}-resize.png && rm schema-${k}-resize.png
	#convert schema-${k}-chop.png -resize "630x" schema-${k}-resize.png

	#cp -p schema-${k}-charp.png schema-${k}-${datestamp}.png
	cp -p schema-${k}-chop.png schema-${k}-${datestamp}.png
	
	chmod 755 schema-${k}-${datestamp}.png
	
	ln -sf schema-${k}-${datestamp}.png schema-${k}-today.png

done

chmod 755 schema-*.png

#find . -name 'schema-*.png' -mmin +180 -delete >/dev/null 
