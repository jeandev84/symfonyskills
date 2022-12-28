### Testing

1. Installation PHPUnit
```
$ composer require phpunit

$ php bin/phpunit
$ bin/phpunit
$ symfony php bin/phpunit tests/AuthorizationTest.php
$ symfony php bin/phpunit tests/AuthorizationTest.php --filter a_user_cannot_view_another_users_account
$ symfony php bin/phpunit tests/AuthorizationTest.php --filter an_account_holder_can_view_their_own_account
$ symfony php bin/phpunit tests/AuthorizationTest.php --filter an_account_manager_can_view_accounts_witch_they_manage
$ symfony php bin/phpunit tests/AuthorizationTest.php --filter an_non_admin_can_NOT__delete_an_account
$ symfony php bin/phpunit tests/AuthorizationTest.php --filter an_admin_can_delete_an_account
```