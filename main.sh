# composer require phpunit/phpunit
composer install;
composer dump-autoload

# pffft its not like i wont remember the syntax
# also change localhost to 0.0.0.0 to listen on all interfaces
# this is an apache free household`
php -S 127.0.0.1:8000 -t public
