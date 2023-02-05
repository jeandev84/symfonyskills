<?php
namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

class ForbiddenDomainZone extends Constraint
{
     public string $message = 'Domain zone "ru in {{ string }} is not allowed';


     public function validatedBy()
     {
         return get_class($this)."Validator";
     }
}