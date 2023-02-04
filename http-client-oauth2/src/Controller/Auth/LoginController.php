<?php
namespace App\Controller\Auth;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;



class LoginController extends AbstractController
{

     private $githubClient;


     public function __construct(string $githubClient)
     {
         $this->githubClient = $githubClient;
     }



    /**
      * @Route("/auth/login", name="auth.login")
     */
    public function index(): Response
    {
        # Il aura un button ou l' utilisateur va cliquer la dessus
        # apres avoir entrer ses donnees il sera rediriger vers l' API Github


        return $this->render('auth/login/index.html.twig');
    }



    /**
     * @Route("/auth/login/github", name="auth.login.github")
    */
    public function github(UrlGeneratorInterface $urlGenerator): Response
    {
         // $redirectURI = $this->generateUrl('auth.login'); // /auth/login

         $url = $urlGenerator->generate('user.dashboard', [], UrlGeneratorInterface::ABSOLUTE_URL);

         return new RedirectResponse("https://github.com/login/oauth/authorize?client_id=$this->githubClient&redirect_uri=$url");
    }
}
