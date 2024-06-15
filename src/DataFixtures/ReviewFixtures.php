<?php

namespace App\DataFixtures;

use App\Entity\Review;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ReviewFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $review1 = new Review();
        $review1->setPseudo("Emma");
        $review1->setComment("Ce zoo est un véritable sanctuaire pour la diversité animale! Chaque enclos est soigneusement aménagé pour recréer l'habitat naturel des animaux, offrant ainsi une expérience immersive.");
        $manager->persist($review1);

        $review2 = new Review();
        $review2->setPseudo("Lucas");
        $review2->setComment("J'ai été impressionné par l'engagement envers le bien-être des animaux ici. Chaque espèce semble bien soignée et heureuse, ce qui rend la visite d'autant plus enrichissante.");
        $manager->persist($review2);

        $review3 = new Review();
        $review3->setPseudo("Hugo");
        $review3->setComment("Une journée bien passée au zoo! Les installations sont modernes et bien entretenues, et il y a une variété étonnante d'animaux à découvrir à chaque coin.");
        $manager->persist($review3);

        $review4 = new Review();
        $review4->setPseudo("Léa");
        $review4->setComment("Les programmes éducatifs sont excellents ici, offrant aux visiteurs de toutes les générations une chance unique d'apprendre sur la conservation et la protection des espèces menacées.");
        $manager->persist($review4);

        $review5 = new Review();
        $review5->setPseudo("Nathan");
        $review5->setComment("Les enfants adorent! Les aires de jeux interactives et les spectacles d'animaux sont une vraie attraction, rendant ce zoo non seulement éducatif mais aussi amusant pour toute la famille.");
        $manager->persist($review5);

        $manager->flush();
    }
}
