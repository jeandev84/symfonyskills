<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class AppController extends AbstractController
{

     #[Route('/homepage', name: 'app_homepage', methods: ['GET'])]
     public function index()
     {
          return $this->render('app/index.html.twig', [
               'user' => $this->getUser()
          ]);
     }



    #[Route('/not-the-homepage', name: 'alternate_page', methods: ['GET'])]
    public function alternatePage()
    {
        return $this->render('app/alternate-page.html.twig');
    }
}