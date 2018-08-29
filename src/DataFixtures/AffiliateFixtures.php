<?php

namespace App\DataFixtures;

use App\Entity\Affiliate;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class AffiliateFixtures extends Fixture  implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $affiliate = new Affiliate();
        $affiliate->setAffiliateNumber("414022");
        $affiliate->setAffiliateSince(new \DateTime("10/01/2015"));
        $affiliate->setAffiliateEnd(new \DateTime("09/30/2017"));
        $affiliate->setClub($this->getReference(ClubFixtures::CLUB_ITW));
        $affiliate->setArcher($this->getReference(ArcherFixtures::ARCHER_MP));
        $manager->persist($affiliate);

        $affiliate = new Affiliate();
        $affiliate->setAffiliateNumber("89h01558");
        $affiliate->setAffiliateSince(new \DateTime("10/01/2017"));
        $affiliate->setClub($this->getReference(ClubFixtures::CLUB_LIE));
        $affiliate->setArcher($this->getReference(ArcherFixtures::ARCHER_MP));
        $manager->persist($affiliate);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            ClubFixtures::class,
            ArcherFixtures::class,
        );
    }
}
