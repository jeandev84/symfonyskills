<?php

use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\Adapter\TagAwareAdapter;

require_once __DIR__.'/../vendor/autoload.php';


// Cache multiple items via Tag cache

$cache = new TagAwareAdapter(new FilesystemAdapter('app.cache'));

$cacheItems = $cache->getItems([
    'user.account1',
    'user.account2',
    'user.account3'
]);

foreach ($cacheItems as $cacheItem) {

    if (! $cacheItem->isHit()) {

        echo "Miss :( <br>";

    } else {
        echo "Hit! <br>";
    }
}
