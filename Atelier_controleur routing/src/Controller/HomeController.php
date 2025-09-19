<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'identifiant'=>5
        ]);
    }
    #[Route('/hello',name:'hello')]
    public function hello(){
        return new Response("Hello 3A26");
    }
    #[Route('/contact/{tel}',name:'contact')]
    public function contact($tel){
        return $this->render('home/contact.html.twig',['tel'=>$tel]);
    }
    #[Route('/show','show')]
    public function show(){
        return new Response(("Bienvenue"));
    }
    #[Route('/afficher','afficher')]
    public function afficher(){
        return $this->render('home/apropos.html.twig');
    }
}
