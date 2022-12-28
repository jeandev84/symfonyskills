### SYMFONY SECURITY

- https://symfony.com/doc/5.4/security.html
- https://getbootstrap.com/docs/5.0/getting-started/introduction/
- https://www.toptal.com/developers/gitignore [ Use this link for generate good .gitignore ]

1. Installation dependencies
```
$ composer require security annotations doctrine maker
$ composer require --dev web-profiler
```


2. Make Authenticable User
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


3.DEBUG CONFIGURATION 'security'
```
DEBUG SECURITY CONFIG
=======================================================================
bin/console debug:config security

Current configuration for extension with alias "security"
=========================================================

security:
    enable_authenticator_manager: true
    password_hashers:
        Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface:
            algorithm: auto
            migrate_from: {  }
            hash_algorithm: sha512
            key_length: 40
            ignore_case: false
            encode_as_base64: true
            iterations: 5000
            cost: null
            memory_cost: null
            time_cost: null
    providers:
        app_user_provider:
            entity:
                class: App\Entity\User
                property: email
                manager_name: null
    firewalls:
        dev:
            pattern: ^/(_(profiler|wdt)|css|images|js)/
            security: false
            methods: {  }
            user_checker: security.user_checker
            stateless: false
            lazy: false
            required_badges: {  }
        main:
            lazy: true
            provider: app_user_provider
            methods: {  }
            security: true
            user_checker: security.user_checker
            stateless: false
            required_badges: {  }
    access_control: {  }
    encoders:
        Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface:
            algorithm: auto
            migrate_from: {  }
            hash_algorithm: sha512
            key_length: 40
            ignore_case: false
            encode_as_base64: true
            iterations: 5000
            cost: null
            memory_cost: null
            time_cost: null
    access_denied_url: null
    session_fixation_strategy: migrate
    hide_user_not_found: true
    always_authenticate_before_granting: false
    erase_credentials: true
    access_decision_manager:
        allow_if_all_abstain: false
        allow_if_equal_granted_denied: true
    role_hierarchy: {  }
==============================================================================

```


4. Configuration ./config/packages/security.yaml 
```
security:
    encoders:
        App\Entity\User:
            # Use native password encoder
            # This value auto-selects the best possible hashing algorith
            # (i.e. Sodium when available)
            algorithm: auto
            
    enable_authenticator_manager: true
    # https://symfony.com/doc/current/security.html#registering-the-user-hashing-passwords
    password_hashers:
        Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface: 'auto'
    # https://symfony.com/doc/current/security.html#loading-the-user-the-user-provider
    providers:
        # used to reload user from session & other features (e.g. switch_user)
        app_user_provider:
            entity:
                class: App\Entity\User
                property: email
    firewalls:
        dev:
            pattern: ^/(_(profiler|wdt)|css|images|js)/
            security: false
        main:
            lazy: true
            provider: app_user_provider

            # activate different ways to authenticate
            # https://symfony.com/doc/current/security.html#the-firewall

            # https://symfony.com/doc/current/security/impersonating_user.html
            # switch_user: true

    # Easy way to control access for large sections of your site
    # Note: Only the *first* access control that matches will be used
    access_control:
        # - { path: ^/admin, roles: ROLE_ADMIN }
        # - { path: ^/profile, roles: ROLE_USER }

when@test:
    security:
        password_hashers:
            # By default, password hashers are resource intensive and take time. This is
            # important to generate secure password hashes. In tests however, secure hashes
            # are not important, waste resources and increase test times. The following
            # reduces the work factor to the lowest possible values.
            Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface:
                algorithm: auto
                cost: 4 # Lowest possible value for bcrypt
                time_cost: 3 # Lowest possible value for argon
                memory_cost: 10 # Lowest possible value for argon

```


5. Make Migration 
```
$ bin/console make:migration
$ bin/console doctrine:migrations:migrate

========================================================
ENCODE PASSWORD VIA SYMFONY CONSOLE
========================================================

$ symfony console security:encode-password

Symfony Password Encoder Utility
================================


 For which user class would you like to encode a password? [App\Entity\User]:
  [0] App\Entity\User
  [1] Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface
 > 0

 Type in your password to be encoded:
 > forExample123

                                                                                                                        
 [ERROR] The password must not be empty.                                                                                
                                                                                                                        

 Type in your password to be encoded:
 > 

 ------------------ --------------------------------------------------------------------------------------------------- 
  Key                Value                                                                                              
 ------------------ --------------------------------------------------------------------------------------------------- 
  Encoder used       Symfony\Component\Security\Core\Encoder\MigratingPasswordEncoder                                   
  Encoded password   $argon2id$v=19$m=65536,t=4,p=1$qfaJlZncEHh8+Sz3Xzlydw$6piBSUN7E4l3Y4vL7doRK8Kro+mOJ0rtTPD8nF0X91I  
 ------------------ --------------------------------------------------------------------------------------------------- 

 ! [NOTE] Self-salting encoder used: the encoder generated its own built-in salt.                                       

                                                                                                                        
 [OK] Password encoding succeeded                                                                                       
                                          
```




