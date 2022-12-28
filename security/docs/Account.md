### ACCOUNT 

1. Make Entity "Account" 
```
$ symfony console make:entity Account

 created: src/Entity/Account.php
 created: src/Repository/AccountRepository.php
 
 Entity generated! Now let's add some fields!
 You can always add more fields later manually or by re-running this command.

 New property name (press <return> to stop adding fields):
 > balance

 Field type (enter ? to see all types) [string]:
 > float

 Can this field be null in the database (nullable) (yes/no) [no]:
 > 

 updated: src/Entity/Account.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 > accountHolder

 Field type (enter ? to see all types) [string]:
 > ManyToOne

 What class should this entity be related to?:
 > User

 Is the Account.accountHolder property allowed to be null (nullable)? (yes/no) [yes]:
 > no

 Do you want to add a new property to User so that you can access/update Account objects from it - e.g. $user->getAccounts()? (yes/no) [yes]:
 > no

 updated: src/Entity/Account.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 > accountManager

 Field type (enter ? to see all types) [string]:
 > OneToOne

 What class should this entity be related to?:
 > User

 Is the Account.accountManager property allowed to be null (nullable)? (yes/no) [yes]:
 > no

 Do you want to add a new property to User so that you can access/update Account objects from it - e.g. $user->getAccount()? (yes/no) [no]:
 > no

 updated: src/Entity/Account.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 > 


           
  Success! 
           

 Next: When you're ready, create a migration with php bin/console make:migration

```

2. Make Migration 
```
$ bin/console make:migration or symfony console make:migration
$ symfony console doctrine:migrations:migrate
```



3. Make a Voter 
```
$ symfony console make:voter

 The name of the security voter class (e.g. BlogPostVoter):
 > AccountVoter

 created: src/Security/Voter/AccountVoter.php

           
  Success! 
           

 Next: Open your voter and add your logic.

```