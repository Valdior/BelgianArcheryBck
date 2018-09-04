<?php

namespace App\DataFixtures;

use App\Entity\Participant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ParticipantFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $participant = new Participant();
        $participant->setArcher($this->getReference(ArcherFixtures::ARCHER_MP));
        $participant->setPeloton($this->getReference(PelotonFixtures::PELOTON_AGC_1));
        $participant->setCategory($this->getReference(ArcherCategoryFixtures::CAT_RH1));
        $participant->setPoints(0);
        $participant->setNumberOfTen(0);
        $participant->setIsForfeited(false);

        $manager->persist($participant);

        $participant = new Participant();
        $participant->setArcher($this->getReference(ArcherFixtures::ARCHER_GC));
        $participant->setPeloton($this->getReference(PelotonFixtures::PELOTON_AGC_2));
        $participant->setCategory($this->getReference(ArcherCategoryFixtures::CAT_RH2));
        $participant->setPoints(0);
        $participant->setNumberOfTen(0);
        $participant->setIsForfeited(false);

        $manager->persist($participant);

        $manager->flush($participant);
    }

    public function getDependencies()
    {
        return array(
            ArcherCategoryFixtures::class,
            PelotonFixtures::class,            
            ArcherFixtures::class,
        );
    }
}
