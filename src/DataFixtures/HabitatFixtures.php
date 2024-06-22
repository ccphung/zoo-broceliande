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
                'imagePath' => 'public/images/habitat/jungle.jpg',
                'comment' => "Pour assurer le bien-être des animaux vivant dans la jungle enchantée, il est crucial de maintenir un équilibre écologique stable en préservant la diversité végétale et en conservant les habitats naturels. Assurez-vous que les zones de refuge et de reproduction sont intactes, offrant aux espèces locales un environnement sûr et naturellement enrichi."
            ],
            [
                'reference' => 'Forêt',
                'name' => 'Forêt Mystérieuse',
                'description' => "Plongez au cœur de la Forêt Mystérieuse, un coin enchanteur de notre zoo où la nature sauvage et la tranquillité se rencontrent. Promenez-vous parmi les arbres imposants, les ruisseaux sinueux et la végétation verdoyante qui recréent fidèlement l'habitat naturel de nombreux animaux fascinants.",
                'imageName' => 'forest.jpg',
                'imagePath' => 'public/images/habitat/forest.jpg',
                'comment' => "Dans la forêt mystérieuse, il est essentiel de préserver l'intégrité de l'écosystème en minimisant les perturbations humaines et en évitant la déforestation excessive. Encouragez la plantation d'espèces indigènes et la création de corridors écologiques pour favoriser la connectivité entre les habitats. Promouvez également la recherche scientifique pour mieux comprendre et protéger la biodiversité unique de cette région."
            ],
            [
                'reference' => 'Océan',
                'name' => 'Royaume de l\'Océan',
                'description' => "Plongez dans le Royaume de l'Océan, une section fascinante de notre zoo où les mystères des profondeurs marines se dévoilent devant vos yeux. Explorez les vastes environnements aquatiques recréés pour accueillir une incroyable diversité de vie marine.",
                'imageName' => 'ocean.jpg',
                'imagePath' => 'public/images/habitat/ocean.jpg',
                'comment' => "Pour maintenir la santé des écosystèmes marins du royaume de l'océan, il est crucial de promouvoir la conservation marine et la gestion durable des ressources océaniques. Adoptez des pratiques de pêche responsables, protégez les habitats critiques comme les récifs coralliens et soutenez les initiatives de nettoyage des déchets plastiques pour préserver la qualité de l'eau et la biodiversité marine."
            ],
            [
                'reference' => 'Savane',
                'name' => 'Savane Sauvage',
                'description' => "La Savane Sauvage n'est pas seulement un lieu d'émerveillement, mais aussi d'apprentissage. Informez-vous sur les défis auxquels la faune de la savane est confrontée, comme le braconnage et la perte d'habitat, et découvrez les initiatives de conservation mises en place pour protéger ces animaux emblématiques.",
                'imageName' => 'savannah.jpg',
                'imagePath' => 'public/images/habitat/savannah.jpg',
                'comment' => "La savane sauvage nécessite une gestion prudente pour maintenir l'équilibre entre la faune et les ressources naturelles. Favorisez la coexistence pacifique entre les animaux sauvages et les communautés locales en encourageant des pratiques agricoles durables et la protection des couloirs de migration. Promouvez également l'éducation environnementale pour sensibiliser à l'importance de la conservation des écosystèmes uniques de la savane."
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
