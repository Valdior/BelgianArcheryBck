<?php

namespace App\Entity;

use App\Entity\User;
use App\Entity\Affiliate;
use App\Entity\Participant;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArcherRepository")
 */
class Archer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $firstname;

    /**
     * @ORM\Column(type="integer")
     */
    private $status;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Affiliate", mappedBy="archer")
     */
    private $affiliations;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Participant", mappedBy="archer")
     */
    private $competitions;

    public function __construct()
    {
        $this->affiliations = new ArrayCollection();
        $this->competitions = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection|Affiliate[]
     */
    public function getAffiliations(): Collection
    {
        return $this->affiliations;
    }

    public function addAffiliation(Affiliate $affiliation): self
    {
        if (!$this->affiliations->contains($affiliation)) {
            $this->affiliations[] = $affiliation;
            $affiliation->setArcher($this);
        }

        return $this;
    }

    public function removeAffiliation(Affiliate $affiliation): self
    {
        if ($this->affiliations->contains($affiliation)) {
            $this->affiliations->removeElement($affiliation);
            // set the owning side to null (unless already changed)
            if ($affiliation->getArcher() === $this) {
                $affiliation->setArcher(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Participant[]
     */
    public function getCompetitions(): Collection
    {
        return $this->competitions;
    }

    public function addCompetition(Participant $competition): self
    {
        if (!$this->competitions->contains($competition)) {
            $this->competitions[] = $competition;
            $competition->setArcher($this);
        }

        return $this;
    }

    public function removeCompetition(Participant $competition): self
    {
        if ($this->competitions->contains($competition)) {
            $this->competitions->removeElement($competition);
            // set the owning side to null (unless already changed)
            if ($competition->getArcher() === $this) {
                $competition->setArcher(null);
            }
        }

        return $this;
    }

    public function getFullname()
    {
        return $this->getlastname() . ' ' . $this->getFirstname(); 
    }
}
