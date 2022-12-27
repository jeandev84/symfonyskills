<?php
namespace App\Filter\Modifier\Factory\Contracts;

use App\Filter\Modifier\Contracts\PriceModifierInterface;

interface PriceModifierFactoryInterface
{

    const PRICE_MODIFIER_NAMESPACE = "App\Filter\Modifier\\";


    /**
     * @param string $modifierType
     * @return PriceModifierInterface
    */
    public function create(string $modifierType): PriceModifierInterface;
}