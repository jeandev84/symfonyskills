<?php

class SubClass extends BaseClass
{
      public function getParentProtectedProperty()
      {
           return $this->protectedProperty;
      }


      public function getParentPrivateProperty()
      {
           // return $this->privateProperty;
      }
}