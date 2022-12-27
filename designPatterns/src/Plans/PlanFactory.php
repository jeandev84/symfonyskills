<?php
namespace App\Plans;

class PlanFactory
{

      /**
       * @param string $plan
       * @return Plan
       * @throws \Exception
      */
      public function createPlan(string $plan = 'free'): Plan
      {
            $planName = "App\\Plans\\" . ucwords($plan) . "\\Plan";

            if (! class_exists($planName)) {
                 throw new \Exception('A class with the name '. $planName . ' could not be found');
            }

            return new $planName();
      }



     /*
     public function createPlanLogic($plan = 'free'): Plan
     {
         // Plan
         // -> Free Plan
         // -> Pro Plan
     }
     */
}