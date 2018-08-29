<?php

namespace App\Entity;

use App\Entity\Club;
use App\Entity\Archer;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AffiliateRepository")
 */
class Affiliate
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $affiliateNumber;

    /**
     * @ORM\Column(type="date")
     */
    private $affiliateSince;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $affiliateEnd;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Club", inversedBy="members")
     * @ORM\JoinColumn(nullable=false)
     */
    private $club;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Archer", inversedBy="affiliations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $archer;

    public function getId()
    {
        return $this->id;
    }

    public function getAffiliateNumber(): ?string
    {
        return $this->affiliateNumber;
    }

    public function setAffiliateNumber(string $affiliateNumber): self
    {
        $this->affiliateNumber = $affiliateNumber;

        return $this;
    }

    public function getAffiliateSince(): ?\DateTimeInterface
    {
        return $this->affiliateSince;
    }

    public function setAffiliateSince(\DateTimeInterface $affiliateSince): self
    {
        $this->affiliateSince = $affiliateSince;

        return $this;
    }

    public function getAffiliateEnd(): ?\DateTimeInterface
    {
        return $this->affiliateEnd;
    }

    public function setAffiliateEnd(?\DateTimeInterface $affiliateEnd): self
    {
        $this->affiliateEnd = $affiliateEnd;

        return $this;
    }

    public function getClub(): ?Club
    {
        return $this->club;
    }

    public function setClub(?Club $club): self
    {
        $this->club = $club;

        return $this;
    }

    public function getArcher(): ?Archer
    {
        return $this->archer;
    }

    public function setArcher(?Archer $archer): self
    {
        $this->archer = $archer;

        return $this;
    }
}
