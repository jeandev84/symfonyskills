<?php

class Connection
{

      /**
       * @var int
      */
      private static int $count = 0;



      /**
       * @var string Connection Identifier
      */
      private string $connectionId;


      /**
       * @var int
      */
      private int $conferenceId = 1234;


      /**
       * __construct
      */
      public function __construct()
      {
            self::$count++;
      }



      /**
       * __destruct
       *
       * The destructor method will be call as soon as there are no other references
       * to a particular object
       * or in any order during the shutdown sequence.
      */
      public function __destruct()
      {
           self::$count--;
      }


      /**
       * Used for reading data from inaccessible (protected or private)  properties
       *
       * // ->connectionId / conferenceId | whatever ...
       *
       * @param $name
       * @return void
      */
      public function __get($name)
      {
           return $this->{$name};
      }




      /**
       * The string representation of an object
       *
       * The __toString() method allow a class to decide how it will react when it is tree
       * For example, what echo / print $obj; will print.
       *
       * @return string
      */
      public function __toString(): string
      {
           return "Conference ID: {$this->conferenceId} <br> Connection ID: {$this->connectionId}";
      }






    // 1. using this class
      // create a solution for accessing the $count property
      public function getCount()
      {
           return self::$count;
      }




      /**
       * @param $ipAddress
       * @return void
      */
      public function setConnectionId($ipAddress): void
      {
           if (filter_var($ipAddress, FILTER_VALIDATE_IP)) {
               $this->connectionId = $ipAddress . '_'. self::$count;
               return;
           }

           die('Not a valid ip address');
      }


       /**
       * @return string
       */
       public function getConnectionId(): string
       {
           return $this->connectionId;
       }



       // 2. Display the value in magic-methods.php
}