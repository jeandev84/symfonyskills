<?php

require_once __DIR__.'/../vendor/autoload.php';

$cache = new \Symfony\Component\Cache\Adapter\FilesystemAdapter();

$cacheItem = $cache->getItem('an.item.key');

if (! $cacheItem->isHit()) {
    echo "Miss :( <br>";
    $apiKey = md5('foo');
    $cacheItem->set($apiKey);
    $cache->save($cacheItem);
} else {
    echo "Hit! <br>";
    $apiKey = $cacheItem->get();
}

dd($apiKey);