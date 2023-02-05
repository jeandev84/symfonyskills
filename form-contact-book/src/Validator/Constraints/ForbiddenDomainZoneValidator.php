<?php
namespace App\Validator\Constraints;

use UnexpectedValueException;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Constraint;

class ForbiddenDomainZoneValidator extends ConstraintValidator
{
        const DOMAIN_ZONE_RU = '.ru';

        public function validate($value, Constraint $constraint)
        {
             if (null === $value || "" === $value) {
                 return false;
             }


             if (! is_string($value)) {
                  throw new UnexpectedValueException($value, "string");
             }


             if (! stripos($value, self::DOMAIN_ZONE_RU) === false) {
                  $this->context->buildViolation($constraint->message)
                                ->setParameter('{{ string }}', $value)
                                ->addViolation();
             }
        }
}