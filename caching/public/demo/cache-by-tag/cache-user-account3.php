<?php

use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\Adapter\TagAwareAdapter;

require_once __DIR__.'/../vendor/autoload.php';


// Cache multiple items via Tag cache

$cache = new TagAwareAdapter(new FilesystemAdapter('app.cache'));

$cacheItem = $cache->getItem('user.account3');

$cache->invalidateTags(['admin']);


if (! $cacheItem->isHit()) {

    echo "Miss :( <br>";

    $account3 = [
        'name' => 'Jane Doe',
        'id'   => 4321
    ];

    $cacheItem->set($account3);

    $cacheItem->tag(['user', 'admin']);

    $cache->save($cacheItem);

} else {
    echo "Hit! <br>";
    $account3 = $cacheItem->get();
}

dd($account3);