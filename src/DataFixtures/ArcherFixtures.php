<?php

namespace App\DataFixtures;

use App\Entity\Archer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ArcherFixtures extends Fixture
{
    public const ARCHER_MP = "archer-mp";
    public const ARCHER_GC = "archer-gc";

    public function load(ObjectManager $manager)
    {
        $archer = new Archer();
        $archer->setLastname("Maréchal");
        $archer->setFirstname("Pierre");
        $archer->setStatus(1);
        $manager->persist($archer);

        $this->addReference(self::ARCHER_MP, $archer);

        $archer = new Archer();
        $archer->setLastname("Gentille");
        $archer->setFirstname("Carmelo");
        $archer->setStatus(1);
        $manager->persist($archer);

        $this->addReference(self::ARCHER_GC, $archer);

        $manager->flush();
    }
}
