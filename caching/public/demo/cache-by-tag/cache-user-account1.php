<?php

use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\Adapter\TagAwareAdapter;

require_once __DIR__.'/../vendor/autoload.php';


$cache = new TagAwareAdapter(new FilesystemAdapter('app.cache'));

$cacheItem = $cache->getItem('user.account1');

if (! $cacheItem->isHit()) {

    echo "Miss :( <br>";

    $account1 = [
        'name' => 'Jean-Claude',
        'id'   => 1234
    ];

    $cacheItem->set($account1);

    $cacheItem->tag('user');

    $cache->save($cacheItem);

} else {
    echo "Hit! <br>";
    $account1 = $cacheItem->get();
}

dd($account1);