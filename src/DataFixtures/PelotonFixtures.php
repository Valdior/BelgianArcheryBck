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

        $peloton = new Peloton();
        $peloton->setMaxParticipant(30);
        $peloton->setType(Peloton::TYPE_25);
        $peloton->setStartTime(new \DateTime("09/09/2018 13:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_ACG));
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

        $peloton = new Peloton();
        $peloton->setMaxParticipant(68);
        $peloton->setType(Peloton::TYPE_18);
        $peloton->setStartTime(new \DateTime("11/18/2018 08:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_MDY));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipant(68);
        $peloton->setType(Peloton::TYPE_18);
        $peloton->setStartTime(new \DateTime("11/18/2018 13:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_MDY));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipant(30);
        $peloton->setType(Peloton::TYPE_18);
        $peloton->setStartTime(new \DateTime("11/24/2018 13:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_ACG_1));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipant(30);
        $peloton->setType(Peloton::TYPE_18);
        $peloton->setStartTime(new \DateTime("11/24/2018 18:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_ACG_1));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipant(30);
        $peloton->setType(Peloton::TYPE_18);
        $peloton->setStartTime(new \DateTime("11/25/2018 13:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_ACG_1));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipant(96);
        $peloton->setType(Peloton::TYPE_18);
        $peloton->setStartTime(new \DateTime("12/16/2018 08:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_LIE));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipant(96);
        $peloton->setType(Peloton::TYPE_18);
        $peloton->setStartTime(new \DateTime("12/16/2018 13:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_LIE));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipant(30);
        $peloton->setType(Peloton::TYPE_18);
        $peloton->setStartTime(new \DateTime("01/12/2019 13:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_ACG_2));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipant(30);
        $peloton->setType(Peloton::TYPE_18);
        $peloton->setStartTime(new \DateTime("01/12/2019 18:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_ACG_2));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipant(30);
        $peloton->setType(Peloton::TYPE_18);
        $peloton->setStartTime(new \DateTime("01/12/2019 13:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_ACG_2));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipant(92);
        $peloton->setType(Peloton::TYPE_18);
        $peloton->setStartTime(new \DateTime("01/20/2019 08:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_ITW));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setMaxParticipant(92);
        $peloton->setType(Peloton::TYPE_18);
        $peloton->setStartTime(new \DateTime("01/20/2019 13:30:00"));
        $peloton->setTournament($this->getReference(TournamentFixtures::TOURN_ITW));
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
 