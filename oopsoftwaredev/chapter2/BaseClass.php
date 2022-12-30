<?php

class BaseClass
{
      public $publicProperty = 'Public properties and methods can be accessed anywhere in you code.';

      protected $protectedProperty = 'Protected properties and methods can only be accessed within the declaring class or from a suclass';

      private $privateProperty = 'Private properties and methods can only be accessed within the declaring class. They are not visible anywhere else';



      /**
       * @return string
      */
      protected function getProtectedProperty(): string
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


      /**
       * @return string
      */
      private function getPrivateProperty(): string
      {
          return $this->privateProperty;
      }
}