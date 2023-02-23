<?php

namespace App\Controller;
use App\Entity\Classroom;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ClassroomRepository;

class ClassroomController extends AbstractController
{
    #[Route('/classroom', name: 'app_classroom')]
    public function index(): Response
    {
        return $this->render('classroom/index.html.twig', [
            'controller_name' => 'ClassroomController',
        ]);
    }

    #[Route('/fetch', name: 'fetch')]
    public function fetch_data(ClassroomRepository $repo): Response
    {
        return $this->render('classroom/classroom.html.twig', [
            'classroom'=>$repo->findAll(),
        ]);
    }

 #[Route('/delete/{id}', name: 'delete')]
    public function delete(Classroom $classroom) :Response{
        $em = $this->getDoctrine()->getManager();
        $em->remove($classroom);
        $em->flush();

        return $this->render('classroom/classroom.html.twig', [
            'id'=>$classroom->getId(),
        ]);
    }


}
