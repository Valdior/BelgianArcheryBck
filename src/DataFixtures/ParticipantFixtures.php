<?php

namespace App\DataFixtures;

use App\Entity\Participant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ParticipantFixtures extends Fixture  implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $participant = new Participant();
        $participant->setArcher($this->getReference(ArcherFixtures::ARCHER_MP));
        $participant->setCategory();
        $participant->setArcher($this->getReference(ArcherFixtures::ARCHER_MP));
        $participant->setArcher($this->getReference(ArcherFixtures::ARCHER_MP));
        $participant->setArcher($this->getReference(ArcherFixtures::ARCHER_MP));
        $participant->setArcher($this->getReference(ArcherFixtures::ARCHER_MP));
        $participant->setArcher($this->getReference(ArcherFixtures::ARCHER_MP));
    }

    public function getDependencies()
    {
        return array(
            TournamentFixtures::class,
            ArcherFixtures::class,
        );
    }
}
