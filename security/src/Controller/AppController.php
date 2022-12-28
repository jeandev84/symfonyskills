<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class AppController extends AbstractController
{

     #[Route('/homepage', name: 'app_homepage', methods: ['GET'])]
     public function index()
     {
          // dd($this->getUser());
          return $this->render('app/index.html.twig', [
               'user' => $this->getUser()
          ]);
     }
}