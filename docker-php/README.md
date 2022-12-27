# Docker - PHP


Setup
------------

* For a standard build / setup, simply run
  ```docker compose up -d ```
* For a development build which exposes DB ports and includes Xdebug, you can run the dev-mode shell script like so
  ```sh ./bin/dev-mode.sh -d```
* To run with Xdebug enabled, run
  ```XDEBUG_MODE=debug sh ./bin/dev-mode.sh -d --build```



