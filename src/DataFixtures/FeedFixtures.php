<?php

namespace App\DataFixtures;

use App\Entity\Feed;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class FeedFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $feedsData = [
            ['animal' => 'Rajah', 'food' => 'Viande', 'quantity' => 5000],
            ['animal' => 'Koko', 'food' => 'Fruits', 'quantity' => 3000],
            ['animal' => 'Paco', 'food' => 'Granulés', 'quantity' => 2000],
            ['animal' => 'Slyther', 'food' => 'Insectes', 'quantity' => 4000],
            ['animal' => 'Shadow', 'food' => 'Viande', 'quantity' => 4500],
            ['animal' => 'Baloo', 'food' => 'Fruits', 'quantity' => 3200],
            ['animal' => 'Hedwig', 'food' => 'Granulés', 'quantity' => 1800],
            ['animal' => 'Rusty', 'food' => 'Insectes', 'quantity' => 3500],
            ['animal' => 'Jaws', 'food' => 'Poisson', 'quantity' => 6000],
            ['animal' => 'Flipper', 'food' => 'Poisson', 'quantity' => 5800],
            ['animal' => 'Inky', 'food' => 'Poisson', 'quantity' => 6200],
            ['animal' => 'Shelly', 'food' => 'Herbes', 'quantity' => 2500],
            ['animal' => 'Simba', 'food' => 'Viande', 'quantity' => 4800],
            ['animal' => 'Stretch', 'food' => 'Herbes', 'quantity' => 2800],
            ['animal' => 'Marty', 'food' => 'Fruits', 'quantity' => 3100],
            ['animal' => 'Dumbo', 'food' => 'Herbes', 'quantity' => 2700],
        ];

        $faker = Factory::create();

        foreach ($feedsData as $feedData) {
            $feed = new Feed();
            $feed->setAnimal($this->getReference($feedData['animal']));
            
            $feed->setFood($this->getReference($feedData['food']));

            $feed->setQuantity($feedData['quantity']);
            $date = $faker->dateTimeBetween('-30 days', 'now');
            $feed->setDate($date);

            $manager->persist($feed);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            FoodFixtures::class,
        ];
    }
}


