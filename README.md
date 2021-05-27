# Rambo v2

## Installation

First install the packages:
```
composer require angry-moustache/rambo
```

Then you'll want to publish the required assets, you can also publish the views and config file, but those are not required.
```
php artisan vendor:publish --tag=rambo-required-assets
```

After that run laravel migration to get the rambo specific tables and seed an administrator
```
php artisan migrate --seed
```

You can now log in on the `/admin` route, using the test user!
Username: admin
Password: test
