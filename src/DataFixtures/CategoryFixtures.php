<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $activite = new Category();
        $this->addReference('Activité', $activite );
        $activite->setLabel('Activité');
        $manager->persist($activite);

        $visite = new Category();
        $this->addReference('Visite', $visite );
        $visite->setLabel('Visite');
        $manager->persist($visite);

        $restauration = new Category();
        $this->addReference('Restauration', $restauration );
        $restauration->setLabel('Restauration');
        $manager->persist($restauration);

        $evenement = new Category();
        $this->addReference('Evenement', $evenement );
        $evenement->setLabel('Evenement');
        $manager->persist($evenement);

        $manager->flush();
    }
}
