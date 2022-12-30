<?php

class User
{

    // Create properties
    public $name;
    public $username;
    public $followerCount;
}


$garyObject = new User();

// var_dump($garyObject);

$garyObject->name          = 'Jean-Claude';
$garyObject->username      = '@jeanyaotech';
$garyObject->followerCount = 50;

// print_r($garyObject);

// 1. instantiate a new User object named after yourself
$johnObject = new User();

// 2. Set name, username, and followerCount properties
$johnObject->name          = 'John Smith';
$johnObject->username      = '@johnsmith';
$johnObject->followerCount = 1000;

// 3. Use print_r to check that you have created it correctly
print_r($johnObject);

// 4. Check your work in the browser
// (http://localhost:8000/creating-objects.php)