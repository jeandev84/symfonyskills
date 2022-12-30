<?php

class SubClass extends BaseClass
{
      public function getParentProtectedProperty()
      {
           return $this->getProtectedProperty();
      }


      public function getParentPrivateProperty()
      {
           return $this->getParentPrivateProperty();
      }
}