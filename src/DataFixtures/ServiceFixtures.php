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
        $services = [
            [
                'name' => 'Nourrir les animaux',
                'category' => 'Activité',
                'description' => "Découvrez l'envers du décor au zoo lors du nourrissage des animaux ! Assistez à nos soigneurs experts distribuer des repas adaptés à chaque espèce, tout en apprenant sur leur alimentation et leur conservation.",
                'image_name' => 'feeding.jpg',
                'image_file' => new UploadedFile('public/images/service/feed.jpg', 'feed.jpg', 'image/jpeg', UPLOAD_ERR_OK, true)
            ],
            [
                'name' => 'Interaction avec les animaux',
                'category' => 'Activité',
                'description' => "Au cœur de notre zoo, nous offrons une expérience unique d'interaction douce avec nos résidents animaux. Venez découvrir le plaisir de caresser nos adorables pensionnaires dans un cadre sécurisé et éducatif.",
                'image_name' => 'petting.jpg',
                'image_file' => new UploadedFile('public/images/service/petting.jpg', 'petting.jpg', 'image/jpeg', UPLOAD_ERR_OK, true)
            ],
            [
                'name' => 'Visite gratuite',
                'category' => 'Visite',
                'description' => "Découvrez la diversité étonnante de la faune mondiale avec des experts passionnés. Apprenez des faits intéressants sur nos résidents à plumes, à poils et à écailles tout en explorant leurs habitats naturels recréés. Une expérience éducative et immersive vous attend à chaque pas.",
                'image_name' => 'guide.jpg',
                'image_file' => new UploadedFile('public/images/service/guide.jpg', 'guide.jpg', 'image/jpeg', UPLOAD_ERR_OK, true)
            ],
            [
                'name' => 'Arcadia Express',
                'category' => 'Visite',
                'description' => "Montez à bord du petit train pour une visite captivante de notre zoo ! Profitez d'une vue panoramique sur nos habitats animaliers et découvrez des espèces fascinantes venues des quatre coins du monde. Une expérience unique en son genre vous attend à chaque tour de piste.",
                'image_name' => 'train.jpg',
                'image_file' => new UploadedFile('public/images/service/train.jpg', 'train.jpg', 'image/jpeg', UPLOAD_ERR_OK, true)
            ],
            [
                'name' => 'Restaurants',
                'category' => 'Restauration',
                'description' => "Détendez-vous et savourez un moment délicieux au restaurant du zoo, offrant une vue imprenable sur nos habitats animaliers. Explorez une sélection de plats savoureux inspirés par la diversité de la faune mondiale, parfaits pour combler vos papilles après une journée d'exploration.",
                'image_name' => 'restaurant.jpg',
                'image_file' => new UploadedFile('public/images/service/restaurant.jpg', 'restaurant.jpg', 'image/jpeg', UPLOAD_ERR_OK, true)
            ],
            [
                'name' => 'Snacks',
                'category' => 'Restauration',
                'description' => "Découvrez une sélection de snacks délicieux lors de votre visite au zoo ! Des options saines comme les fruits frais aux plaisirs gourmands comme les hot-dogs, il y en a pour tous les goûts pour agrémenter votre journée parmi les animaux.",
                'image_name' => 'snack.jpg',
                'image_file' => new UploadedFile('public/images/service/snack.jpg', 'snack.jpg', 'image/jpeg', UPLOAD_ERR_OK, true)
            ]
        ];

        foreach ($services as $serviceData) {
            $service = new Service();
            $service->setName($serviceData['name']);
            $service->setCategory($this->getReference($serviceData['category']));
            $service->setDescription($serviceData['description']);
            $service->setImageName($serviceData['image_name']);
            $service->setImageFile($serviceData['image_file']);
            $manager->persist($service);
        }

        $manager->flush();
    }
}