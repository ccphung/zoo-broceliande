<?php

namespace App\DataFixtures;

use App\Entity\Species;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SpeciesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $jungle1 = new Species();
        $jungle1->setLabel('Tiger');
        $manager->persist($jungle1);

        $jungle2 = new Species();
        $jungle2->setLabel('Gorille');
        $manager->persist($jungle2);

        $jungle3 = new Species();
        $jungle3->setLabel('Perroquet');
        $manager->persist($jungle3);

        $jungle4 = new Species();
        $jungle4->setLabel('Anaconda');
        $manager->persist($jungle4);

        $ocean1 = new Species();
        $ocean1->setLabel('Requin');
        $manager->persist($ocean1);

        $ocean2 = new Species();
        $ocean2->setLabel('Dauphin');
        $manager->persist($ocean2);

        $ocean3 = new Species();
        $ocean3->setLabel('Pieuvre');
        $manager->persist($ocean3);

        $ocean4 = new Species();
        $ocean4->setLabel('Tortue');
        $manager->persist($ocean4);

        $savannah1 = new Species();
        $savannah1->setLabel('Lion');
        $manager->persist($savannah1);

        $savannah2 = new Species();
        $savannah2->setLabel('Girafe');
        $manager->persist($savannah2);

        $savannah3 = new Species();
        $savannah3->setLabel('Zèbre');
        $manager->persist($savannah3);

        $savannah4 = new Species();
        $savannah4->setLabel('Éléphant');
        $manager->persist($savannah4);

        $forest1 = new Species();
        $forest1->setLabel('Lynx');
        $manager->persist($forest1);

        $forest2 = new Species();
        $forest2->setLabel('Ours');
        $manager->persist($forest2);

        $forest3 = new Species();
        $forest3->setLabel('Hibou');
        $manager->persist($forest3);

        $forest4 = new Species();
        $forest4->setLabel('Renard');
        $manager->persist($forest4);

        $manager->flush();
    }
}
