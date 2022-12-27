### Symfony Cache using Redis Cache 

```
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
                # adapter: cache.adapter.filesystem
                 adapter: cache.adapter.redis
                 provider: '%env(REDIS_URL)%'

============================== DOCKER ==============================

version: '3'

services:
  database:
      image: postgres:13-alpine
      volumes:
        - ./postgres:/var/lib/postgresql/data
      restart: always
      environment:
        POSTGRES_USER: main
        POSTGRES_PASSWORD: secret
        POSTGRES_DB: cache_demo
      ports: [5432, 54322, 5440]

  redis:
      image: redis:6.2-alpine
      ports: [6379]

========================== INSTALL redis extension pecl ======================
$ sudo apt install php-pear
$ sudo pecl install redis
$ docker compose up -d
$ symfony console cache:pool:delete stocks_cache AMZN
$ symfony console cache:pool:clear stocks_cache

```