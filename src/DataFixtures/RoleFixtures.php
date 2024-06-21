<?php

namespace App\DataFixtures;

use App\Entity\Role;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RoleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        
        $admin = new Role();
        $this->addReference('ROLE_ADMIN', $admin);
        $admin->setLabel('ROLE_ADMIN');
        $manager->persist($admin);

        $worker = new Role();
        $this->addReference('ROLE_EMPLOYE', $worker);
        $worker->setLabel('ROLE_EMPLOYE');
        $manager->persist($worker);

        $vet = new Role();
        $this->addReference('ROLE_VET', $vet);
        $vet->setLabel('ROLE_VET');
        $manager->persist($vet);

        $manager->flush();
    }
}
