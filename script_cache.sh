sudo chmod -R 777 /media/www-data/XarrMatt/app/cache
sudo rm -rf /media/www-data/XarrMatt/app/cache
app/console cache:clear --env=dev
app/console cache:clear --env=prod
sudo chmod -R 777 /media/www-data/XarrMatt/app/cache