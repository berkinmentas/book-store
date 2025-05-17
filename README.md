
## Installation

```php
# Create new key

php artisan key:generate

# Run database migrations
php artisan migrate

# Create a symbolic link for storage
php artisan storage:link

# Seed the database with initial data
php artisan db:seed
```

## Database Example

```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

## Run

```php
php artisan serve
```
