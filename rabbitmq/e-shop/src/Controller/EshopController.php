<?php
namespace App\Controller;

use App\Message\Command\Order\CreateOrder;
use App\Message\Command\Sms\SignupSms;
use App\Message\Query\SearchQuery;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Transport\AmqpExt\AmqpStamp;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Messenger\HandleTrait;



class EshopController extends AbstractController
{


    use HandleTrait;



    /**
     * @var MessageBusInterface
    */
    // protected $messageBusDispatcher;



    /**
     * @param MessageBusInterface $messageBus
    */
    public function __construct(MessageBusInterface $messageBus)
    {
         /* $this->messageBusDispatcher = $messageBus; */

         $this->messageBus = $messageBus;
    }




    /**
     * @Route("/", name="eshop")
    */
    public function index(): Response
    {
        return $this->render('eshop/index.html.twig', [
            'controller_name' => 'EshopController',
        ]);
    }




    /**
      * @Route("/search", name="search")
    */
    public function search()
    {
         $search = 'laptops';

         // $this->messageBusDispatcher->dispatch(new SearchQuery($search));
         // $this->messageBus->dispatch(new SearchQuery($search));

         $result = $this->handle(new SearchQuery($search));

         return new Response('You search results for '. $search . $result);
    }



    /**
     * @Route("/signup-sms", name="signup.sms")
    */
    public function signupSMS()
    {
         $phoneNumber = '111 222 333';
         $attributes = [];
         $routingKey = ['sms1', 'sms2'];
         $routingKey = $routingKey[random_int(0,1)];

         $this->messageBus->dispatch(new SignupSms($phoneNumber), [new AmqpStamp($routingKey, AMQP_NOPARAM, $attributes)]);

         return new Response(sprintf('You phone number %s successfully signed up to SMS newsletter!', $phoneNumber));
    }




    /**
     * @Route("/order", name="order")
    */
    public function order()
    {
        $productId = 243;
        $productName = 'product name';
        $productAmount = 2;

        // save the order in the database
        $this->handle(new CreateOrder($productId, $productAmount));


        return new Response('You successfully ordered your product!' . $productName);
    }
}
