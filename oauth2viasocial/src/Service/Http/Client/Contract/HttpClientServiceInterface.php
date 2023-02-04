<?php
namespace App\Service\Http\Client\Contract;

interface HttpClientServiceInterface
{

       /**
        * @param string $url
        * @param array $options
        * @return mixed
       */
       public function get(string $url, array $options = []);




       /**
        * @param string $url
        * @param array $options
        * @return mixed
       */
       public function post(string $url, array $options = []);
}