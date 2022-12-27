<?php
namespace App\Filter\Modifier\Factory;

use App\Filter\Modifier\Contracts\PriceModifierInterface;
use App\Filter\Modifier\Factory\Contracts\PriceModifierFactoryInterface;
use Symfony\Component\VarExporter\Exception\ClassNotFoundException;



class PriceModifierFactory implements PriceModifierFactoryInterface
{

    /**
     * @inheritDoc
    */
    public function create(string $modifierType): PriceModifierInterface
    {
         // Convert type (snake_case) to ClassName (PascalCase)
         $modifierClassBaseName = str_replace('_', '', ucwords($modifierType, '_'));

         $modifier = self::PRICE_MODIFIER_NAMESPACE . $modifierClassBaseName;

         if (! class_exists($modifier)) {
              throw new ClassNotFoundException($modifier);
         }

         return new $modifier();
    }
}