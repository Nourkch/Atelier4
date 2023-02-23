<?php

namespace App\Controller;
use App\Entity\Club;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ClubRepository;

class ClubController extends AbstractController
{
    #[Route('/club', name: 'app_club')]
    public function index(): Response
    {
        return $this->render('club/index.html.twig', [
            'controller_name' => 'ClubController',
        ]);
    }

    #[Route('/getClub', name: 'getClub')]
    public function fetch_data(ClubRepository $repo): Response
    {
        return $this->render('club/cub.html.twig', [
            'club'=>$repo->findAll(),
        ]);
    }

    #[Route('/delete_club/{id}', name: 'delete_club')]
    public function delete(Club $club) :Response{
        $em = $this->getDoctrine()->getManager();
        $em->remove($club);
        $em->flush();

        return $this->render('club/cub.html.twig', [
            'id'=>$club->getId(),
        ]);
    }


}
