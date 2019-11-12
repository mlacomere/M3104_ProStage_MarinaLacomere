<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ProStageController extends AbstractController
{
    /**
     * @Route("/pro/stage", name="pro_stage")
     */
    public function index()
    {
        return $this->render('pro_stage/index.html.twig', [
            'controller_name' => 'ProStageController',
        ]);
    }
    /**
     * @Route("/", name="proStage_accueil")
     */
    public function messageBienvenue()
    {
        return new Response ("<H1>Bienvenue sur la page d'accueil de ProStage </H1>");
    }
}
