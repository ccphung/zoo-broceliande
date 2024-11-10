<?php

namespace App\DataFixtures;

use App\Entity\VetReport;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

        
class VetReportFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $reportsData = [
            [
                'reference' => 'Rajah', 
                'condition' => 'Bonne santé', 
                'foodReference' => 'Légumes', 
                'foodQuantity' => 125, 
                'userReference' => 'Jean', 
                'visitDate' => '2023-06-01', 
                'conditionDetail' => "Lors de l'examen, Rajah, un tigre de la jungle, présentait une légère léthargie avec des éternuements fréquents et un écoulement nasal clair. Aucune blessure externe n'a été observée, mais son pelage était terne avec une légère perte de poils localisée. Bien qu'il montre une légère baisse d'appétit pour les viandes habituelles, il boit normalement. Le traitement recommandé inclut des antibiotiques pour une possible infection des voies respiratoires, avec une surveillance étroite et du repos pour favoriser la récupération."
            ],
            [
                'reference' => 'Koko', 
                'condition' => 'En bonne santé, avec quelques signes de fatigue.', 
                'foodReference' => 'Fruits', 
                'foodQuantity' => 150, 
                'userReference' => 'Jean', 
                'visitDate' => '2023-06-05', 
                'conditionDetail' => "Koko, un gorille de la jungle, semblait en bonne santé générale, bien qu'il présentait quelques signes de fatigue. Aucune autre anomalie notable n'a été détectée lors de l'examen. Recommandation de surveiller de près son niveau d'activité et son alimentation."
            ],
            [
                'reference' => 'Paco', 
                'condition' => 'Santé générale stable', 
                'foodReference' => 'Granulés', 
                'foodQuantity' => 100, 
                'userReference' => 'Jean', 
                'visitDate' => '2023-06-08', 
                'conditionDetail' => "Paco, un perroquet vivant dans la jungle, semblait en bonne santé. Son plumage était brillant et il était actif. Aucun signe de maladie ou de comportement anormal n'a été observé lors de l'examen."
            ],
            [
                'reference' => 'Slyther', 
                'condition' => "Léthargie et perte d'appétit", 
                'foodReference' => 'Insectes', 
                'foodQuantity' => 75, 
                'userReference' => 'Jean', 
                'visitDate' => '2023-06-12', 
                'conditionDetail' => "Slyther, un anaconda de la jungle, présentait des signes de léthargie et une perte d'appétit. Aucune blessure ou anomalie physique n'a été détectée. Recommandation de surveiller de près son comportement alimentaire et son activité physique."
            ],
            [
                'reference' => 'Shadow', 
                'condition' => 'Bonne santé', 
                'foodReference' => 'Viande', 
                'foodQuantity' => 200, 
                'userReference' => 'Jean', 
                'visitDate' => '2023-06-15', 
                'conditionDetail' => "Shadow, un lynx de la forêt, était en bonne santé lors de l'examen. Aucun problème physique ou comportemental n'a été observé. Recommandation de continuer à surveiller son état de santé général."
            ],
            [
                'reference' => 'Baloo', 
                'condition' => 'En bonne santé générale', 
                'foodReference' => 'Fruits', 
                'foodQuantity' => 180, 
                'userReference' => 'Jean', 
                'visitDate' => '2023-06-18', 
                'conditionDetail' => "Baloo, un ours de la forêt, semblait en bonne santé générale. Il était alerte et réactif lors de l'examen. Aucun problème de santé notable n'a été identifié."
            ],
            [
                'reference' => 'Hedwig', 
                'condition' => 'Légers signes de fatigue', 
                'foodReference' => 'Nectar', 
                'foodQuantity' => 50, 
                'userReference' => 'Jean', 
                'visitDate' => '2023-06-20', 
                'conditionDetail' => "Hedwig, un hibou de la forêt, présentait de légers signes de fatigue lors de l'examen. Aucune autre anomalie physique ou comportementale n'a été observée. Recommandation de surveiller de près son niveau d'activité et son alimentation."
            ],
            [
                'reference' => 'Rusty',
                'condition' => 'Bonne santé générale',
                'foodReference' => 'Granulés',
                'foodQuantity' => 100,
                'userReference' => 'Jean',
                'visitDate' => '2023-06-02',
                'conditionDetail' => "Rusty, un renard de la forêt, était en bonne santé générale lors de l'examen. Aucun problème physique ou comportemental n'a été observé. Recommandation de continuer à surveiller son état de santé."
            ],
            [
                'reference' => 'Jaws',
                'condition' => 'En bonne santé, mais nécessite une surveillance',
                'foodReference' => 'Poisson',
                'foodQuantity' => 150,
                'userReference' => 'Jean',
                'visitDate' => '2023-06-05',
                'conditionDetail' => "Jaws, un requin de l'océan, était en bonne santé lors de l'examen. Cependant, il a montré un comportement plus agité que d'habitude, ce qui nécessite une surveillance continue de son environnement et de son comportement alimentaire."
            ],
            [
                'reference' => 'Flipper',
                'condition' => 'Santé générale stable',
                'foodReference' => 'Poisson',
                'foodQuantity' => 100,
                'userReference' => 'Jean',
                'visitDate' => '2023-06-08',
                'conditionDetail' => "Flipper, un dauphin de l'océan, semblait en bonne santé générale lors de l'examen. Aucun problème de santé notable n'a été détecté. Recommandation de continuer à observer son comportement dans son environnement naturel."
            ],
            [
                'reference' => 'Inky',
                'condition' => 'Bonne santé',
                'foodReference' => 'Insectes',
                'foodQuantity' => 75,
                'userReference' => 'Jean',
                'visitDate' => '2023-06-10',
                'conditionDetail' => "Inky, une pieuvre de l'océan, était en bonne santé lors de l'examen. Aucun signe de maladie ou de comportement anormal n'a été observé. Recommandation de continuer à surveiller son environnement et son alimentation habituelle."
            ],
            [
                'reference' => 'Shelly',
                'condition' => 'Santé générale stable',
                'foodReference' => 'Herbes',
                'foodQuantity' => 80,
                'userReference' => 'Jean',
                'visitDate' => '2023-06-12',
                'conditionDetail' => "Shelly, une tortue de l'océan, semblait en bonne santé générale lors de l'examen. Son carapace était solide et son activité normale. Aucun problème de santé n'a été identifié."
            ],
            [
                'reference' => 'Simba',
                'condition' => 'Santé générale stable',
                'foodReference' => 'Viande',
                'foodQuantity' => 200,
                'userReference' => 'Jean',
                'visitDate' => '2023-06-15',
                'conditionDetail' => "Simba, un lion de la savane, semblait en bonne santé générale lors de l'examen. Aucun problème de santé notable n'a été détecté. Recommandation de continuer à surveiller son activité et son alimentation dans son habitat naturel."
            ],
            [
                'reference' => 'Stretch',
                'condition' => 'Bonne santé, mais besoin de contrôle régulier',
                'foodReference' => 'Herbes',
                'foodQuantity' => 120,
                'userReference' => 'Jean',
                'visitDate' => '2023-06-18',
                'conditionDetail' => "Stretch, une girafe de la savane, était en bonne santé lors de l'examen. Cependant, sa taille et son cou long nécessitent un contrôle régulier pour détecter toute anomalie potentielle. Recommandation de continuer à surveiller son alimentation et son comportement."
            ],
            [
                'reference' => 'Marty',
                'condition' => 'Bonne santé générale',
                'foodReference' => 'Herbes',
                'foodQuantity' => 150,
                'userReference' => 'Jean',
                'visitDate' => '2023-06-20',
                'conditionDetail' => "Marty, un zèbre de la savane, semblait en bonne santé générale lors de l'examen. Aucun problème de santé ou de comportement n'a été observé. Recommandation de continuer à surveiller son environnement et son alimentation."
            ],
            [
                'reference' => 'Dumbo',
                'condition' => 'En bonne santé, mais présente une légère sensibilité cutanée',
                'foodReference' => 'Fruits',
                'foodQuantity' => 100,
                'userReference' => 'Jean',
                'visitDate' => '2023-06-22',
                'conditionDetail' => "Dumbo, un éléphant de la savane, était en bonne santé générale lors de l'examen. Cependant, il a montré une légère sensibilité cutanée autour des oreilles et de la trompe. Recommandation de continuer à surveiller l'état de sa peau et à éviter les irritants potentiels."
            ],
        ];


        foreach ($reportsData as $data) {
            $report = new VetReport();
            $report->setAnimal($this->getReference($data['reference']));
            $report->setAnimalCondition($data['condition']);
            $report->setSuggestedFood($this->getReference($data['foodReference']));
            $report->setFoodQuantity($data['foodQuantity']);
            $report->setUser($this->getReference($data['userReference']));
            $report->setVisitDate(new \DateTime($data['visitDate']));
            $report->setAnimalConditionDetail($data['conditionDetail']);

            $manager->persist($report);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AnimalFixtures::class,
            FoodFixtures::class,
            UserFixtures::class,
        ];
    }
}
