<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Csrf\CsrfToken;

use App\Repository\ProjectRepository;
use App\Repository\TagRepository;

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

    #[Route('/project/new', name: 'app_project_new', methods: ['GET'])]
    public function new(TagRepository $tagRepository)
    {
        $tags = $tagRepository->FindAll();
        return $this->render('project/new.html.twig', ['tags' => $tags]);
    }

    #[Route('/project/create', name: 'app_project_create', methods: ['POST'])]
    public function create(ProjectRepository $projectRepository, CsrfTokenManagerInterface $csrfTokenManager, Request $request): Response
    {
        $token = new CsrfToken('create-project', $request->get("_csrf_token"));
        if (!$csrfTokenManager->isTokenValid($token)) {
            throw new InvalidCsrfTokenException();
        }
        // TODO: validations

        $errors = [];
        $errors = array("No validations yet");
        $projects = $projectRepository->findBy(['owner' => $this->getUser()->getId()]);

        return $this->render('project/index.html.twig', [
            'projects' => $projects,
            'errors' => $errors
        ]);
    }
}
