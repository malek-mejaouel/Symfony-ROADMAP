<?php
namespace App\Controller;
use App\Form\UserFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\UserRepository;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
final class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
    #[Route('list_users', name: 'list_users')]
    public function listU(UserRepository $u):Response{
        $users = $u->findAll();
        return $this->render('user/list.html.twig', [
            'users' => $users,
        ]);
    }
    /*
     #[Route('list_users', name: 'list_users')]
    public function listU(EntitManager $r):Response{
        $users = $r->getRepository(User::class)->findAll();
        return $this->render('user/list.html.twig', [
            'users' => $users,
        ]);
    }
    */
    #[Route('add_user', name: 'add_user')]
    public function addU(Request $req,ManagerRegistry $doctrine):Response{
        $user = new User();
        $form = $this->createForm(UserFormType::class,$user);
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            $em = $doctrine->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('list_users');
        }
        return $this->render('user/add.html.twig', [
            'form' => $form->createView(),
        ]); }
    #[Route('update_user/{id}',name:'update_user')]
    public function updateU(UserRepository $u,$id,Request $req,ManagerRegistry $doctrine):Response{
        $user= $u->find($id);
        $form=$this->createForm(UserFormType::class,$user);
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            $em=$doctrine->getManager();
            $em->flush();
            return $this->redirectToRoute('list_users');
    }
        return $this->render('user/update.html.twig', [
            'form' => $form->createView(),
        ]);}
    #[Route('delete_user/{id}',name:'delete_user')]
    public function deleteU(UserRepository $u,$id,ManagerRegistry $doctrine):Response{
        $user= $u->find($id);
        $em=$doctrine->getManager();
        $em->remove($user);
        $em->flush();
        return $this->redirectToRoute('list_users'); 
    
        }    }
