#!/usr/bin/python
#wp-install.py
#Script to auto install WordPress
#Compatible with Python 2.x
#Author: Damian Ciszak
#Contact: ciszakdamian(AT)gmail.com

import os

conf = []
with open('wp-set.txt') as f:
    conf = f.read().splitlines()

wp_dbname = conf[0]
wp_dbuser = conf[1]
wp_dbpass = conf[2]
wp_dbhost = conf[3]
wp_locale = "pl_PL"
wp_dir = conf[4]
check_conf = conf[5]
wp_url = conf[6]
wp_title = conf[7]
wp_admin = conf[8]
wp_pass = conf[9]
wp_email = conf[10]

os.mkdir(wp_dir)
os.chdir(wp_dir)

os.system("wp --allow-root core download --locale=\""+wp_locale+"\"")
os.system("wp --allow-root core config --dbname=\""+wp_dbname+"\" --dbuser=\""+wp_dbuser+"\" --dbpass=\""+wp_dbpass+"\" --dbhost=\""+wp_dbhost+"\" --dbprefix=\"wp_\"")

if int(check_conf) == 1:
    os.system("wp --allow-root core install --url=\""+wp_url+"\" --title=\""+wp_title+"\" --admin_user=\""+wp_admin+"\" --admin_password=\""+wp_pass+"\" --admin_email=\""+wp_email+"\"")
