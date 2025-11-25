# this is a simple php project to practice testing code with phpunits

## install dependecies on debian
```sh
apt install composer php-sqlite3
```
## install this php libraries
```sh
composer install
```
## start the website
```sh
# runs on http://localhost:8080/
./main.sh
```
## run the tests 
```sh
./runTests.sh
```
## How to add more tests
```php
/*
  add another function to the "myTest" class in the tests/myTest.php file
  function name must start with test so phpunits runs it
*/
public function testCoolness(){
    $this->assertTrue(PHP_OS=="Linux");
}
```
