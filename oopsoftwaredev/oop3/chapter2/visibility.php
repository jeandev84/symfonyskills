<?php

require_once 'Inheritence/BaseClass.php';
require_once 'Inheritence/SubClass.php';


$baseObject = new BaseClass();
$subObject  = new SubClass();
//print $subObject->publicProperty . PHP_EOL ;
//print $subObject->getParentProtectedProperty() . PHP_EOL;
//print $baseObject->getPrivateProperty() . PHP_EOL;
//print $subObject->getParentPrivateProperty() . PHP_EOL;
//print $baseObject->getProtectedProperty() . PHP_EOL;
// print $subObject->getParentProtectedProperty() . PHP_EOL;


