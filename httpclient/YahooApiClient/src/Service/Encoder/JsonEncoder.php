<?php
namespace App\Service\Encoder;

class JsonEncoder
{

     public function encode(array $data)
     {
          return json_encode($data);
     }



     public function decode(string $jsonFormat)
     {
          return json_decode($jsonFormat, true);
     }

}