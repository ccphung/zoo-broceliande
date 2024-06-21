<?php

namespace App\DataFixtures;

use App\Entity\Animal;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ZanimalFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $animal1 = new Animal();
        $animal1->setName('Rajah');
        $animal1->setHabitat($this->getReference('Jungle'));
        $animal1->setSpecies($this->getReference('Tigre'));
        $animal1->setImageFile(new UploadedFile('public/images/animal/tigre.jpg','public/images/animal/tigre.jpg', 'blob', UPLOAD_ERR_OK, true));
        $manager->persist($animal1);

        $animal2 = new Animal();
        $animal2->setName('Koko');
        $animal2->setHabitat($this->getReference('Jungle'));
        $animal2->setSpecies($this->getReference('Gorille'));
        $animal2->setImageFile(new UploadedFile('public/images/animal/gorille.jpg','public/images/animal/gorille.jpg', 'blob', UPLOAD_ERR_OK, true));
        $manager->persist($animal2);

        $animal3 = new Animal();
        $animal3->setName('Paco');
        $animal3->setHabitat($this->getReference('Jungle'));
        $animal3->setSpecies($this->getReference('Perroquet'));
        $animal3->setImageFile(new UploadedFile('public/images/animal/perroquet.jpg','public/images/animal/perroquet.jpg', 'blob', UPLOAD_ERR_OK, true));
        $manager->persist($animal3);

        $animal4 = new Animal();
        $animal4->setName('Slyther');
        $animal4->setHabitat($this->getReference('Jungle'));
        $animal4->setSpecies($this->getReference('Anaconda'));
        $animal4->setImageFile(new UploadedFile('public/images/animal/anaconda.jpg','public/images/animal/anaconda.jpg', 'blob', UPLOAD_ERR_OK, true));
        $manager->persist($animal4);

        $animal5 = new Animal();
        $animal5->setName('Shadow');
        $animal5->setHabitat($this->getReference('Forêt'));
        $animal5->setSpecies($this->getReference('Lynx'));
        $animal5->setImageFile(new UploadedFile('public/images/animal/lynx.jpg','public/images/animal/lynx.jpg', 'blob', UPLOAD_ERR_OK, true));
        $manager->persist($animal5);

        $animal6 = new Animal();
        $animal6->setName('Baloo');
        $animal6->setHabitat($this->getReference('Forêt'));
        $animal6->setSpecies($this->getReference('Ours'));
        $animal6->setImageFile(new UploadedFile('public/images/animal/ours.jpg','public/images/animal/ours.jpg', 'blob', UPLOAD_ERR_OK, true));
        $manager->persist($animal6);

        $animal7 = new Animal();
        $animal7->setName('Hedwig');
        $animal7->setHabitat($this->getReference('Forêt'));
        $animal7->setSpecies($this->getReference('Hibou'));
        $animal7->setImageFile(new UploadedFile('public/images/animal/hibou.jpg','public/images/animal/hibou.jpg', 'blob', UPLOAD_ERR_OK, true));
        $manager->persist($animal7);

        $animal8 = new Animal();
        $animal8->setName('Rusty');
        $animal8->setHabitat($this->getReference('Forêt'));
        $animal8->setSpecies($this->getReference('Renard'));
        $animal8->setImageFile(new UploadedFile('public/images/animal/renard.jpg','public/images/animal/renard.jpg', 'blob', UPLOAD_ERR_OK, true));
        $manager->persist($animal8);

        $animal9 = new Animal();
        $animal9->setName('Jaws');
        $animal9->setHabitat($this->getReference('Océan'));
        $animal9->setSpecies($this->getReference('Requin'));
        $animal9->setImageFile(new UploadedFile('public/images/animal/requin.jpg','public/images/animal/requin.jpg', 'blob', UPLOAD_ERR_OK, true));
        $manager->persist($animal9);

        $animal10 = new Animal();
        $animal10->setName('Flipper');
        $animal10->setHabitat($this->getReference('Océan'));
        $animal10->setSpecies($this->getReference('Dauphin'));
        $animal10->setImageFile(new UploadedFile('public/images/animal/dauphin.jpg','public/images/animal/dauphin.jpg', 'blob', UPLOAD_ERR_OK, true));
        $manager->persist($animal10);

        $animal11 = new Animal();
        $animal11->setName('Inky');
        $animal11->setHabitat($this->getReference('Océan'));
        $animal11->setSpecies($this->getReference('Pieuvre'));
        $animal11->setImageFile(new UploadedFile('public/images/animal/pieuvre.jpg','public/images/animal/pieuvre.jpg', 'blob', UPLOAD_ERR_OK, true));
        $manager->persist($animal11);

        $animal12 = new Animal();
        $animal12->setName('Shelly');
        $animal12->setHabitat($this->getReference('Océan'));
        $animal12->setSpecies($this->getReference('Tortue'));
        $animal12->setImageFile(new UploadedFile('public/images/animal/tortue.jpg','public/images/animal/tortue.jpg', 'blob', UPLOAD_ERR_OK, true));
        $manager->persist($animal12);

        $animal13 = new Animal();
        $animal13->setName('Simba');
        $animal13->setHabitat($this->getReference('Savane'));
        $animal13->setSpecies($this->getReference('Lion'));
        $animal13->setImageFile(new UploadedFile('public/images/animal/lion.jpg','public/images/animal/lion.jpg', 'blob', UPLOAD_ERR_OK, true));
        $manager->persist($animal13);

        $animal14 = new Animal();
        $animal14->setName('Stretch');
        $animal14->setHabitat($this->getReference('Savane'));
        $animal14->setSpecies($this->getReference('Girafe'));
        $animal14->setImageFile(new UploadedFile('public/images/animal/girafe.jpg','public/images/animal/girafe.jpg', 'blob', UPLOAD_ERR_OK, true));
        $manager->persist($animal14);

        $animal15 = new Animal();
        $animal15->setName('Marty');
        $animal15->setHabitat($this->getReference('Savane'));
        $animal15->setSpecies($this->getReference('Zèbre'));
        $animal15->setImageFile(new UploadedFile('public/images/animal/zebre.jpg','public/images/animal/zebre.jpg', 'blob', UPLOAD_ERR_OK, true));
        $manager->persist($animal15);

        $animal16 = new Animal();
        $animal16->setName('Dumbo');
        $animal16->setHabitat($this->getReference('Savane'));
        $animal16->setSpecies($this->getReference('Éléphant'));
        $animal16->setImageFile(new UploadedFile('public/images/animal/elephant.jpg','public/images/animal/elephant.jpg', 'blob', UPLOAD_ERR_OK, true));
        $manager->persist($animal16);
        

        $manager->flush();
    }
}
