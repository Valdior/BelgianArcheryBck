<?php

namespace App\DataFixtures;

use App\Entity\Club;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ClubFixtures extends Fixture implements DependentFixtureInterface
{
    public const CLUB_LIE = "club-lie";
    public const CLUB_ITW = "club-itw";
    
    public function load(ObjectManager $manager)
    {
        $club = new Club();
        $club->setName("Royal Archery Club Grivegnée");
        $club->setAcronym("ACG");
        $club->setNumber(401);
        $club->setRegion($this->getReference(RegionFixtures::REGION_LIEGE));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Compagnie des Archers de Huy");
        $club->setAcronym("HUY");
        $club->setNumber(402);
        $club->setRegion($this->getReference(RegionFixtures::REGION_LIEGE));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Compagnie Royale d’Archers Liège");
        $club->setAcronym("LIE");
        $club->setNumber(403);
        $club->setRegion($this->getReference(RegionFixtures::REGION_LIEGE));
        $manager->persist($club);

        $this->addReference(self::CLUB_LIE, $club);

        $club = new Club();
        $club->setName("Confrérie des Archers Spadois");
        $club->setAcronym("CAS");
        $club->setNumber(404);
        $club->setRegion($this->getReference(RegionFixtures::REGION_LIEGE));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Archers de l’Ordre du Chuffin");
        $club->setAcronym("CTH");
        $club->setNumber(405);
        $club->setRegion($this->getReference(RegionFixtures::REGION_LIEGE));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Archers du Coq Mosan Oupeye");
        $club->setAcronym("ACM");
        $club->setNumber(407);
        $club->setRegion($this->getReference(RegionFixtures::REGION_LIEGE));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Archers de Seraing");
        $club->setAcronym("ADS");
        $club->setNumber(411);
        $club->setRegion($this->getReference(RegionFixtures::REGION_LIEGE));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Intertir Welkenraedt");
        $club->setAcronym("ITW");
        $club->setNumber(414);
        $club->setRegion($this->getReference(RegionFixtures::REGION_LIEGE));
        $manager->persist($club);

        $this->addReference(self::CLUB_ITW, $club);

        $club = new Club();
        $club->setName("Confrérie des archers de la Julienne");
        $club->setAcronym("CAJ");
        $club->setNumber(416);
        $club->setRegion($this->getReference(RegionFixtures::REGION_LIEGE));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Compagnie des Archers Fléronnais");
        $club->setAcronym("CAF");
        $club->setNumber(417);
        $club->setRegion($this->getReference(RegionFixtures::REGION_LIEGE));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Les Archers du Val de Blegny");
        $club->setAcronym("AVB");
        $club->setNumber(418);
        $club->setRegion($this->getReference(RegionFixtures::REGION_LIEGE));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Archery Club de Malmedy");
        $club->setAcronym("MDY");
        $club->setNumber(420);
        $club->setRegion($this->getReference(RegionFixtures::REGION_LIEGE));
        $manager->persist($club);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            RegionFixtures::class,
        );
    }
}
