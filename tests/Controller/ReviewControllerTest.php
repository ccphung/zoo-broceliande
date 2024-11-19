<?php

namespace App\Tests\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ReviewCrudControllerTest extends WebTestCase
{
    public function testReviewFormValidation(): void
    {
        $client = static::createClient();

        $client->request('GET', '/review');

        $client->submitForm('review_submit', [
            'review[pseudo]' => '',
            'review[comment]' => 'Commentaire test',
        ]);

        $this->assertSelectorTextContains('.text-danger', 'Veuillez indiquer un pseudo');

    }
}

