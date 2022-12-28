<?php
namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;



#[IsGranted('ROLE_ADMIN')]
class AdminController extends AbstractController
{

       #[Route('/admin/dashboard', name: 'admin_dashboard', methods: ['GET'])]
       public function dashbboard()
       {
            return $this->render('admin/dashboard.html.twig');
       }
}