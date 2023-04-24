#!/bin/bash

git pull
systemctl restart httpd

# Run python files
python python/schoolfood.py