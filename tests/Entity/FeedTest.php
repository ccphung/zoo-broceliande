<?php

namespace App\Tests;

use App\Entity\Feed;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class FeedTest extends KernelTestCase
{
    public function testWithFoodandAnimalNull(): void
    {
        $kernel = self::bootKernel();
        $container = self::getContainer();

        $validator = $container->get(ValidatorInterface::class);

        $feed = new Feed();
        $feed->setQuantity(10);
        $feed->setAnimal(null);
        $feed->setDate(new \DateTime('-1 day'));
        $feed->setFood(null);

        $errors = $validator->validate($feed);
        $this->assertCount(2, $errors);

        $errorMessages = array_map(function ($error) {
            return $error->getMessage();
        }, iterator_to_array($errors));
    
        $this->assertContains('L\'animal est obligatoire.', $errorMessages);
        $this->assertContains('La nourriture est obligatoire.', $errorMessages);

    }

    public function testWithNegativeQuantityFutureDateAndFoodAndAnimalNull(): void
    {
        $kernel = self::bootKernel();
        $container = self::getContainer();

        $validator = $container->get(ValidatorInterface::class);

        $feed = new Feed();
        $feed->setQuantity(-5);
        $feed->setDate(new \DateTime('+1 day'));
        $errors = $validator->validate($feed);

        // excepted errors on food null, animal null, quantity negative and future date
        $this->assertCount(4, $errors);

        $errorMessages = array_map(function ($error) {
            return $error->getMessage();
        }, iterator_to_array($errors));

        $this->assertContains('La quantité doit être supérieure ou égale à 1.', $errorMessages);
        $this->assertContains('La date ne peut pas être dans le futur.', $errorMessages);
        $this->assertContains('L\'animal est obligatoire.', $errorMessages);
        $this->assertContains('La nourriture est obligatoire.', $errorMessages);
    }
}
