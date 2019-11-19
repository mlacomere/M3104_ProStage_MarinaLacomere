<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ProStageController extends AbstractController
{
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
        return $this->render('pro_stage/entreprises.html.twig');
    }
    /**
     * @Route("/formations", name="proStage_formations")
     */
    public function messageFormations()
    {
        return $this->render('pro_stage/formations.html.twig');
    }
    /**
     * @Route("/stage/{id}", name="proStage_stage")
     */
    public function messageStage($id)
    {
        return new Response ("<H1>Cette page affichera le descriptif du stage ayant pour identifiant $id</H1>");
    }
}
