<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $passwordHasher){}
    
    public function load(ObjectManager $manager): void
    {   
        $admin = new User();
        $admin->setFirstName('José');
        $admin->setLastName('Garcia');
        $admin->setUsername('jose@arcadia.fr');
        $admin->setPassword(
            $this->passwordHasher->hashPassword($admin, 'test'));
        $admin->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);

        $manager->flush();
    }
}
