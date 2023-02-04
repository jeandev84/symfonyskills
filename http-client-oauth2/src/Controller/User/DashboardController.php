<?php
namespace App\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DashboardController extends AbstractController
{

     /**
      * @Route("/user/dashboard", name="user.dashboard")
     */
    public function index(): Response
    {
        # L' utilisateur aura access a cette vue si et seulement s'il sera connecter
        # et possede un role ROLE_USER


        return new Response("<h1>Hello</h1>");
    }

}
