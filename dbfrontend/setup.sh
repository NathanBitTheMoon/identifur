#!/bin/bash
rm -rf /var/www/identifur-frontend/
cp ./apache/identifur-frontend.conf /etc/apache2/sites-available/identifur-frontend.conf
a2ensite identifur-frontend.conf
a2dissite 000-default.conf

if [ -d "/var/www/identifur-frontend" ]
then
    echo "Directory Exists"
else
    mkdir /var/www/identifur-frontend/
fi

cp -r html/* /var/www/identifur-frontend/

systemctl reload apache2