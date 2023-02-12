<?php

namespace App\Service\Recommendation\Exception;

use Throwable;

class AccessDeniedException extends RecommendationException
{
    public function __construct(?Throwable $previous = null)
    {
        parent::__construct('access denied', $previous);
    }
}
