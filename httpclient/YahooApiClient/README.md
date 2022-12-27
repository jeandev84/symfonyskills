### Yahoo Api
- https://rapidapi.com/marketplace
- https://rapidapi.com/apidojo/api/yahoo-finance1


1. Installation
```
$ symfony new YahooApiClient --version=5.2
$ symfony composer require http-client doctrine make phpunit
$ composer require --dev dama/doctrine-test-bundle:*

$ symfony php bin/phpunit tests/StockTest.php

$ composer require --dev dama/doctrine-test-bundle

============================== MAKE TEST ===================================
$ symfony php bin/phpunit tests/StockTest.php

============================== MAKE ENTITY =================================
$ symfony console make:entity Stock

 Your entity already exists! So let's add some new fields!

 New property name (press <return> to stop adding fields):
 > symbol

 Field type (enter ? to see all types) [string]:
 > 

 Field length [255]:
 > 4

 Can this field be null in the database (nullable) (yes/no) [no]:
 > 

 updated: src/Entity/Stock.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 > currency

 Field type (enter ? to see all types) [string]:
 > 

 Field length [255]:
 > 3

 Can this field be null in the database (nullable) (yes/no) [no]:
 > 

 updated: src/Entity/Stock.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 > exchangeName

 Field type (enter ? to see all types) [string]:
 > 

 Field length [255]:
 > 30

 Can this field be null in the database (nullable) (yes/no) [no]:
 > 

 updated: src/Entity/Stock.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 > price

 Field type (enter ? to see all types) [string]:
 > ?

Main types
  * string
  * text
  * boolean
  * integer (or smallint, bigint)
  * float

Relationships / Associations
  * relation (a wizard 🧙 will help you build the relation)
  * ManyToOne
  * OneToMany
  * ManyToMany
  * OneToOne

Array/Object Types
  * array (or simple_array)
  * json
  * object
  * binary
  * blob

Date/Time Types
  * datetime (or datetime_immutable)
  * datetimetz (or datetimetz_immutable)
  * date (or date_immutable)
  * time (or time_immutable)
  * dateinterval

Other Types
  * ascii_string
  * decimal
  * guid


 Field type (enter ? to see all types) [string]:
 > decimal

 Precision (total number of digits stored: 100.00 would be 5) [10]:
 > 

 Scale (number of decimals to store: 100.00 would be 2) [0]:
 > 2

 Can this field be null in the database (nullable) (yes/no) [no]:
 > 

 updated: src/Entity/Stock.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 > priceChange

 Field type (enter ? to see all types) [string]:
 > decimal

 Precision (total number of digits stored: 100.00 would be 5) [10]:
 > 

 Scale (number of decimals to store: 100.00 would be 2) [0]:
 > 2

 Can this field be null in the database (nullable) (yes/no) [no]:
 > yes

 updated: src/Entity/Stock.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 > previousClose

 Field type (enter ? to see all types) [string]:
 > decimal

 Precision (total number of digits stored: 100.00 would be 5) [10]:
 > 

 Scale (number of decimals to store: 100.00 would be 2) [0]:
 > 2

 Can this field be null in the database (nullable) (yes/no) [no]:
 > yes

 updated: src/Entity/Stock.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 > region

 Field type (enter ? to see all types) [string]:
 > 

 Field length [255]:
 > 3

 Can this field be null in the database (nullable) (yes/no) [no]:
 > 

 updated: src/Entity/Stock.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 > shortName

 Field type (enter ? to see all types) [string]:
 > 

 Field length [255]:
 > 30

 Can this field be null in the database (nullable) (yes/no) [no]:
 > yes

 updated: src/Entity/Stock.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 > 


           
  Success! 
           

```


2. Testing API Client
```php 
$ symfony php bin/phpunit tests/StockTest.php
$ symfony php bin/phpunit tests/feature/RefreshStockProfileCommandTest.php
$ symfony php bin/phpunit tests/integration/YahooFinanceApiClientTest.php
$ symfony php bin/phpunit tests/feature/RefreshStockProfileCommandTest.php
$ symfony php bin/phpunit tests/feature
$ symfony php bin/phpunit tests/integration
$ symfony php bin/phpunit tests/ --exclude-group integration
$ symfony php bin/phpunit tests  --exclude-group integration



/*
return [
  'statusCode'        => 200,
  'content'           => json_encode([
      'symbol'        => 'AMZN',
      'shortName'     => 'Amazon.com, Inc.',
      'region'        => 'US',
      'exchangeName'  => 'NasdaqGS',
      'currency'      => 'USD',
      'price'         => 100.50,
      'previousClose' => 110.20,
      'priceChange'   => - 9.70
  ])
];

return [
 'statusCode' => 200,
 'content'    => json_encode($stockProfileAsArray)
];
*/

```



3. Docker 
```php 

$ docker compose up -d
$ docker compose ps

$ symfony console make:migration
$ symfony console doctrine:migrations:migrate

```


4. Lunch Command RefreshStockProfile
```
Symbol: AMZN, Region: US
$ symfony console app:refresh-stock-profile AMZN US
$ symfony console app:refresh-stock-profile AMZN US
$ symfony console app:refresh-stock-profile TSLA US
$ symfony php bin/phhunit tests/features/RefreshStockProfileCommandTest.php  --filter 
the_refresh_stock_profile_command_behaves_correctly_when_a_stock_record_does_not_exist
```


5. CLEAR TEST CACHE & TESTING APP
```php 
$ APP_ENV=test symfony console cache:clear
$ symfony php bin/phhunit tests/features/RefreshStockProfileCommandTest.php  --filter 
the_refresh_stock_profile_command_behaves_correctly_when_a_stock_record_does_not_exist

$ symfony php bin/phpunit tests/
$ symfony php bin/phpunit tests/ --group integration

```

6. Store / Update Records via command
```php 
$ symfony console app:refresh-stock-profile AMZN US
$ symfony console app:refresh-stock-profile FOOBAR US (Return response code !== 200)
```


7. Install Monolog (For Capture Exception or Logging Error Message | Notification)
```php 
$ symfony composer require monolog

$ symfony console app:refresh-stock-profile FOOBAR US

Error LOG to ./var/log/dev.log
```