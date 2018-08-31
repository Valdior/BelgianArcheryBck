<?php

namespace App\DataFixtures;

use App\Entity\Peloton;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ParticipantFixtures extends Fixture  implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $peloton = new Peloton();
        $peloton->setpelotonNumber("414022");
        $peloton->setpelotonSince(new \DateTime("10/01/2014"));
        $peloton->setpelotonEnd(new \DateTime("09/30/2016"));
        $peloton->setClub($this->getReference(ClubFixtures::CLUB_ITW));
        $peloton->setArcher($this->getReference(ArcherFixtures::ARCHER_MP));
        $manager->persist($peloton);

        $peloton = new Peloton();
        $peloton->setpelotonNumber("89H01558");
        $peloton->setpelotonSince(new \DateTime("10/01/2016"));
        $peloton->setClub($this->getReference(ClubFixtures::CLUB_LIE));
        $peloton->setArcher($this->getReference(ArcherFixtures::ARCHER_MP));
        $manager->persist($peloton);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            TournemantFixtures::class,
            ArcherFixtures::class,
        );
    }
}
