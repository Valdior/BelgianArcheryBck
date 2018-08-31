<?php

namespace App\DataFixtures;

use App\Entity\Peloton;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class PelotonFixtures extends Fixture  implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $peloton = new Peloton();
        $peloton->setMaxParticipant(30);
        $peloton->setType(Peloton::TYPE_25);
        $peloton->setStartTime(new \DateTime("09/08/2018 13:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_ACG));
        $manager->persist($peloton);

        $$peloton = new Peloton();
        $peloton->setMaxParticipant(30);
        $peloton->setType(Peloton::TYPE_25);
        $peloton->setStartTime(new \DateTime("09/09/2018 13:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_ACG));
        $manager->persist($peloton);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            TournemantFixtures::class
        );
    }
}
