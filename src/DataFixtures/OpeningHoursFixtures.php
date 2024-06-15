<?php

namespace App\DataFixtures;

use App\Entity\OpeningHours;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class OpeningHoursFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $monday = new OpeningHours();
        $monday->setDay('Lundi');
        $monday->setOpen('09:00');
        $monday->setClose('18:30');
        $manager->persist($monday);

        $tuesday = new OpeningHours();
        $tuesday->setDay('Mardi');
        $tuesday->setOpen('09:00');
        $tuesday->setClose('18:30');
        $manager->persist($tuesday);

        $wednesday = new OpeningHours();
        $wednesday->setDay('Mercredi');
        $wednesday->setOpen('09:00');
        $wednesday->setClose('18:30');
        $manager->persist($wednesday);

        $thrusday = new OpeningHours();
        $thrusday->setDay('Jeudi');
        $thrusday->setOpen('09:00');
        $thrusday->setClose('18:30');
        $manager->persist($thrusday);

        $friday = new OpeningHours();
        $friday->setDay('Vendredi');
        $friday->setOpen('09:00');
        $friday->setClose('18:30');
        $manager->persist($friday);

        $saturday = new OpeningHours();
        $saturday->setDay('Samedi');
        $saturday->setOpen('09:00');
        $saturday->setClose('18:30');
        $manager->persist($saturday);

        $sunday = new OpeningHours();
        $sunday->setDay('Dimanche');
        $sunday->setOpen('09:00');
        $sunday->setClose('18:30');
        $manager->persist($sunday);

        $manager->flush();
    }
}
