### CONSOLE COMMANDS

```php 
$ bin/console app:update-stock
$ docker compose up -d
$ symfony console list
$ symfony console make:entity --help
Description:
  Creates or updates a Doctrine entity class, and optionally an API Platform resource

Usage:
  make:entity [options] [--] [<name>]

Arguments:
  name                  Class name of the entity to create or update (e.g. VictoriousPizza)

Options:
  -a, --api-resource    Mark this class as an API Platform resource (expose a CRUD API for it)
  -b, --broadcast       Add the ability to broadcast entity updates using Symfony UX Turbo?
      --regenerate      Instead of adding new fields, simply generate the methods (e.g. getter/setter) for existing fields
      --overwrite       Overwrite any existing getter/setter methods
  -h, --help            Display help for the given command. When no command is given display help for the list command
  -q, --quiet           Do not output any message
  -V, --version         Display this application version
      --ansi|--no-ansi  Force (or disable --no-ansi) ANSI output
  -n, --no-interaction  Do not ask any interactive question
  -e, --env=ENV         The Environment name. [default: "dev"]
      --no-debug        Switch off debug mode.
  -v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Help:
  The make:entity command creates or updates an entity and repository class.
  
  php bin/console make:entity BlogPost
  
  If the argument is missing, the command will ask for the entity class name interactively.
  
  You can also mark this class as an API Platform resource. A hypermedia CRUD API will
  automatically be available for this entity class:
  
  php bin/console make:entity --api-resource
  
  Symfony can also broadcast all changes made to the entity to the client using Symfony
  UX Turbo.
  
  php bin/console make:entity --broadcast
  
  You can also generate all the getter/setter/adder/remover methods
  for the properties of existing entities:
  
  php bin/console make:entity --regenerate
  
  You can also *overwrite* any existing methods:
  
  php bin/console make:entity --regenerate --overwrite
  
=============================================================================================
       MAKE ENTITY
=============================================================================================

$ symfony console make:entity StockItem


 created: src/Entity/StockItem.php
 created: src/Repository/StockItemRepository.php
 
 Entity generated! Now let's add some fields!
 You can always add more fields later manually or by re-running this command.

 New property name (press <return> to stop adding fields):
 > itemNumber

 Field type (enter ? to see all types) [string]:
 > 

 Field length [255]:
 > 

 Can this field be null in the database (nullable) (yes/no) [no]:
 > 

 updated: src/Entity/StockItem.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 > itemName

 Field type (enter ? to see all types) [string]:
 > 

 Field length [255]:
 > 

 Can this field be null in the database (nullable) (yes/no) [no]:
 > 

 updated: src/Entity/StockItem.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 > itemDescription

 Field type (enter ? to see all types) [string]:
 > ?

Main Types
  * string
  * text
  * boolean
  * integer (or smallint, bigint)
  * float

Relationships/Associations
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
 > text

 Can this field be null in the database (nullable) (yes/no) [no]:
 > yes

 updated: src/Entity/StockItem.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 > supplierCost

 Field type (enter ? to see all types) [string]:
 > decimal

 Precision (total number of digits stored: 100.00 would be 5) [10]:
 > 

 Scale (number of decimals to store: 100.00 would be 2) [0]:
 > 2

 Can this field be null in the database (nullable) (yes/no) [no]:
 > 

 updated: src/Entity/StockItem.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 > price

 Field type (enter ? to see all types) [string]:
 > decimal

 Precision (total number of digits stored: 100.00 would be 5) [10]:
 > 

 Scale (number of decimals to store: 100.00 would be 2) [0]:
 > 2

 Can this field be null in the database (nullable) (yes/no) [no]:
 > 

 updated: src/Entity/StockItem.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 > 


           
  Success! 
           

 Next: When you're ready, create a migration with php bin/console make:migration

==========================================================================================

$ symfony console make:migration
$ symfony console doctrine:migrations:migrate

$ symfony console app:update-stock 0 2020-09-24
```