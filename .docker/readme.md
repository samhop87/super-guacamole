# Composer
Custom image built which loads an SSH key in in order to access NM packages.

Running composer:

```
docker-compose run --rm composer install
```

# Artisan
Run the following command to run an artisan command

```
docker-compose run --rm app php artisan
```

# Run Site
Run the following command to bring the docker services up
```
docker-compose up -d
```

# Run Tests
Run the following command to run phpunit tests
```
docker-compose run --rm app vendor/bin/phpunit
```

# Docker Manual Entry
https://admin.netmatters.co.uk/manual.php?mancat=77368
