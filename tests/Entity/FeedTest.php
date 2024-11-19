<?php

namespace App\Tests;

use App\Entity\Feed;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class FeedTest extends KernelTestCase
{
    public function testQuantityValidation(): void
    {
        $kernel = self::bootKernel();
        $container = self::getContainer();

        $validator = $container->get(ValidatorInterface::class);

        $feed = new Feed();
        $feed->setQuantity(10);

        $errors = $validator->validate($feed);
        $this->assertCount(0, $errors); 

        $feed = new Feed();
        $feed->setQuantity(-5);
        $errors = $validator->validate($feed);
        $this->assertCount(1, $errors); 

        $this->assertEquals('La quantité doit être supérieure ou égale à 0.', $errors[0]->getMessage());
        
        $feed = new Feed();
        $feed->setQuantity(0);

        $errors = $validator->validate($feed);
        $this->assertCount(0, $errors);
    }
}
