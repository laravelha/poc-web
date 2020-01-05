# Laravelha POC
Proof of concept to preset-web and generator commands

## Screenshots

![Welcome](/public/images/welcome.jpeg)
![Index](/public/images/index.jpeg)
![Show](/public/images/show.jpeg)

## How to reproduce?
1. install laravel fresh app
```shell script
composer create-project --prefer-dist laravel/laravel poc-web && cd poc-web
```
2. Install laravelha/preset-web
```shell script
composer require laravelha/preset-web
```
3. Run preset
```shell script
php artisan preset ha-web
```
4. Install and run assets
```shell script
npm install && npm run dev
```

5. Install laravelha/generator
```shell script
composer require laravelha/generator
```

4. Publish laravelha generator config file
```shell script
php artisan vendor:publish --tag=ha-generator
```

## The following generators commands were executed:
```shell script
php artisan ha-generator:crud Category -s 'title:string(150), description:text:nullable, published_at:timestamp:nullable'
```

## Run migrations and factories
After set database in .env
```shell script
php artisan migrate
```
Run tinker and factory create
```shell script
php artisan tinker

factory(\App\Category::class, 50)->create();  
```

> This project use Tableable see about on [laravelha/suppot](https://github.com/laravelha/support) 
