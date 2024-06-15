<?php

namespace App\DataFixtures;

use App\Entity\Service;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ServiceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $activite1 = new Service();
        $activite1->setName('Nourrir les animaux');
        $activite1->setCategory($this->getReference('Activité'));
        $activite1->setDescription("Découvrez l'envers du décor au zoo lors du nourrissage des animaux ! Assistez à nos soigneurs experts distribuer des repas adaptés à chaque espèce, tout en apprenant sur leur alimentation et leur conservation. Une expérience captivante qui vous rapproche de la nature et de la mission de préservation du zoo.");
        $activite1->setImageName('feeding.jpg');
        $activite1->setImageFile(new UploadedFile('public/images/service/feed.jpg','public/images/service/feed.jpg', 'blob', UPLOAD_ERR_OK, true));
        $manager->persist($activite1);

        $activite2 = new Service();
        $activite2->setName('Interaction avec les animaux');
        $activite2->setCategory($this->getReference('Activité'));
        $activite2->setDescription("Au cœur de notre zoo, nous offrons une expérience unique d'interaction douce avec nos résidents animaux. Venez découvrir le plaisir de caresser nos adorables pensionnaires dans un cadre sécurisé et éducatif. Joignez-vous à nous pour une séance de câlins zoo où le respect de l'animal et le plaisir de l'échange sont au premier plan.");
        $activite2->setImageName('petting.jpg');
        $activite2->setImageFile(new UploadedFile('public/images/service/petting.jpg','public/images/service/petting.jpg', 'blob', UPLOAD_ERR_OK, true));
        $manager->persist($activite2);

        $visite1 = new Service();
        $visite1->setName('Visite gratuite');
        $visite1->setCategory($this->getReference('Visite'));
        $visite1->setDescription("Découvrez la diversité étonnante de la faune mondiale avec des experts passionnés. Apprenez des faits intéressants sur nos résidents à plumes, à poils et à écailles tout en explorant leurs habitats naturels recréés. Une expérience éducative et immersive vous attend à chaque pas.");
        $visite1->setImageName('guide.jpg');
        $visite1->setImageFile(new UploadedFile('public/images/service/guide.jpg','public/images/service/guide.jpg', 'blob', UPLOAD_ERR_OK, true));
        $manager->persist($visite1);

        $visite2 = new Service();
        $visite2->setName('Brocélian Express');
        $visite2->setCategory($this->getReference('Visite'));
        $visite2->setDescription("Montez à bord du petit train pour une visite captivante de notre zoo ! Profitez d'une vue panoramique sur nos habitats animaliers et découvrez des espèces fascinantes venues des quatre coins du monde. Une expérience unique en son genre vous attend à chaque tour de piste.");
        $visite2->setImageName('feeding.jpg');
        $visite2->setImageFile(new UploadedFile('public/images/service/train.jpg','public/images/service/train.jpg', 'blob', UPLOAD_ERR_OK, true));
        $manager->persist($visite2);

        $rest1 = new Service();
        $rest1->setName('Brocélian Express');
        $rest1->setCategory($this->getReference('Restauration'));
        $rest1->setDescription("Détendez-vous et savourez un moment délicieux au restaurant du zoo, offrant une vue imprenable sur nos habitats animaliers. Explorez une sélection de plats savoureux inspirés par la diversité de la faune mondiale, parfaits pour combler vos papilles après une journée d'exploration. Que vous soyez en famille ou entre amis, notre restaurant vous promet une expérience culinaire inoubliable au cœur de l'aventure zooologique.");
        $rest1->setImageName('restaurant.jpg');
        $rest1->setImageFile(new UploadedFile('public/images/service/restaurant.jpg','public/images/service/restaurant.jpg', 'blob', UPLOAD_ERR_OK, true));
        $manager->persist($rest1);

        $rest2 = new Service();
        $rest2->setName('Brocélian Express');
        $rest2->setCategory($this->getReference('Restauration'));
        $rest2->setDescription("Montez à bord du petit train pour une visite captivante de notre zoo ! Profitez d'une vue panoramique sur nos habitats animaliers et découvrez des espèces fascinantes venues des quatre coins du monde. Une expérience unique en son genre vous attend à chaque tour de piste.");
        $rest2->setImageName('snack.jpg');
        $rest2->setImageFile(new UploadedFile('public/images/service/snack.jpg','public/images/service/snack.jpg', 'blob', UPLOAD_ERR_OK, true));
        $manager->persist($rest2);

        $manager->flush();
    }
}
