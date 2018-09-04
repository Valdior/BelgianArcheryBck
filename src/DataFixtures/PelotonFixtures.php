<?php

namespace App\DataFixtures;

use App\Entity\Peloton;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class PelotonFixtures extends Fixture implements DependentFixtureInterface
{
    public const PELOTON_AGC_1 = "PELOTON_AGC_1";
    public const PELOTON_AGC_2 = "PELOTON_AGC_2";

    public function load(ObjectManager $manager)
    {
        $peloton = new Peloton();
        $peloton->setMaxParticipant(30);
        $peloton->setType(Peloton::TYPE_25);
        $peloton->setStartTime(new \DateTime("09/08/2018 13:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_ACG));
        $manager->persist($peloton);

        $this->addReference(self::PELOTON_AGC_1, $peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipant(30);
        $peloton->setType(Peloton::TYPE_25);
        $peloton->setStartTime(new \DateTime("09/09/2018 13:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_ACG));
        $manager->persist($peloton);

        $this->addReference(self::PELOTON_AGC_2, $peloton);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            TournamentFixtures::class
        );
    }
}
