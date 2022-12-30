<?php

class Connection
{

     private static int $count = 0;


     public function __construct()
     {
          self::$count++;
     }



     /**
      * @return int
     */
     public static function getCount(): int
     {
          return self::$count;
     }
}