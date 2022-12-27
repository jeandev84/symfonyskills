### Symfony Cache using filesystem cache


```
// e.g http://localhost:8000/stock/amzn
// e.g http://localhost:8000/stock/tsla
// e.g http://localhost:8000/stock/shop
// e.g http://localhost:8000/stock/aapl


$ php bin/console debug:autowiring cache

Autowirable Types
=================

 The following classes & interfaces can be used as type-hints when autowiring:
 (only showing classes/interfaces matching cache)
 
 CacheItemPoolInterface generates CacheItemInterface objects.
 Psr\Cache\CacheItemPoolInterface (cache.app)
 
 Interface for adapters managing instances of Symfony's CacheItem.
 Symfony\Component\Cache\Adapter\AdapterInterface (cache.app) - deprecated
 
 Interface implemented by HTTP cache stores.
 Symfony\Component\HttpKernel\HttpCache\StoreInterface (http_cache.store)
 
 Covers most simple to advanced caching needs.
 Symfony\Contracts\Cache\CacheInterface (cache.app)
 
 Allows invalidating cached items using tags.
 Symfony\Contracts\Cache\TagAwareCacheInterface (cache.app.taggable
 

================================= CACHE CONFIG ===================
 ./config/packages/cache.yaml
 framework:
    cache:
        # Unique name of your app: used to compute stable namespaces for cache keys.
        #prefix_seed: your_vendor_name/app_name

        # The "app" cache stores to the filesystem by default.
        # The data in this cache should persist between deploys.
        # Other options include:

        # Redis
        #app: cache.adapter.redis
        #default_redis_provider: redis://localhost

        # APCu (not recommended with heavy random-write workloads as memory fragmentation can cause perf issues)
        #app: cache.adapter.apcu

        # Namespaced pools use the above "app" backend by default
        pools:
            #my.dedicated.cache: null
            # this mean, I can inject $stocksCache from anywhere and use it (in this case used cache.adapter.filesystem)
            stocks_cache:
                adapter: cache.adapter.filesystem

 
 ===================== DELETE CACHE FROM POOL =======================
 $ php bin/console cache:pool:delete stocks_cache <nameOfCache>
 
 $ php bin/console cache:pool:delete stocks_cache AAPL
 $ php bin/console cache:pool:delete stocks_cache SHOP
 $ php bin/console cache:pool:delete stocks_cache AMZN
 $ php bin/console cache:pool:delete stocks_cache TLSA
 
 
===================== CLEAR CACHES FROM POOL =======================
 $ php bin/console cache:pool:clear <tag.name>
 $ php bin/console cache:pool:clear app.cache
 $ php bin/console cache:pool:clear cache.app stocks_cache
 
 // Clearing cache pool: cache.app                                                                                      

 // Clearing cache pool: stocks_cache                                                                                   

                                                                                                                        
 [OK] Cache was successfully cleared.                                                                                   
             
```