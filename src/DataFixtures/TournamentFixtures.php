<?php

namespace App\DataFixtures;

use App\Entity\Tournament;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class TournamentFixtures extends Fixture  implements DependentFixtureInterface
{
    public const TOURN_ACG = "tourn-acg";
    public const TOURN_ADS = "tourn-ads";
    public const TOURN_MDY = "tourn-mdy";
    public const TOURN_ACG_1 = "toun-acg-1";
    public const TOURN_ACG_2 = "toun-acg-2";
    public const TOURN_LIE = "toun-lie";
    public const TOURN_TEL = "toun-tel";
    public const TOURN_ITW = "toun-itw";
    public const TOURN_HUY = "toun-huy";


    public function load(ObjectManager $manager)
    {
        $tournament = new Tournament();
        $tournament->setStartDate(new \DateTime("09/08/2018"));
        $tournament->setEndDate(new \DateTime("09/09/2018"));
        $tournament->setType(Tournament::TYPE_OUTDOOR);
        $tournament->setOrganizer($this->getReference(ClubFixtures::CLUB_ACG));
        $manager->persist($tournament);

        $this->addReference(self::TOURN_ACG, $tournament);

        $tournament = new Tournament();
        $tournament->setStartDate(new \DateTime("10/20/2018"));
        $tournament->setEndDate(new \DateTime("10/21/2018"));
        $tournament->setType(Tournament::TYPE_INDOOR);
        $tournament->setOrganizer($this->getReference(ClubFixtures::CLUB_ADS));
        $manager->persist($tournament);

        $this->addReference(self::TOURN_ADS, $tournament);

        $tournament = new Tournament();
        $tournament->setStartDate(new \DateTime("11/18/2018"));
        $tournament->setEndDate(new \DateTime("11/18/2018"));
        $tournament->setType(Tournament::TYPE_INDOOR);
        $tournament->setOrganizer($this->getReference(ClubFixtures::CLUB_MDY));
        $manager->persist($tournament);

        $this->addReference(self::TOURN_MDY, $tournament);

        $tournament = new Tournament();
        $tournament->setStartDate(new \DateTime("11/24/2018"));
        $tournament->setEndDate(new \DateTime("11/25/2018"));
        $tournament->setType(Tournament::TYPE_INDOOR);
        $tournament->setOrganizer($this->getReference(ClubFixtures::CLUB_ACG));
        $manager->persist($tournament);

        $this->addReference(self::TOURN_ACG_1, $tournament);

        $tournament = new Tournament();
        $tournament->setStartDate(new \DateTime("12/16/2018"));
        $tournament->setEndDate(new \DateTime("12/16/2018"));
        $tournament->setType(Tournament::TYPE_INDOOR);
        $tournament->setOrganizer($this->getReference(ClubFixtures::CLUB_LIE));
        $manager->persist($tournament);

        $this->addReference(self::TOURN_LIE, $tournament);

        $tournament = new Tournament();
        $tournament->setStartDate(new \DateTime("01/12/2019"));
        $tournament->setEndDate(new \DateTime("01/13/2019"));
        $tournament->setType(Tournament::TYPE_INDOOR);
        $tournament->setOrganizer($this->getReference(ClubFixtures::CLUB_ACG));
        $manager->persist($tournament);

        $this->addReference(self::TOURN_ACG_2, $tournament);

        $tournament = new Tournament();
        $tournament->setStartDate(new \DateTime("01/20/2019"));
        $tournament->setEndDate(new \DateTime("01/20/2019"));
        $tournament->setType(Tournament::TYPE_INDOOR);
        $tournament->setOrganizer($this->getReference(ClubFixtures::CLUB_ITW));
        $manager->persist($tournament);

        $this->addReference(self::TOURN_ITW, $tournament);

        $tournament = new Tournament();
        $tournament->setStartDate(new \DateTime("02/23/2019"));
        $tournament->setEndDate(new \DateTime("02/23/2019"));
        $tournament->setType(Tournament::TYPE_INDOOR);
        $tournament->setOrganizer($this->getReference(ClubFixtures::CLUB_LIE));
        $manager->persist($tournament);

        $this->addReference(self::TOURN_TEL, $tournament);

        $tournament = new Tournament();
        $tournament->setStartDate(new \DateTime("03/09/2019"));
        $tournament->setEndDate(new \DateTime("03/10/2019"));
        $tournament->setType(Tournament::TYPE_INDOOR);
        $tournament->setOrganizer($this->getReference(ClubFixtures::CLUB_HUY));
        $manager->persist($tournament);

        $this->addReference(self::TOURN_HUY, $tournament);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            ClubFixtures::class,
        );
    }
}
