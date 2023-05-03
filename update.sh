#!/bin/bash

seconds_per_hour=3600
while true
do
    pacman -Syu

    # git pull
    # systemctl restart httpd

    # Run python files
    python python/schoolfood.py


    # Wait aproximatly 24 hours before running the loop again
    seconds_after_midnight=$(($(date -u +%s) % (seconds_per_hour*24) + (seconds_per_hour*2)))
    sleep $secondsPerHour*25 - $seconds_after_midnight
done