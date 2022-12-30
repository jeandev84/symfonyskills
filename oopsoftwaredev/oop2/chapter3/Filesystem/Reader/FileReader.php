<?php

class FileReader
{
       private $data = 'Some random data';


       /**
        * @return string
       */
       public function getData(): string
       {
           return $this->data;
       }
}