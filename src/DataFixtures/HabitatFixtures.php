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
        $jungle = new Habitat();
        $this->addReference('Jungle', $jungle );
        $jungle->setName('Jungle Enchantée');
        $jungle->setDescription("Entrez dans la Jungle Enchantée, une partie captivante de notre zoo où la nature luxuriante et les sons exotiques vous transportent au cœur des forêts tropicales. Découvrez une végétation dense, des arbres majestueux et des plantes exotiques qui recréent fidèlement l'habitat naturel de nombreux animaux fascinants.");
        $jungle->setImageName('jungle.jpg');
        $jungle->setImageFile(new UploadedFile('public/images/habitat/jungle.jpg','public/images/habitat/jungle.jpg', 'blob', UPLOAD_ERR_OK, true));
        $manager->persist($jungle);

        $forest = new Habitat();
        $this->addReference('Forêt', $forest );
        $forest->setName('Forêt Mystérieuse');
        $forest->setDescription("Plongez au cœur de la Forêt Mystérieuse, un coin enchanteur de notre zoo où la nature sauvage et la tranquillité se rencontrent. Promenez-vous parmi les arbres imposants, les ruisseaux sinueux et la végétation verdoyante qui recréent fidèlement l'habitat naturel de nombreux animaux fascinants.");
        $forest->setImageName('forest.jpg');
        $forest->setImageFile(new UploadedFile('public/images/habitat/forest.jpg','public/images/habitat/forest.jpg', 'blob', UPLOAD_ERR_OK, true));
        $manager->persist($forest);

        $ocean = new Habitat();
        $this->addReference('Océan', $ocean );
        $ocean->setName('Royaume de l\'Océan');
        $ocean->setDescription("Plongez dans le Royaume de l'Océan, une section fascinante de notre zoo où les mystères des profondeurs marines se dévoilent devant vos yeux. Explorez les vastes environnements aquatiques recréés pour accueillir une incroyable diversité de vie marine.");
        $ocean->setImageName('ocean.jpg');
        $ocean->setImageFile(new UploadedFile('public/images/habitat/ocean.jpg','public/images/habitat/ocean.jpg', 'blob', UPLOAD_ERR_OK, true));
        $manager->persist($ocean);

        $savannah = new Habitat();
        $this->addReference('Savane', $savannah );
        $savannah->setName('Savane Sauvage');
        $savannah->setDescription("La Savane Sauvage n'est pas seulement un lieu d'émerveillement, mais aussi d'apprentissage. Informez-vous sur les défis auxquels la faune de la savane est confrontée, comme le braconnage et la perte d'habitat, et découvrez les initiatives de conservation mises en place pour protéger ces animaux emblématiques.");
        $savannah->setImageName('savannah.jpg');
        $savannah->setImageFile(new UploadedFile('public/images/habitat/savannah.jpg','public/images/habitat/savannah.jpg', 'blob', UPLOAD_ERR_OK, true));
        $manager->persist($savannah);

        $manager->flush();
    }
}
