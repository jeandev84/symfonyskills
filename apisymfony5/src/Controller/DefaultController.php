<?php

namespace App\Controller;

use App\Manager\BookManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    public function __construct(protected BookManager $bookManager)
    {
    }

    #[Route('/books')]
    public function root(): Response
    {
        $books = $this->bookManager->findBooks();

        return $this->json($books);
    }

    #[Route('/books/create')]
    public function createBook(): Response
    {
          $book = $this->bookManager->createBook(['title' => 'Harry Potter']);

          return $this->json($book);
    }
}
