### OAuth2 

- https://github.com/knpuniversity/oauth2-client-bundle
- https://github.com/thephpleague/oauth2-github (from "https://github.com/knpuniversity/oauth2-client-bundle")
- https://docs.github.com/en/developers/apps/building-oauth-apps/authorizing-oauth-apps
- https://docs.github.com/en/rest/repos/repos?apiVersion=2022-11-28#list-repositories-for-the-authenticated-user
- https://github.com/settings (Configure application name)


0. Install Oauth Bundle
```
$ composer require knpuniversity/oauth2-client-bundle
$ composer require league/oauth2-github
```


1. Configure .env
```
###> OAUTH2 ###
GITHUB_ID=YourGithubClientID
GITHUB_SECRET=YourGithubClientSecret
###< OAUTH2 ###
```


2. Make User 
``` 
$ bin/console make:user

 The name of the security user class (e.g. User) [User]:
 > 

 Do you want to store user data in the database (via Doctrine)? (yes/no) [yes]:
 > 

 Enter a property name that will be the unique "display" name for the user (e.g. email, username, uuid) [email]:
 > 

 Will this app need to hash/check user passwords? Choose No if passwords are not needed or will be checked/hashed by some other system (e.g. a single sign-on server).

 Does this app need to hash/check user passwords? (yes/no) [yes]:
 > 

 created: src/Entity/User.php
 created: src/Repository/UserRepository.php
 updated: src/Entity/User.php
 updated: config/packages/security.yaml

           
  Success! 
           

 Next Steps:
   - Review your new App\Entity\User class.
   - Use make:entity to add more fields to your User entity and then run make:migration.
   - Create a way to authenticate! See https://symfony.com/doc/current/security.html

```


3. Make Auth 
```
$ bin/console make:auth

What style of authentication do you want? [Empty authenticator]:
  [0] Empty authenticator
  [1] Login form authenticator
 > 1

 The class name of the authenticator to create (e.g. AppCustomAuthenticator):
 > AppAuthenticator

 Choose a name for the controller class (e.g. SecurityController) [SecurityController]:
 > 

 Do you want to generate a '/logout' URL? (yes/no) [yes]:
 > 

 created: src/Security/AppAuthenticator.php
 updated: config/packages/security.yaml
 created: src/Controller/SecurityController.php
 created: templates/security/login.html.twig

           
  Success! 
           

 Next:
 - Customize your new authenticator.
 - Finish the redirect "TODO" in the App\Security\AppAuthenticator::onAuthenticationSuccess() method.
 - Review & adapt the login template: templates/security/login.html.twig.

```


4. Modiifier Entity "User" add new property "githubId"
```
$ bin/console make:entity User

 What style of authentication do you want? [Empty authenticator]:
  [0] Empty authenticator
  [1] Login form authenticator
 > 1

 The class name of the authenticator to create (e.g. AppCustomAuthenticator):
 > AppAuthenticator

 Choose a name for the controller class (e.g. SecurityController) [SecurityController]:
 > 

 Do you want to generate a '/logout' URL? (yes/no) [yes]:
 > 

 created: src/Security/AppAuthenticator.php
 updated: config/packages/security.yaml
 created: src/Controller/SecurityController.php
 created: templates/security/login.html.twig

           
  Success! 
           

 Next:
 - Customize your new authenticator.
 - Finish the redirect "TODO" in the App\Security\AppAuthenticator::onAuthenticationSuccess() method.
 - Review & adapt the login template: templates/security/login.html.twig.
yao@pc-gaming:~/Desktop/webprojects/symfonyskills/oauth2social$ clear
yao@pc-gaming:~/Desktop/webprojects/symfonyskills/oauth2social$ bin/console make:entity User

 Your entity already exists! So let's add some new fields!

 New property name (press <return> to stop adding fields):
 > githubId

 Field type (enter ? to see all types) [integer]:
 > string

 Field length [255]:
 > 

 Can this field be null in the database (nullable) (yes/no) [no]:
 > yes

 updated: src/Entity/User.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 > 


           
  Success! 
           

 Next: When you're ready, create a migration with php bin/console make:migration

```


5. Make Migratiion 
```
$ bin/console make:migration 

 Success! 
           
Next: Review the new migration "migrations/Version20230204114410.php"
Then: Run the migration with php bin/console doctrine:migrations:migrate
See https://symfony.com/doc/current/bundles/DoctrineMigrationsBundle/index.html
```



6. Migrate 
```
$ bin/console doctrine:migrations:migrate

 WARNING! You are about to execute a migration in database "main" that could result in schema changes and data loss. Are you sure you wish to continue? (yes/no) [yes]:
 > yes

[notice] Migrating up to DoctrineMigrations\Version20230204114410
[notice] finished in 20.2ms, used 20M memory, 1 migrations executed, 2 sql queries
```


7. Open Login Page 
```
http://localhost:8000/login
```