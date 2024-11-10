<?php

namespace App\EventListener;

use App\Entity\Animal;
use App\Document\AnimalMongoDocument;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Doctrine\ODM\MongoDB\DocumentManager;

class AnimalEventListener
{
    private DocumentManager $documentManager;

    public function __construct(DocumentManager $documentManager)
    {
        $this->documentManager = $documentManager;
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $this->synchronizeAnimalWithMongo($args);
    }

    public function postUpdate(LifecycleEventArgs $args)
    {
        $this->synchronizeAnimalWithMongo($args);
    }

    public function preRemove(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        if (!$entity instanceof Animal) {
            return;
        }

        $animalId = $entity->getId();

        $mongoDocument = $this->documentManager->getRepository(AnimalMongoDocument::class)->find($animalId);
        if ($mongoDocument) {
            $this->documentManager->remove($mongoDocument);
            $this->documentManager->flush();
        }
    }

    private function synchronizeAnimalWithMongo(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        if (!$entity instanceof Animal) {
            return;
        }

        $animalId = $entity->getId();
        $animalName = $entity->getName();

        $mongoDocument = $this->documentManager->getRepository(AnimalMongoDocument::class)->find($animalId);
        if (!$mongoDocument) {
            $mongoDocument = new AnimalMongoDocument();
            $mongoDocument->setId($animalId);
        }

        $mongoDocument->setAnimalName($animalName);

        $this->documentManager->persist($mongoDocument);
        $this->documentManager->flush();
    }

    public function incrementClickCount(Animal $animal): void
    {
        $animalId = $animal->getId();

        $mongoDocument = $this->documentManager->getRepository(AnimalMongoDocument::class)->find($animalId);
        if ($mongoDocument) {
            $currentClickCount = $mongoDocument->getClickCount() ?? 0;
            $mongoDocument->setClickCount($currentClickCount + 1);

            $this->documentManager->flush();
        }
    }
}
