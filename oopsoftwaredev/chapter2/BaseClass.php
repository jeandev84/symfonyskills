<?php

class BaseClass
{
      public $publicProperty = 'Public properties and methods can be accessed anywhere in you code.';

      protected $protectedProperty = 'Protected properties and methods can only be accessed within the declaring class or from a suclass';

      private $privateProperty = '';



      /**
       * @return string
      */
      public function getProtectedProperty(): string
      {
          return $this->protectedProperty;
      }


      /**
       * @return string
      */
      public function getPublicProperty(): string
      {
          return $this->publicProperty;
      }
}