<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AuhtorController extends AbstractController
{
    #[Route('/author', name: 'app_author')]
    public function index(): Response
    {
        return $this->render('auhtor/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    }

    #[Route('/author/{id}', name: 'show_author')]
    public function show(int $id): Response
    {
        return $this->render('auhtor/show.html.twig', [
            'id' => $id,
        ]);
    }

    #[Route('/authors', name: 'list_authors')]
    public function listAuthors(): Response
    {
        $authors = [
            [
                'id' => 1,
                'picture' => '/images/malek.jpg',
                'username' => 'Victor Hugo',
                'email' => 'victor.hugo@gmail.com',
                'nb_books' => 100
            ],
            [
                'id' => 2,
                'picture' => '/images/malek.jpg',
                'username' => 'William Shakespeare',
                'email' => 'william.shakespeare@gmail.com',
                'nb_books' => 200
            ],
        ];
        $totalBooks = 0;
foreach ($authors as $author) {
    $totalBooks += $author['nb_books'];
}



        return $this->render('auhtor/list.html.twig', [
            'authors' => $authors,'totalbooks' =>$totalBooks
        ]);
    }
}
