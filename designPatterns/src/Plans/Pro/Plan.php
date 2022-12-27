<?php
namespace App\Plans\Pro;

use App\Plans\Plan as MasterPlan;


class Plan extends MasterPlan
{

    private const RATE = 150;
    protected array $features = ['Unlimited emails', 'Unlimited contracts', '24-7 support'];


    /**
     * @inheritDoc
    */
    public function getRate(): int
    {
        return self::RATE;
    }
}