5. Make Auth (Make Authenticator class)
```
$ bin/console make:auth


 What style of authentication do you want? [Empty authenticator]:
  [0] Empty authenticator
  [1] Login form authenticator
 > 1

 The class name of the authenticator to create (e.g. AppCustomAuthenticator):
 > LoginFormAuthenticator

 Choose a name for the controller class (e.g. SecurityController) [SecurityController]:
 > AuthController

 Do you want to generate a '/logout' URL? (yes/no) [yes]:
 > yes

 created: src/Security/LoginFormAuthenticator.php
 updated: config/packages/security.yaml
 created: src/Controller/AuthController.php
 created: templates/security/login.html.twig

           
  Success! 
           

 Next:
 - Customize your new authenticator.
 - Finish the redirect "TODO" in the App\Security\LoginFormAuthenticator::onAuthenticationSuccess() method.
 - Review & adapt the login template: templates/security/login.html.twig.
 

```

6. Generate a registration form
```
$ composer require form
$ symfony console validator
$ symfony console make:registration-form

 Creating a registration form for App\Entity\User

 Do you want to add a @UniqueEntity validation annotation on your User class to make sure duplicate accounts aren't created? (yes/no) [yes]:
 > 

 Do you want to send an email to verify the user's email address after registration? (yes/no) [yes]:
 > 

                                                                                                                        
 [WARNING] We're missing some important components. Don't forget to install these after you're finished.                
                                                                                                                        
           composer require symfonycasts/verify-email-bundle symfony/mailer                                             
                                                                                                                        

 By default, users are required to be authenticated when they click the verification link that is emailed to them.
 This prevents the user from registering on their laptop, then clicking the link on their phone, without
 having to log in. To allow multi device email verification, we can embed a user id in the verification link.

 Would you like to include the user id in the verification link to allow anonymous email verification? (yes/no) [no]:
 > admin@security-demo.com

 What email address will be used to send registration confirmations? (e.g. mailer@your-domain.com):
 > admin@security-demo.com

 What "name" should be associated with that email address? (e.g. Acme Mail Bot):
 > Security

 Do you want to automatically authenticate the user after registration? (yes/no) [yes]:
 > 

 updated: src/Entity/User.php
 updated: src/Entity/User.php
 created: src/Security/EmailVerifier.php
 created: templates/registration/confirmation_email.html.twig
 created: src/Form/RegistrationFormType.php
 created: src/Controller/RegistrationController.php
 created: templates/registration/register.html.twig

           
  Success! 
            Creating a registration form for App\Entity\User

 Do you want to add a @UniqueEntity validation annotation on your User class to make sure duplicate accounts aren't created? (yes/no) [yes]:
 > 

 Do you want to send an email to verify the user's email address after registration? (yes/no) [yes]:
 > 

                                                                                                                        
 [WARNING] We're missing some important components. Don't forget to install these after you're finished.                
                                                                                                                        
           composer require symfonycasts/verify-email-bundle symfony/mailer                                             
                                                                                                                        

 By default, users are required to be authenticated when they click the verification link that is emailed to them.
 This prevents the user from registering on their laptop, then clicking the link on their phone, without
 having to log in. To allow multi device email verification, we can embed a user id in the verification link.

 Would you like to include the user id in the verification link to allow anonymous email verification? (yes/no) [no]:
 > 

 What email address will be used to send registration confirmations? (e.g. mailer@your-domain.com):
 > admin@security-demo.com

 What "name" should be associated with that email address? (e.g. Acme Mail Bot):
 > Security

 Do you want to automatically authenticate the user after registration? (yes/no) [yes]:
 > 

 updated: src/Entity/User.php
 updated: src/Entity/User.php
 created: src/Security/EmailVerifier.php
 created: templates/registration/confirmation_email.html.twig
 created: src/Form/RegistrationFormType.php
 created: src/Controller/RegistrationController.php
 created: templates/registration/register.html.twig

           
  Success! 
           

 Next:
 1) Install some missing packages:
      composer require symfonycasts/verify-email-bundle symfony/mailer
 2) In RegistrationController::verifyUserEmail():
    * Customize the last redirectToRoute() after a successful email verification.
    * Make sure you're rendering success flash messages or change the $this->addFlash() line.
 3) Review and customize the form, controller, and templates as needed.
 4) Run "php bin/console make:migration" to generate a migration for the newly added User::isVerified property.

 Then open your browser, go to "/register" and enjoy your new form!


 Next:
 1) Install some missing packages:
      composer require symfonycasts/verify-email-bundle symfony/mailer
 2) In RegistrationController::verifyUserEmail():
    * Customize the last redirectToRoute() after a successful email verification.
    * Make sure you're rendering success flash messages or change the $this->addFlash() line.
 3) Review and customize the form, controller, and templates as needed.
 4) Run "php bin/console make:migration" to generate a migration for the newly added User::isVerified property.

 Then open your browser, go to "/register" and enjoy your new form!
==============================================================================================

$ composer require symfonycasts/verify-email-bundle symfony/mailer
```