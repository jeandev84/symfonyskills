<?php

use Doctrine\ORM\EntityManagerInterface;

require_once 'vendor/autoload.php';

require_once 'bootstrap.php';

[$filename, $username, $password] = $argv;

/* dd($filename); */

$user = new \App\Entity\User();

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

/* dd($hashedPassword); */

$user->setUsername($username);
$user->setPassword($hashedPassword);

/** @var EntityManagerInterface $em */
$em = $entityManager;

$em->persist($user);
$em->flush();

echo "Created user with id ". $user->getId() . PHP_EOL;