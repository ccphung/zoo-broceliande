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
        $this->addReference('Tigre', $jungle1 );
        $jungle1->setLabel('Tiger');
        $manager->persist($jungle1);

        $jungle2 = new Species();
        $this->addReference('Gorille', $jungle2 );
        $jungle2->setLabel('Gorille');
        $manager->persist($jungle2);

        $jungle3 = new Species();
        $this->addReference('Perroquet', $jungle3 );
        $jungle3->setLabel('Perroquet');
        $manager->persist($jungle3);

        $jungle4 = new Species();
        $this->addReference('Anaconda', $jungle4 );
        $jungle4->setLabel('Anaconda');
        $manager->persist($jungle4);

        $ocean1 = new Species();
        $this->addReference('Requin', $ocean1 );
        $ocean1->setLabel('Requin');
        $manager->persist($ocean1);

        $ocean2 = new Species();
        $this->addReference('Dauphin', $ocean2 );
        $ocean2->setLabel('Dauphin');
        $manager->persist($ocean2);

        $ocean3 = new Species();
        $this->addReference('Pieuvre', $ocean3 );
        $ocean3->setLabel('Pieuvre');
        $manager->persist($ocean3);

        $ocean4 = new Species();
        $this->addReference('Tortue', $ocean4 );
        $ocean4->setLabel('Tortue');
        $manager->persist($ocean4);

        $savannah1 = new Species();
        $this->addReference('Lion', $savannah1 );
        $savannah1->setLabel('Lion');
        $manager->persist($savannah1);

        $savannah2 = new Species();
        $this->addReference('Girafe', $savannah2 );
        $savannah2->setLabel('Girafe');
        $manager->persist($savannah2);

        $savannah3 = new Species();
        $this->addReference('Zèbre', $savannah3 );
        $savannah3->setLabel('Zèbre');
        $manager->persist($savannah3);

        $savannah4 = new Species();
        $this->addReference('Éléphant', $savannah4 );
        $savannah4->setLabel('Éléphant');
        $manager->persist($savannah4);

        $forest1 = new Species();
        $this->addReference('Lynx', $forest1 );
        $forest1->setLabel('Lynx');
        $manager->persist($forest1);

        $forest2 = new Species();
        $this->addReference('Ours', $forest2 );
        $forest2->setLabel('Ours');
        $manager->persist($forest2);

        $forest3 = new Species();
        $this->addReference('Hibou', $forest3 );
        $forest3->setLabel('Hibou');
        $manager->persist($forest3);

        $forest4 = new Species();
        $this->addReference('Renard', $forest4 );
        $forest4->setLabel('Renard');
        $manager->persist($forest4);

        $manager->flush();
    }
}
