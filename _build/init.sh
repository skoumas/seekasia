crontab -l > mycron
echo "* * * * * cd /var/www && /usr/local/bin/php artisan schedule:run && /usr/local/bin/php artisan queue:work >> /var/www/cronlog 2>&1" >> mycron
crontab mycron
rm mycron