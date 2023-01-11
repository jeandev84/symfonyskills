<?php
namespace App\Session;

interface SessionInterface
{

    /**
     * @param string $key
     * @return mixed
    */
    public function has(string $key): bool;


    /**
     * @param string $key
     * @param mixed|null $default
     * @return mixed
    */
    public function get(string $key, mixed $default = null);




    /**
     * @param string $key
     * @param mixed $value
     * @return mixed
    */
    public function set(string $key, mixed $value);


    /**
     * @return mixed
    */
    public function clear();



    /**
     * @param string $key
     * @return mixed
    */
    public function remove(string $key);




    /**
     * @return mixed
    */
    public function all();
}