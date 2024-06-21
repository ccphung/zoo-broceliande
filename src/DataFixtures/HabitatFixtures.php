<?php

namespace App\DataFixtures;

use App\Entity\Habitat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class HabitatFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $habitats = [
            [
                'reference' => 'Jungle',
                'name' => 'Jungle Enchantée',
                'description' => "Entrez dans la Jungle Enchantée, une partie captivante de notre zoo où la nature luxuriante et les sons exotiques vous transportent au cœur des forêts tropicales. Découvrez une végétation dense, des arbres majestueux et des plantes exotiques qui recréent fidèlement l'habitat naturel de nombreux animaux fascinants.",
                'imageName' => 'jungle.jpg',
                'imagePath' => 'public/images/habitat/jungle.jpg'
            ],
            [
                'reference' => 'Forêt',
                'name' => 'Forêt Mystérieuse',
                'description' => "Plongez au cœur de la Forêt Mystérieuse, un coin enchanteur de notre zoo où la nature sauvage et la tranquillité se rencontrent. Promenez-vous parmi les arbres imposants, les ruisseaux sinueux et la végétation verdoyante qui recréent fidèlement l'habitat naturel de nombreux animaux fascinants.",
                'imageName' => 'forest.jpg',
                'imagePath' => 'public/images/habitat/forest.jpg'
            ],
            [
                'reference' => 'Océan',
                'name' => 'Royaume de l\'Océan',
                'description' => "Plongez dans le Royaume de l'Océan, une section fascinante de notre zoo où les mystères des profondeurs marines se dévoilent devant vos yeux. Explorez les vastes environnements aquatiques recréés pour accueillir une incroyable diversité de vie marine.",
                'imageName' => 'ocean.jpg',
                'imagePath' => 'public/images/habitat/ocean.jpg'
            ],
            [
                'reference' => 'Savane',
                'name' => 'Savane Sauvage',
                'description' => "La Savane Sauvage n'est pas seulement un lieu d'émerveillement, mais aussi d'apprentissage. Informez-vous sur les défis auxquels la faune de la savane est confrontée, comme le braconnage et la perte d'habitat, et découvrez les initiatives de conservation mises en place pour protéger ces animaux emblématiques.",
                'imageName' => 'savannah.jpg',
                'imagePath' => 'public/images/habitat/savannah.jpg'
            ]
        ];

        foreach ($habitats as $habitatData) {
            $habitat = new Habitat();
            $habitat->setName($habitatData['name']);
            $habitat->setDescription($habitatData['description']);
            $habitat->setImageName($habitatData['imageName']);
            $habitat->setImageFile(new UploadedFile(
                $habitatData['imagePath'],
                $habitatData['imageName'],
                'image/jpeg',
                UPLOAD_ERR_OK,
                true
            ));
            $manager->persist($habitat);
            $this->addReference($habitatData['reference'], $habitat);
        }

        $manager->flush();
    }
}
