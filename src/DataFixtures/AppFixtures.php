<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Entreprise;
use App\Entity\Stage;
use App\Entity\Formation;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');
        

        /*********************************
         * ***Création des Formations ****
        **********************************/

        $dutInfo = new Formation();
        $dutInfo -> setNom("DUT Informatique");

        $dutTic = new Formation();
        $dutTic -> setNom("DUT TIC");

        $licenceProMultimedia = new Formation();
        $licenceProMultimedia -> setNom("Licence Pro Multimedia");

        $tableauFormations = array($dutInfo,$dutTic,$licenceProMultimedia);
        foreach ($tableauFormations as $uneFormation){
            $manager->persist($uneFormation);
        }
        
        /*********************************
         * ***Création des Entreprises ****
        **********************************/
        $tableauEntreprise=array();
        for($i=1;$i<=10;$i++){
            $entreprise = new Entreprise();
            $entreprise -> setNom($faker->company());
            $entreprise -> setDescription($faker->realText($maxNbChars = 255, $indexSize = 2));
            $entreprise -> setAdresse($faker->address());
            $entreprise -> setSiteWeb($faker->url());
            array_push($tableauEntreprise,$entreprise); 
            // conservation des entreprises dans un tableau pour pouvoir y accéder et les lier avec un ou des stages
            $manager->persist($entreprise);
        }

        /*******************************************************************
         * ***Création des Stages et entreprises / formations associées ****
        *******************************************************************/
        for($i=1;$i<=20;$i++){
            $stage = new Stage();
            $stage -> setTitre($faker->catchPhrase());
            $stage -> setDescriptionMission($faker->realText($maxNbChars = 255, $indexSize = 2));
            $stage -> setMailContact($faker->email());
            $stage -> setPersonneAContacter($faker->name($gender ='male'|'female'));
            $stage -> setDateDebut($faker->dateTimeBetween($startDate = 'now', $endDate = '+ 1years', $timezone = null, $format = 'd-m-Y'));
            $stage -> setDateFin($faker->dateTimeBetween($startDate = $stage->getDateDebut(), $endDate = '+ 1years', $timezone = null, $format = 'd-m-Y'));
            //lier les entreprises et formations!!
            //1 stage est lié à une entreprise
            //récupération aléatoire d'une entreprise du $tableauEntreprise 
            $ent=$faker->randomElement($array = $tableauEntreprise);
            $stage -> setEntreprise($ent);
            //modification au niveau de l'entreprise
            $ent -> addStage($stage);
            //génération d'un nombre aléatoire entre 1 et 3 pour le nombre de formations liées à ce stage
            $nbForm=$faker->numberBetween($min = 1, $max = 3);
            for($j=1; $j<=$nbForm; $j++ ){
                $stage -> addFormation($tableauFormations[$j-1]);
                $tableauFormations[$j-1]->addStage($stage);
                $manager->persist($tableauFormations[$j-1]);
            }
            
            $manager->persist($stage);
            $manager->persist($ent);
            
        }


        $manager->flush();
    }
}
