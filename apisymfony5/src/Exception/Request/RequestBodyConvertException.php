<?php
namespace App\Exception\Request;

use RuntimeException;
use Throwable;


class RequestBodyConvertException extends RuntimeException
{
    public function __construct(Throwable $previous)
    {
        parent::__construct('error while unmarshalling request body', 0, $previous);
    }
}
