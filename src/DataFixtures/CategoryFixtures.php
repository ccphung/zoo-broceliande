<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categories = [
            'Activité',
            'Visite',
            'Restauration',
            'Evenement'
        ];

        foreach ($categories as $categoryLabel) {
            $category = new Category();
            $category->setLabel($categoryLabel);
            $manager->persist($category);

            $this->addReference($categoryLabel, $category);
        }

        $manager->flush();
    }
}

