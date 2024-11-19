<?php

namespace App\Tests\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdminControllerTest extends WebTestCase

{
    public function testAdminAccessWithVisitor(): void
    {
        $client = static::createClient();

        // client tries to access /admin
        $client->request('GET', '/admin');

        $this->assertResponseRedirects('/login', 302, 'Utilisateur non authentité est redirigé vers la page de connexion');
    }

    public function createUserWithRole(string $role): User
    {
        $entityManager = static::getContainer()->get('doctrine')->getManager();

        $user = new User();
        $user->setFirstname('test');
        $user->setLastname('test');
        $user->setPassword('test');
        # create a new user at each test
        $user->setUsername('testUser_' . time());
        $user->setRoles([$role]);

        $entityManager->persist($user);
        $entityManager->flush();

        return $user;
    }

    public function testAdminAccessWithAuthenticatedAdminUser(): void
    {
        $client = static::createClient();

        // Create new admin
        $user = $this->createUserWithRole('ROLE_ADMIN');

        // Authentification with admin user
        $client->loginUser($user);

        $client->request('GET', '/admin');

        $this->assertResponseIsSuccessful();
    }
}
