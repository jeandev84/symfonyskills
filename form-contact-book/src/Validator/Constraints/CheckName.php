<?php
namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraints\Compound;
use Symfony\Component\Validator\Constraints as Assert;

class CheckName extends Compound
{

    protected function getConstraints(array $options): array
    {
        return [
           new Assert\Length([
               'min' => 2,
               'max' => 15,
               'minMessage' => 'Your last or first name must be at least {{ limit }} characters long',
               'maxMessage' => 'Your last or first name cannot be at longer than {{ limit }} characters',
           ]),
           new Assert\Regex([
               'pattern' => '/\d/',
               'match'   => false,
               'message' => 'Your last or first name cannot contain a number'
           ])
        ];
    }
}