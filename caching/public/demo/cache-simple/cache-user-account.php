<?php

require_once __DIR__.'/../vendor/autoload.php';

$cache = new \Symfony\Component\Cache\Adapter\FilesystemAdapter();

$cacheItem = $cache->getItem('user.account');

if (! $cacheItem->isHit()) {

    echo "Miss :( <br>";

    $account = [
        'name' => 'Jean-Claude',
        'id'   => 1234
    ];

    $cacheItem->set($account);
    $cache->save($cacheItem);
} else {
    echo "Hit! <br>";
    $account = $cacheItem->get();
}

dd($account);