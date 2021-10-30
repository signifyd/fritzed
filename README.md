# Fritzed, A Broken Web Application

Fritzed is an intentionally insecure web application, used for training on web application security.

# Installation

## Docker install

Clone the repository and build with:

```
cd fritzed
docker build -t fritzed .
```

To run:

```
docker run -p 8080:80 -d fritzed:latest
```

Fritzed will then be accessible at [http://localhost:8080/](http://localhost:8080).

## Manual install

### Requirements

* PHP 5.6 or higher (PHP 7 is recommended) 
* Either the pdo_sqlite or pdo_mysql database drivers

### Steps

1. Clone the repository
2. *Optional:* Install composer dependencies with `composer install`
3. *Optional:* Change the config settings in `app/config.php` 
4. Use a web server of your choice. Make sure you use the project's "app" Directory as root path.

   The easiest way is to use the PHP provided server:

```
cd app
php -S 127.0.0.1:80 -t .
```

# Reset

Fritzed allows you to reset the database to a default state, to start over training or testing from scratch. There are two ways to do this:

1. Click the bomb icon on the bottom of the page, then on the linked page trigger the reset
2. Request the path `/?reset=true`, the database will being reset without any prompts
