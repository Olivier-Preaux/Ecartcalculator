<?php

namespace App\DataFixtures;

use App\Entity\Ecart;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EcartFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {   
        $ecart= new Ecart;
            $ecart->setTirage(-1);
            $ecart->setDouzaine1(0);
            $ecart->setDouzaine2(0);
            $ecart->setDouzaine3(0);
            $ecart->setColonne1(0);
            $ecart->setColonne2(0);
            $ecart->setColonne3(0);
            $ecart->setTransversale1(0);
            $ecart->setTransversale2(0);
            $ecart->setTransversale3(0);
            $ecart->setSixain1(0);
            $ecart->setSixain2(0);
            $ecart->setSixain3(0);
            $ecart->setFinal1(0);
            $ecart->setFinal2(0);
            $ecart->setFinal3(0);
        $manager->persist($ecart);

        $manager->flush();
    }
}
