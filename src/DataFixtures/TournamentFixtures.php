<?php

namespace App\DataFixtures;

use App\Entity\Tournament;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class TournamentFixtures extends Fixture implements DependentFixtureInterface
{
    public const TOURN_ACG = "tourn-acg";

    public function load(ObjectManager $manager)
    {
        $tournament = new Tournament();
        $tournament->setStartDate(new \DateTime("09/08/2018"));
        $tournament->setEndDate(new \DateTime("09/09/2018"));
        $tournament->setType(Tournament::TYPE_OUTDOOR);
        $tournament->setOrganizer($this->getReference(ClubFixtures::CLUB_ACG));
        $manager->persist($tournament);

        $this->addReference(self::TOURN_ACG, $tournament);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            ClubFixtures::class,
        );
    }
}
