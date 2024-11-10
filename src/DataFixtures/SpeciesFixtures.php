<?php

namespace App\DataFixtures;

use App\Entity\Species;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SpeciesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $speciesData = [
            ['reference' => 'Tigre', 'label' => 'Tiger'],
            ['reference' => 'Gorille', 'label' => 'Gorille'],
            ['reference' => 'Perroquet', 'label' => 'Perroquet'],
            ['reference' => 'Anaconda', 'label' => 'Anaconda'],
            ['reference' => 'Requin', 'label' => 'Requin'],
            ['reference' => 'Dauphin', 'label' => 'Dauphin'],
            ['reference' => 'Pieuvre', 'label' => 'Pieuvre'],
            ['reference' => 'Tortue', 'label' => 'Tortue'],
            ['reference' => 'Lion', 'label' => 'Lion'],
            ['reference' => 'Girafe', 'label' => 'Girafe'],
            ['reference' => 'Zèbre', 'label' => 'Zèbre'],
            ['reference' => 'Éléphant', 'label' => 'Éléphant'],
            ['reference' => 'Lynx', 'label' => 'Lynx'],
            ['reference' => 'Ours', 'label' => 'Ours'],
            ['reference' => 'Hibou', 'label' => 'Hibou'],
            ['reference' => 'Renard', 'label' => 'Renard'],
        ];

        foreach ($speciesData as $data) {
            $species = new Species();
            $this->addReference($data['reference'], $species);
            $species->setLabel($data['label']);
            $manager->persist($species);
        }

        $manager->flush();
    }
}
