<?php

namespace App\Service\ExceptionHandler;

class ExceptionMapping
{
    public function __construct(protected int $code, protected bool $hidden, protected bool $loggable)
    {
    }


    /**
     * @param int $code
     * @return static
    */
    public static function fromCode(int $code): self
    {
        return new self($code, true, false);
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function isHidden(): bool
    {
        return $this->hidden;
    }

    public function isLoggable(): bool
    {
        return $this->loggable;
    }
}
