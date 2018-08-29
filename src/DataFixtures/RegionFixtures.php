<?php

namespace App\DataFixtures;

use App\Entity\Region;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class RegionFixtures extends Fixture implements DependentFixtureInterface
{
    public const REGION_LIEGE = 'liege';

    public function load(ObjectManager $manager)
    {
        $region = new Region();
        $region->setName("Liège");
        $region->setNumber(4);
        $region->setLeague($this->getReference(LeagueFixtures::LEAGUE_LFBTA));
        $manager->persist($region);

        $this->addReference(self::REGION_LIEGE, $region);

        $region = new Region();
        $region->setName("Braban Wallon");
        $region->setNumber(2);
        $region->setLeague($this->getReference(LeagueFixtures::LEAGUE_LFBTA));
        $manager->persist($region);

        $region = new Region();
        $region->setName("Bruxelles-Capitale");
        $region->setNumber(2);
        $region->setLeague($this->getReference(LeagueFixtures::LEAGUE_LFBTA));
        $manager->persist($region);

        $region = new Region();
        $region->setName("Hainaut");
        $region->setNumber(3);
        $region->setLeague($this->getReference(LeagueFixtures::LEAGUE_LFBTA));
        $manager->persist($region);

        $region = new Region();
        $region->setName("Luxembourg");
        $region->setNumber(6);
        $region->setLeague($this->getReference(LeagueFixtures::LEAGUE_LFBTA));
        $manager->persist($region);

        $region = new Region();
        $region->setName("Namur");
        $region->setNumber(7);
        $region->setLeague($this->getReference(LeagueFixtures::LEAGUE_LFBTA));
        $manager->persist($region);        

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            LeagueFixtures::class,
        );
    }
}
