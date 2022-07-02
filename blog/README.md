# How To Run


Update the dependencies
```
composer update
```

Copy the Environment file from example
```
cp .env.example .env
```

Update the Laravel Key App
```
php artisan key:generate
```

### Before go to next step, please change the configuration of database in .env file

Seeding databases
```
php artisan migrate --seed
```

Test the app
```
php artisan test
```

Run the app in Development server
```
php artisan serve
```

# All Done
