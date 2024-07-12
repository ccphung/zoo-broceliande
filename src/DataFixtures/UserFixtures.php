<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setFirstName('José');
        $admin->setLastName('Garcia');
        $admin->setUsername('jose@arcadia.fr');
        $admin->setPassword(
            $this->passwordHasher->hashPassword($admin, 'test'));
        $admin->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);
        $this->addReference('José', $admin);

        $employe = new User();
        $employe->setFirstName('Cédric');
        $employe->setLastName('Phung');
        $employe->setUsername('cedric@arcadia.fr');
        $employe->setPassword(
            $this->passwordHasher->hashPassword($employe, 'test'));
        $employe->setRoles(['ROLE_EMPLOYE']);
        $manager->persist($employe);
        $this->addReference('Cédric', $employe);

        $vet = new User();
        $vet->setFirstName('Jean');
        $vet->setLastName('François');
        $vet->setUsername('jean@arcadia.fr');
        $vet->setPassword(
            $this->passwordHasher->hashPassword($vet, 'test'));
        $vet->setRoles(['ROLE_VET']);
        $manager->persist($vet);
        $this->addReference('Jean', $vet);

        $manager->flush();
    }
}
