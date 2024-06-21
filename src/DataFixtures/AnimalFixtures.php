<?php

namespace App\DataFixtures;

use App\Entity\Animal;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AnimalFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $animals = [
            ['name' => 'Rajah', 'habitat' => 'Jungle', 'species' => 'Tigre', 'image' => 'public/images/animal/tigre.jpg'],
            ['name' => 'Koko', 'habitat' => 'Jungle', 'species' => 'Gorille', 'image' => 'public/images/animal/gorille.jpg'],
            ['name' => 'Paco', 'habitat' => 'Jungle', 'species' => 'Perroquet', 'image' => 'public/images/animal/perroquet.jpg'],
            ['name' => 'Slyther', 'habitat' => 'Jungle', 'species' => 'Anaconda', 'image' => 'public/images/animal/anaconda.jpg'],
            ['name' => 'Shadow', 'habitat' => 'Forêt', 'species' => 'Lynx', 'image' => 'public/images/animal/lynx.jpg'],
            ['name' => 'Baloo', 'habitat' => 'Forêt', 'species' => 'Ours', 'image' => 'public/images/animal/ours.jpg'],
            ['name' => 'Hedwig', 'habitat' => 'Forêt', 'species' => 'Hibou', 'image' => 'public/images/animal/hibou.jpg'],
            ['name' => 'Rusty', 'habitat' => 'Forêt', 'species' => 'Renard', 'image' => 'public/images/animal/renard.jpg'],
            ['name' => 'Jaws', 'habitat' => 'Océan', 'species' => 'Requin', 'image' => 'public/images/animal/requin.jpg'],
            ['name' => 'Flipper', 'habitat' => 'Océan', 'species' => 'Dauphin', 'image' => 'public/images/animal/dauphin.jpg'],
            ['name' => 'Inky', 'habitat' => 'Océan', 'species' => 'Pieuvre', 'image' => 'public/images/animal/pieuvre.jpg'],
            ['name' => 'Shelly', 'habitat' => 'Océan', 'species' => 'Tortue', 'image' => 'public/images/animal/tortue.jpg'],
            ['name' => 'Simba', 'habitat' => 'Savane', 'species' => 'Lion', 'image' => 'public/images/animal/lion.jpg'],
            ['name' => 'Stretch', 'habitat' => 'Savane', 'species' => 'Girafe', 'image' => 'public/images/animal/girafe.jpg'],
            ['name' => 'Marty', 'habitat' => 'Savane', 'species' => 'Zèbre', 'image' => 'public/images/animal/zebre.jpg'],
            ['name' => 'Dumbo', 'habitat' => 'Savane', 'species' => 'Éléphant', 'image' => 'public/images/animal/elephant.jpg'],
        ];

        foreach ($animals as $index => $animalData) {
            $animal = new Animal();
            $animal->setName($animalData['name']);
            $animal->setHabitat($this->getReference($animalData['habitat']));
            $animal->setSpecies($this->getReference($animalData['species']));
            $animal->setImageFile(new UploadedFile($animalData['image'], $animalData['image'], 'blob', UPLOAD_ERR_OK, true));
            $manager->persist($animal);

            $this->addReference('animal_' . $index, $animal);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            SpeciesFixtures::class,
            HabitatFixtures::class,
        ];
    }
}
