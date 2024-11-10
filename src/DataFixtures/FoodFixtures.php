<?php

namespace App\DataFixtures;

use App\Entity\Food;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FoodFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $foods = [
            'Viande',
            'Fruits',
            'Légumes',
            'Poisson',
            'Insectes',
            'Granulés',
            'Herbes',
            'Nectar',
        ];

        foreach ($foods as $name) {
            $food = new Food();
            $food->setName($name);

            $manager->persist($food);

            $this->addReference($name, $food);
        }

        $manager->flush();
    }
}
