### SESSIONS


```php 
$ php vendor/bin/phpunit tests/SessionTest.php
$ php vendor/bin/phpunit tests/SessionTest.php --filter a_session_can_be_started
$ php vendor/bin/phpunit tests/SessionTest.php --filter items_can_be_added_to_the_session
$ php vendor/bin/phpunit tests/SessionTest.php --filter can_check_that_an_items_exists_in_a_session
$ php vendor/bin/phpunit tests/SessionTest.php --filter can_retrieve_an_item_from_the_session
$ php vendor/bin/phpunit tests/SessionTest.php --filter items_can_be_removed_by_key
$ php vendor/bin/phpunit tests/SessionTest.php --filter the_session_can_be_cleared
```