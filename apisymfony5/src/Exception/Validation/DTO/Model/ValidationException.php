<?php
namespace App\Exception\Validation\DTO\Model;

use RuntimeException;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class ValidationException extends RuntimeException
{
    public function __construct(private ConstraintViolationListInterface $violations)
    {
        parent::__construct('violation failed');
    }


    /**
     * @return ConstraintViolationListInterface
    */
    public function getViolations(): ConstraintViolationListInterface
    {
        return $this->violations;
    }

}
