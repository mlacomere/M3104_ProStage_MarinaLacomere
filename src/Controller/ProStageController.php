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
        return $this->render('pro_stage/stage.html.twig',['id'=>$id]);
    }
    /**
     * @Route("/stages", name="proStage_stages")
     */
    public function messageStages()
    {
        return $this->render('pro_stage/stages.html.twig');
    }
}
