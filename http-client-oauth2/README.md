### OAuth2 (Open Authorization)

1. Definition

Example:
- https://developer.github.com/apps/building-oauth-apps/authorizing-oauth-apps/

```
OAuth2 (Open Autorization) :

Un protocol ou un standard qui permet a une application  A ( c'est a dire nous) 
de pouvoir se connecter a une apllication (B) et d' acceder a des informations suur une application B.
```

2. Steps 
```
GET https://github.com/login/oauth/authorize

Rediriger chez nous et on recuperer le "code"

POST https://github.com/login/oauth/access_token


Authorization: token OAUTH-TOKEN
GET https://api.github.com/user
```


3. Make User 
```
bin/console make:user 

 The name of the security user class (e.g. User) [User]:
 > User

 Do you want to store user data in the database (via Doctrine)? (yes/no) [yes]:
 > no

 Enter a property name that will be the unique "display" name for the user (e.g. email, username, uuid) [email]:
 > username

 Will this app need to hash/check user passwords? Choose No if passwords are not needed or will be checked/hashed by some other system (e.g. a single sign-on server).

 Does this app need to hash/check user passwords? (yes/no) [yes]:
 > no

 created: src/Security/User.php
 updated: src/Security/User.php
 created: src/Security/UserProvider.php
 updated: config/packages/security.yaml

           
  Success! 
           

 Next Steps:
   - Review your new App\Security\User class.
   - Open src/Security/UserProvider.php to finish implementing your user provider.
   - Create a way to authenticate! See https://symfony.com/doc/current/security.html

```


4. Make Auth
```
$ bin/console make:auth
```