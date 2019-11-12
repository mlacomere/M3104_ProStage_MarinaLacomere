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
    /**
     * @Route("/entreprises", name="proStage_entreprise")
     */
    public function messageEntreprises()
    {
        return new Response ("<H1>Cette page affichera la liste des entreprises proposant un stage</H1>");
    }
    /**
     * @Route("/formations", name="proStage_formations")
     */
    public function messageFormations()
    {
        return new Response ("<H1>Cette page affichera la liste des formationsde l'IUT</H1>");
    }
}
