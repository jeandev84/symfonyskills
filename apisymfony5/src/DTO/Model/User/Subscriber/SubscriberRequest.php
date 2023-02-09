<?php

namespace App\DTO\Model\User\Subscriber;

class SubscriberRequest
{
    private string $email;

    private bool $agreed;

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function isAgreed(): bool
    {
        return $this->agreed;
    }

    public function setAgreed(bool $agreed): void
    {
        $this->agreed = $agreed;
    }
}
