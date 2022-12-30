<?php

class SubClass extends BaseClass
{
      public function getParentProtectedProperty()
      {
           return $this->protectedProperty;
      }
}