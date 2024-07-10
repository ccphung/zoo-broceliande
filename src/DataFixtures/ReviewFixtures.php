<?php

namespace App\DataFixtures;

use App\Entity\Review;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ReviewFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $reviews = [
            [
                'pseudo' => 'Emma',
                'comment' => "Ce zoo est un véritable sanctuaire pour la diversité animale! Chaque enclos est soigneusement aménagé pour recréer l'habitat naturel des animaux, offrant ainsi une expérience immersive."
            ],
            [
                'pseudo' => 'Lucas',
                'comment' => "J'ai été impressionné par l'engagement envers le bien-être des animaux ici. Chaque espèce semble bien soignée et heureuse, ce qui rend la visite d'autant plus enrichissante."
            ],
            [
                'pseudo' => 'Hugo',
                'comment' => "Une journée bien passée au zoo! Les installations sont modernes et bien entretenues, et il y a une variété étonnante d'animaux à découvrir à chaque coin."
            ],
            [
                'pseudo' => 'Léa',
                'comment' => "Les programmes éducatifs sont excellents ici, offrant aux visiteurs de toutes les générations une chance unique d'apprendre sur la conservation et la protection des espèces menacées."
            ],
            [
                'pseudo' => 'Nathan',
                'comment' => "Les enfants adorent! Les aires de jeux interactives et les spectacles d'animaux sont une vraie attraction, rendant ce zoo non seulement éducatif mais aussi amusant pour toute la famille."
            ],
        ];

        foreach ($reviews as $reviewData) {
            $review = new Review();
            $review->setPseudo($reviewData['pseudo']);
            $review->setComment($reviewData['comment']);
            $review->setIsVisible(true);
            $manager->persist($review);
        }

        $manager->flush();
    }
}

