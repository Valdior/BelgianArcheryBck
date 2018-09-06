<?php

namespace App\DataFixtures;

use App\Entity\Tournament;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class TournamentFixtures extends Fixture implements DependentFixtureInterface
{
    public const TOURN_ACG = "tourn-acg";
    public const TOURN_FBG = "tourn-fbg";
    public const TOURN_BEA = "tourn-bea";
    public const TOURN_CAB = "tounr-cab";
    public const TOURN_ADS = "tounr-ads";

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
        $tournament->setStartDate(new \DateTime("10/06/2018"));
        $tournament->setEndDate(new \DateTime("10/07/2018"));
        $tournament->setType(Tournament::TYPE_INDOOR);
        $tournament->setOrganizer($this->getReference(ClubFixtures::CLUB_FBG));
        $manager->persist($tournament);

        $this->addReference(self::TOURN_FBG, $tournament);

        $tournament = new Tournament();
        $tournament->setStartDate(new \DateTime("10/13/2018"));
        $tournament->setEndDate(new \DateTime("10/14/2018"));
        $tournament->setType(Tournament::TYPE_INDOOR);
        $tournament->setOrganizer($this->getReference(ClubFixtures::CLUB_BEA));
        $manager->persist($tournament);

        $this->addReference(self::TOURN_BEA, $tournament);

        $tournament = new Tournament();
        $tournament->setStartDate(new \DateTime("10/14/2018"));
        $tournament->setEndDate(new \DateTime("10/14/2018"));
        $tournament->setType(Tournament::TYPE_INDOOR);
        $tournament->setOrganizer($this->getReference(ClubFixtures::CLUB_CAB));
        $manager->persist($tournament);

        $this->addReference(self::TOURN_CAB, $tournament);

        $tournament = new Tournament();
        $tournament->setStartDate(new \DateTime("10/20/2018"));
        $tournament->setEndDate(new \DateTime("10/21/2018"));
        $tournament->setType(Tournament::TYPE_INDOOR);
        $tournament->setOrganizer($this->getReference(ClubFixtures::CLUB_ADS));
        $manager->persist($tournament);

        $this->addReference(self::TOURN_ADS, $tournament);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            ClubFixtures::class,
        );
    }
}
