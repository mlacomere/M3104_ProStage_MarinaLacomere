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
        return $this->render('pro_stage/accueil.html.twig');
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
    /**
     * @Route("/stage/{id}", name="proStage_stage")
     */
    public function messageStage($id)
    {
        return new Response ("<H1>Cette page affichera le descriptif du stage ayant pour identifiant $id</H1>");
    }
}
