<?php

namespace App\Controller;
use App\Form\ClassroomFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ClassroomRepository;
use App\Entity\Classroom;
use Doctrine\Persistence\ManagerRegistry;
final class ClassroomController extends AbstractController
{
    #[Route('/classroom', name: 'app_classroom')]
    public function index(): Response
    {
        return $this->render('classroom/index.html.twig', [
            'controller_name' => 'ClassroomController',
        ]);
    }
    #[Route('list_classrooms',name:'list_classrooms')]
    public function listC(ClassroomRepository $c):Response {
        $classrooms=$c->findAll();
        return $this->render('classroom/list.html.twig', [
            'classrooms'=>$classrooms,
        ]); 
    }
    #[Route('add_classroom',name:'add_classroom')]
    public function addC(Request $req,ManagerRegistry $doctrine):Response {
        $classroom=new Classroom();
        $form=$this->createForm(ClassroomFormType::class,$classroom);
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            $em=$doctrine->getManager();
            $em->persist($classroom);
            $em->flush();
            return $this->redirectToRoute('list_classrooms');}
        return $this->render('classroom/add.html.twig', [
            'form'=>$form->createView(),
        ]);}
    #[Route('update_classroom/{id}',name:'update_classroom')]
    public function updateC(ClassroomRepository $c,$id,Request $req,ManagerRegistry $doctrine):Response {
        $classroom=$c->find($id);
        $form=$this->createForm(ClassroomFormType::class,$classroom);
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            $em=$doctrine->getManager();
            $em->flush();
            return $this->redirectToRoute('list_classrooms');}
        return $this->render('classroom/update.html.twig', [
            'form'=>$form->createView(),
        ]);}
    #[Route('delete_classroom/{id}',name:'delete_classroom')]
    public function deleteC(ClassroomRepository $c,$id,ManagerRegistry $doctrine):Response {
        $classroom=$c->find($id);
        $em=$doctrine->getManager();
        $em->remove($classroom);
        $em->flush();
        return $this->redirectToRoute('list_classrooms');}  
}
