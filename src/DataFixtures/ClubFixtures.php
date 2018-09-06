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
    public const CLUB_ACG = "club-acg";
    public const CLUB_FBG = "club-fbg";
    public const CLUB_BEA = "club-bea";
    public const CLUB_CAB = "club-cab";
    public const CLUB_ADS = "club-ads";
    
    public function load(ObjectManager $manager)
    {
        $club = new Club();
        $club->setName("Francs Archers d’Ottignies");
        $club->setAcronym("FAO");
        $club->setNumber(252);
        $club->setRegion($this->getReference(RegionFixtures::REGION_BRABAN));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Lasne Archery Sport");
        $club->setAcronym("LAS");
        $club->setNumber(253);
        $club->setRegion($this->getReference(RegionFixtures::REGION_BRABAN));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Archers du Grand Serment de Saint-Sébastien Braine l’Alleud");
        $club->setAcronym("ABA");
        $club->setNumber(255);
        $club->setRegion($this->getReference(RegionFixtures::REGION_BRABAN));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Cardinal Mercier Archery");
        $club->setAcronym("CMA");
        $club->setNumber(256);
        $club->setRegion($this->getReference(RegionFixtures::REGION_BRABAN));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Les Archers de Jodoigne");
        $club->setAcronym("ACG");
        $club->setNumber(258);
        $club->setRegion($this->getReference(RegionFixtures::REGION_BRABAN));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Les Flèches Unies");
        $club->setAcronym("LFU");
        $club->setNumber(259);
        $club->setRegion($this->getReference(RegionFixtures::REGION_BRABAN));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Flèche d’Or d’Anderlecht");
        $club->setAcronym("FOA");
        $club->setNumber(201);
        $club->setRegion($this->getReference(RegionFixtures::REGION_BXL));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Grand Serment Royal des Archers de St Sébastien Bruxelles");
        $club->setAcronym("GSR");
        $club->setNumber(203);
        $club->setRegion($this->getReference(RegionFixtures::REGION_BXL));
        $manager->persist($club);

        $club = new Club();
        $club->setName("De Gouden Pijl Evere");
        $club->setAcronym("GPE");
        $club->setNumber(203);
        $club->setRegion($this->getReference(RegionFixtures::REGION_BXL));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Compagnie d’Arc St Sébastien Kraainem");
        $club->setAcronym("SSK");
        $club->setNumber(205);
        $club->setRegion($this->getReference(RegionFixtures::REGION_BXL));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Gilde des Archers de Saint-Pierre");
        $club->setAcronym("GAU");
        $club->setNumber(207);
        $club->setRegion($this->getReference(RegionFixtures::REGION_BXL));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Confrérie St Sébastien Antoing");
        $club->setAcronym("ANT");
        $club->setNumber(301);
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $manager->persist($club);

        $club = new Club();
        $club->setName("La Fine Equipe Ellezelles");
        $club->setAcronym("LFE");
        $club->setNumber(302);
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Confrérie St Sébastien Beaumont");
        $club->setAcronym("BEA");
        $club->setNumber(303);
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $manager->persist($club);
        
        $this->addReference(self::CLUB_BEA, $club);

        $club = new Club();
        $club->setName("Club des Archers de Tournai");
        $club->setAcronym("CAT");
        $club->setNumber(304);
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Le Centaure Fleurus");
        $club->setAcronym("CEN");
        $club->setNumber(306);
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Cie des Archers du Château Gerpinnes");
        $club->setAcronym("CAC");
        $club->setNumber(307);
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Royale Confrérie St Sébastien de Mouscron");
        $club->setAcronym("RCM");
        $club->setNumber(308);
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Archery Club Labuissière");
        $club->setAcronym("LAB");
        $club->setNumber(309);
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Compagnons de l’Arc Droit");
        $club->setAcronym("CAD");
        $club->setNumber(310);
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Peruwelz Archery Club");
        $club->setAcronym("PAC");
        $club->setNumber(311);
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Les Francs Archers de Chimay");
        $club->setAcronym("FAC");
        $club->setNumber(312);
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Archers du Berceau de Thuin");
        $club->setAcronym("ABT");
        $club->setNumber(313);
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Le Sagittaire");
        $club->setAcronym("SAG");
        $club->setNumber(314);
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Archers du Château Binche");
        $club->setAcronym("ACB");
        $club->setNumber(315);
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Sylver Star Charleroi");
        $club->setAcronym("SSC");
        $club->setNumber(316);
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $manager->persist($club);

        $club = new Club();
        $club->setName("E-cool Archery Club");
        $club->setAcronym("ECA");
        $club->setNumber(319);
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Les Archers du Fosteau");
        $club->setAcronym("LEF");
        $club->setNumber(320);
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Compagnies des Archers de Momignies");
        $club->setAcronym("CaM");
        $club->setNumber(321);
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Vaniche Archery Team");
        $club->setAcronym("VAT");
        $club->setNumber(322);
        $club->setRegion($this->getReference(RegionFixtures::REGION_HAINAUT));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Compagnie d’Arc du Liry Archery Chiny");
        $club->setAcronym("LAC");
        $club->setNumber(603);
        $club->setRegion($this->getReference(RegionFixtures::REGION_LXG));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Archers de la Vallée des Macralles Vielsalm");
        $club->setAcronym("AMV");
        $club->setNumber(604);
        $club->setRegion($this->getReference(RegionFixtures::REGION_LXG));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Archers du Comte Henri La Roche");
        $club->setAcronym("ACH");
        $club->setNumber(605);
        $club->setRegion($this->getReference(RegionFixtures::REGION_LXG));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Les Archers Libramontois");
        $club->setAcronym("ASH");
        $club->setNumber(609);
        $club->setRegion($this->getReference(RegionFixtures::REGION_LXG));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Archery Club de la Famenne");
        $club->setAcronym("ACF");
        $club->setNumber(610);
        $club->setRegion($this->getReference(RegionFixtures::REGION_LXG));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Archery Club du Sud");
        $club->setAcronym("ASC");
        $club->setNumber(611);
        $club->setRegion($this->getReference(RegionFixtures::REGION_LXG));
        $manager->persist($club);

        $club = new Club();
        $club->setName("1ere Compagnie des Archers de Gaume - Musson");
        $club->setAcronym("CAG");
        $club->setNumber(612);
        $club->setRegion($this->getReference(RegionFixtures::REGION_LXG));
        $manager->persist($club);

        $club = new Club();
        $club->setName("La Flèche de Musson");
        $club->setAcronym("FDM");
        $club->setNumber(614);
        $club->setRegion($this->getReference(RegionFixtures::REGION_LXG));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Hotton Archery Club");
        $club->setAcronym("HAC");
        $club->setNumber(616);
        $club->setRegion($this->getReference(RegionFixtures::REGION_LXG));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Les Flèches Gaumaises - Virton");
        $club->setAcronym("FGV");
        $club->setNumber(617);
        $club->setRegion($this->getReference(RegionFixtures::REGION_LXG));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Le Celtic Archery Club Léglise");
        $club->setAcronym("CAL");
        $club->setNumber(619);
        $club->setRegion($this->getReference(RegionFixtures::REGION_LXG));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Club des Archers Arlonnais");
        $club->setAcronym("CAA");
        $club->setNumber(620);
        $club->setRegion($this->getReference(RegionFixtures::REGION_LXG));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Club Des Archers Réunis");
        $club->setAcronym("CAR");
        $club->setNumber(621);
        $club->setRegion($this->getReference(RegionFixtures::REGION_LXG));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Les Lum’çons Wierde");
        $club->setAcronym("LAW");
        $club->setNumber(701);
        $club->setRegion($this->getReference(RegionFixtures::REGION_NAMUR));
        $manager->persist($club);

        $club = new Club();
        $club->setName("La Magna Sagitta Pondrôme");
        $club->setAcronym("MSP");
        $club->setNumber(702);
        $club->setRegion($this->getReference(RegionFixtures::REGION_NAMUR));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Flèche Brisée de Godinne");
        $club->setAcronym("FBG");
        $club->setNumber(703);
        $club->setRegion($this->getReference(RegionFixtures::REGION_NAMUR));
        $manager->persist($club);        

        $this->addReference(self::CLUB_FBG, $club);

        $club = new Club();
        $club->setName("Arrow Tabora Namur");
        $club->setAcronym("TAB");
        $club->setNumber(704);
        $club->setRegion($this->getReference(RegionFixtures::REGION_NAMUR));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Compagnons Archers de Bertransart");
        $club->setAcronym("CAB");
        $club->setNumber(705);
        $club->setRegion($this->getReference(RegionFixtures::REGION_NAMUR));
        $manager->persist($club);

        $this->addReference(self::CLUB_CAB, $club);

        $club = new Club();
        $club->setName("Les Bons Tireûs d’Seuris");
        $club->setAcronym("BTS");
        $club->setNumber(706);
        $club->setRegion($this->getReference(RegionFixtures::REGION_NAMUR));
        $manager->persist($club);

        $club = new Club();
        $club->setName("Dinant Archery Team");
        $club->setAcronym("DAT");
        $club->setNumber(708);
        $club->setRegion($this->getReference(RegionFixtures::REGION_NAMUR));
        $manager->persist($club);

        /*--------------------------------------*/

        $club = new Club();
        $club->setName("Royal Archery Club Grivegnée");
        $club->setAcronym("ACG");
        $club->setNumber(401);
        $club->setRegion($this->getReference(RegionFixtures::REGION_LIEGE));
        $manager->persist($club);

        $this->addReference(self::CLUB_ACG, $club);

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

        $this->addReference(self::CLUB_ADS, $club);

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
