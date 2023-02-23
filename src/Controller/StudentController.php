<?php

namespace App\Controller;
use App\Entity\Student;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\StudentRepository;

class StudentController extends AbstractController
{
    #[Route('/student', name: 'app_student')]
    public function index(): Response
    {
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }

    #[Route('/getStudents', name: 'getStudents')]
    public function fetch_data(StudentRepository $repo): Response
    {
        return $this->render('student/student.html.twig', [
            'student'=>$repo->findAll(),
        ]);
    }

    
 #[Route('/delete_student/{id}', name: 'delete_student')]
 public function delete(Student $student) :Response{
     $em = $this->getDoctrine()->getManager();
     $em->remove($student);
     $em->flush();

     return $this->render('student/student.html.twig', [
         'id'=>$student->getId(),
     ]);
 }



}
