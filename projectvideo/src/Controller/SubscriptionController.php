<?php
namespace App\Controller;

//use App\Controller\Traits\SaveSubscription;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Subscription;


class SubscriptionController extends AbstractController
{


    // use SaveSubscription;


    /**
     * @Route("/pricing", name="pricing")
    */
    public function pricing(): Response
    {
        return $this->render('front/pricing.html.twig', [
             'name'  => Subscription::getPlanDataNames(),
             'price' => Subscription::getPlanDataPrices()
        ]);
    }




      /**
       * @Route("/payment", name="payment")
      */
      public function payment(SessionInterface $session): Response
      {

          $this->denyAccessUnlessGranted('IS_AUTHENTICATED_REMEMBERED');


          if ($session->get('planName') == 'enterprise') {
               $subscribe = Subscription::EnterprisePlan;
          } else {
               $subscribe = Subscription::ProPlan;
          }

          return $this->render('front/payment.html.twig', [
              'subscribe' => $subscribe
          ]);
      }



    /*
    Route("/payment/{paypal}", name="payment", defaults = {"paypal": false})
    public function paymentOLD($paypal, SessionInterface $session): Response
    {

        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_REMEMBERED');


        if ($paypal) {

            $this->saveSubscription($session->get('planName'), $this->getUser());

            return $this->redirectToRoute('admin_main_page');
        }

        return $this->render('front/payment.html.twig');
    }

*/

}
