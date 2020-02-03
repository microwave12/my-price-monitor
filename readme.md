# Fabelio Price Monitor App

Dashboard for monitoring your product price from [Fabelio](https://fabelio.com/) product page.

## Specifications

- Laravel Framework v5.4
- PHP 5.6
- MariaDB 10.2

## Installation

Install [Git](https://git-scm.com/downloads) and [Composer](https://getcomposer.org/download/) into your local system. Then simply clone this project.
```
git clone https://github.com/microwave12/my-price-monitor.git
```

Jump inside the project directory `cd my-price-monitor` and run `composer install` to load the missing dependencies.
Export the `crawler.sql` database file to your `MySQL`/`MariaDB` database server.  

Ensure that your PHP is support `cURL` to `HTTPS/SSL` protocol.

## How to Run, Setup Scheduler & Unit Testing
__CMD/Terminal :__  
Run & Unit Testing the application via CMD/Terminal.

###### Run :
```
php -S 127.0.0.1:8080 -t public
```
Or you can directly run the application via `Nginx`/`PHP Apache` server.  
Access the dashboard at `http://127.0.0.1:8080/page`. Only fabelio product detail page is allowed to submit.

###### Setup Scheduler :
Scheduler is used to run your submitted product link in order to update it's image, current price and description every hour from the time the link was submitted. Simply you can run this command `php artisan schedule:run` to run the scheduled task or you can automate jobs by using `sudo crontab -e` in `Linux` server. This will open the server Crontab file, paste the code below into the file, save and then exit.
```
* * * * * cd /your/application/folder && php artisan schedule:run
```

###### Unit Testing :
```
vendor\bin\phpunit
```

###### Live Demo :
You can directly access the dashboard deployed into my own VPS server at given link below :
```
http://149.28.149.134/page
```
