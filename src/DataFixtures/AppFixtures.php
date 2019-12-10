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

        for($i=0;$i<=10;$i++){
            $entreprise = new Entreprise();
            $entreprise -> setNom($faker->company());
            $entreprise -> setDescription($faker->realText($maxNbChars = 255, $indexSize = 2));
            $entreprise -> setAdresse($faker->address());
            $entreprise -> setSiteWeb($faker->url());
            $manager->persist($entreprise);
        }

        /*******************************************************************
         * ***Création des Stages et entreprises / formations associées ****
        *******************************************************************/
        $manager->flush();
    }
}
