<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProjectRepository;

class ProjectController extends AbstractController
{
    #[Route('/project', name: 'app_project', methods: ['GET'])]
    public function index(ProjectRepository $projectRepository): Response
    {
        $projects = $projectRepository->findBy(['owner' => $this->getUser()->getId()]);

        return $this->render('project/index.html.twig', [
            'projects' => $projects,
        ]);
    }

    #[Route('/project/create', name: 'app_project_create', methods: ['POST'])]
    public function create(): Response
    {
        dd($request->request);
    }
}
