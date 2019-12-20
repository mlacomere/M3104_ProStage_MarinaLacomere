<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Stage;
use App\Entity\Entreprise;
use App\Entity\Formation;

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
        //récupérer le répository
        $repositoryEnt = $this->getDoctrine()->getRepository(Entreprise::class);
        //Récupérer les entreprise qui ont un stage
        $ent = $repositoryEnt->findAll();
        //envoyer à la vue
        return $this->render('pro_stage/entreprises.html.twig',['lesEntreprises'=>$ent]);
    }
    /**
     * @Route("/formations", name="proStage_formations")
     */
    public function messageFormations()
    {
        //récupérer le répository
        $repositoryFormation = $this->getDoctrine()->getRepository(Formation::class);
        //Récupérer les formations
        $formations = $repositoryFormation->findAll();
        //envoyer à la vue
        return $this->render('pro_stage/formations.html.twig',['lesFormations'=>$formations]);
    }
    /**
     * @Route("/stage/{id}", name="proStage_stage")
     */
    public function messageStage($id)
    {
        //récupérer le répository
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);
        //Récupérer le stage
        $stage = $repositoryStage->find($id);
        //envoyer le stage à la vue
        return $this->render('pro_stage/stage.html.twig',['stage'=>$stage]);
    }
    /**
     * @Route("/stages", name="proStage_stages")
     */
    public function messageStages()
    {
        //récupérer le répository
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);
        //Récupérer les stages
        $stages = $repositoryStage->findAll();
        //envoyer à la vue
        return $this->render('pro_stage/stages.html.twig',['lesStages'=>$stages]);
    }
     /**
     * @Route("/stages/entreprise/{idEntreprise}", name="proStage_stages_entreprise")
     */
    public function messageStagesEnt($idEntreprise)
    {   
        //récupérer le répository
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);
        //Récupérer les stages de l'entreprise
        $stages = $repositoryStage->findByEntreprise($idEntreprise);
        //envoyer à la vue
        return $this->render('pro_stage/stages.html.twig',['lesStages'=>$stages]);
    }
    /**
     * @Route("/stages/formation/{idFormation}", name="proStage_stages_formation")
     */
    public function messageStagesForm($idFormation)
    {   
        //récupérer la formation
        $repositoryFormation = $this->getDoctrine()->getRepository(Formation::class);
        $formation = $repositoryFormation->find($idFormation);
        //récupérer les stages de cette formation
        $stages = $formation->getStages();
        //envoyer à la vue
        return $this->render('pro_stage/stages.html.twig',['lesStages'=>$stages]);
    }
}
