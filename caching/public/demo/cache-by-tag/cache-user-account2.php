<?php

use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\Adapter\TagAwareAdapter;

require_once __DIR__.'/../vendor/autoload.php';


$cache = new TagAwareAdapter(new FilesystemAdapter('app.cache'));

$cacheItem = $cache->getItem('user.account2');

if (! $cacheItem->isHit()) {

    echo "Miss :( <br>";

    $account2 = [
        'name' => 'Jane Doe',
        'id'   => 4321
    ];

    $cacheItem->set($account2);

    $cacheItem->tag('user');

    $cache->save($cacheItem);

} else {
    echo "Hit! <br>";
    $account2 = $cacheItem->get();
}

dd($account2);