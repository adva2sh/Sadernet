You need to install:
1. xampp
2. composer

Then:
1. Put all files of the projects in c:\xampp\htdocs
2. Update db info in .env file
3. run in cmd in current directory:
    * composer install (no need?)
    * php artisan migrate:refresh --seed
4. change in php.ini the following values:
    post_max_size = 128M
    upload_max_filesize = 128M
5. Restart/Run xampp (apache and mysql servers)
6. Enter to 'localhost' in the browser