<?php

namespace App\DataFixtures;

use App\Entity\OpeningHours;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class OpeningHoursFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $days = [
            'Lundi' => ['09:00', '18:30'],
            'Mardi' => ['09:00', '18:30'],
            'Mercredi' => ['09:00', '18:30'],
            'Jeudi' => ['09:00', '18:30'],
            'Vendredi' => ['09:00', '18:30'],
            'Samedi' => ['09:00', '18:30'],
            'Dimanche' => ['09:00', '18:30'],
        ];

        foreach ($days as $day => $hours) {
            $openingHours = new OpeningHours();
            $openingHours->setDay($day);
            $openingHours->setOpen($hours[0]);
            $openingHours->setClose($hours[1]);
            $manager->persist($openingHours);
        }

        $manager->flush();
    }
}
