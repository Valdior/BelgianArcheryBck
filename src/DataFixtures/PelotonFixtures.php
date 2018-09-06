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

        $peloton = new Peloton();
        $peloton->setMaxParticipant(30);
        $peloton->setType(Peloton::TYPE_18);
        $peloton->setStartTime(new \DateTime("10/06/2018 13:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_FBG));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipant(30);
        $peloton->setType(Peloton::TYPE_18);
        $peloton->setStartTime(new \DateTime("10/06/2018 18:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_FBG));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipant(30);
        $peloton->setType(Peloton::TYPE_18);
        $peloton->setStartTime(new \DateTime("10/07/2018 08:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_FBG));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipant(30);
        $peloton->setType(Peloton::TYPE_18);
        $peloton->setStartTime(new \DateTime("10/07/2018 13:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_FBG));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipant(15);
        $peloton->setType(Peloton::TYPE_18);
        $peloton->setStartTime(new \DateTime("10/13/2018 13:45:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_BEA));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipant(15);
        $peloton->setType(Peloton::TYPE_18);
        $peloton->setStartTime(new \DateTime("10/13/2018 19:15:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_BEA));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipant(15);
        $peloton->setType(Peloton::TYPE_18);
        $peloton->setStartTime(new \DateTime("10/14/2018 14:15:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_BEA));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipant(80);
        $peloton->setType(Peloton::TYPE_18);
        $peloton->setStartTime(new \DateTime("10/14/2018 14:00:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_CAB));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipant(28);
        $peloton->setType(Peloton::TYPE_18);
        $peloton->setStartTime(new \DateTime("10/20/2018 13:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_ADS));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipant(28);
        $peloton->setType(Peloton::TYPE_18);
        $peloton->setStartTime(new \DateTime("10/20/2018 18:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_ADS));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipant(28);
        $peloton->setType(Peloton::TYPE_18);
        $peloton->setStartTime(new \DateTime("10/21/2018 08:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_ADS));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipant(28);
        $peloton->setType(Peloton::TYPE_18);
        $peloton->setStartTime(new \DateTime("10/21/2018 13:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_ADS));
        $manager->persist($peloton);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            TournamentFixtures::class
        );
    }
}
