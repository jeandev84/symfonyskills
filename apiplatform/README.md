### EasyAdmin and APIPlatform

1. Install project symfony
```php 
$ symfony new ./apiplatform  --full --version=5.0.1
$ symfony new --dir=apiplatform  --full --version=5.0.1

OR 

$ composer create-project symfony/website-skeleton:"^5.0.1" ./apiplatform
```


2.Install Easy admin (3)
```php 
$ composer require easycorp/easyadmin-bundle:"^2.3"
$ composer require admin

$ bin/console server:start

Browse your admin here :
http://localhost:<port>/admin
config
```

3. Install API Platform
```php 
$ composer require api

Browse your api here :
http://localhost:<port>/api


$ composer require --dev api-platform/schema-generator

https://developers.google.com/search/docs/appearance/structured-data/product

$ touch ./config/schema.yaml

./config/schema.yaml

types:
   Product:
      properties:
          name: { nullable: false }
          description: { nullable: false }
          image: { range: "Text" }

   Offer:
      properties:
          url: { nullable: false }
          price: { nullable: false, range: "Number" }
          priceCurrency: { nullable: false }
          
        
======================================================================  
https://api-platform.com/docs/schema-generator/
Generate entities .src/Entity/... :
$ vendor/bin/schema generate  src/ config/schema.yaml

.env
DATABASE_URL="mysql://brown:secret123456@127.0.0.1:3306/apiplatform?serverVersion=8&charset=utf8mb4"

$ bin/console doctrine:database:create
Created database `apiplatform` for connection named default

./config/packages/easy_admin.yaml
easy_admin:
    entities:
      # List the entity class name you want to manage
      - App\Entity\Product
      - App\Entity\Offer
      

$ bin/console doctrine:schema:update --force

Generate dashboard

$ bin/console make:admin:dashboard

http://localhost:<port>/admin
```


4. Install vich/uploader-bundle
```php 
$ composer require vich/uploader-bundle
```