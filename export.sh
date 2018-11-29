#Rename prod to .env and .env to test
mv .env .env.test
mv .env.prod .env

#Zip files
zip -r prod.zip .ebextensions app bootstrap config database public resources routes storage .env .gitattributes .gitignore artisan composer.json composer.lock package-lock.json package.json phpunit.xml server.php webpack.mix.js
zip -d prod.zip ".ebextensions/my-scripts.config"

#Rename .env back to prod and test to env
mv .env .env.prod
mv .env.test .env
