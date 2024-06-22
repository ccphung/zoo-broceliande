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

        $employe = new User();
        $employe->setFirstName('Cédric');
        $employe->setLastName('Phung');
        $employe->setUsername('cedric3011@outlook.fr');
        $employe->setPassword(
            $this->passwordHasher->hashPassword($employe, 'test'));
        $employe->setRoles(['ROLE_EMPLOYE']);
        $manager->persist($employe);

        $vet = new User();
        $vet->setFirstName('Jean');
        $vet->setLastName('François');
        $vet->setUsername('jean');
        $vet->setPassword(
            $this->passwordHasher->hashPassword($employe, 'test'));
        $vet->setRoles(['ROLE_VET']);
        $manager->persist($vet);

        $manager->flush();
    }
}
