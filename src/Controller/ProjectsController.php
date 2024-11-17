<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProjectsController extends AbstractController
{
    #[Route('/projects', name: 'app_projects')]
    public function show(ProjectRepository $projectRepository): Response
    {
        // Récupérer les projets triés par date_debut_projet en ordre croissant
        $projects = $projectRepository->findBy([], ['date_fin' => 'ASC']);

        return $this->render('projects/projects.html.twig', [
            'projects' => $projects,
        ]);
    }
}

