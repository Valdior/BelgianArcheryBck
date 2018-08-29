<?php

namespace App\Entity;

use App\Entity\Participant;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArcherCategoryRepository")
 */
class ArcherCategory
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $acronym;

    /**
     * @ORM\Column(type="integer")
     */
    private $minimumAge;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Participant", mappedBy="category")
     */
    private $participantsCategory;

    public function __construct()
    {
        $this->participantsCategory = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAcronym(): ?string
    {
        return $this->acronym;
    }

    public function setAcronym(string $acronym): self
    {
        $this->acronym = $acronym;

        return $this;
    }

    public function getMinimumAge(): ?int
    {
        return $this->minimumAge;
    }

    public function setMinimumAge(int $minimumAge): self
    {
        $this->minimumAge = $minimumAge;

        return $this;
    }

    /**
     * @return Collection|Participant[]
     */
    public function getParticipantsCategory(): Collection
    {
        return $this->participantsCategory;
    }

    public function addParticipantsCategory(Participant $participantsCategory): self
    {
        if (!$this->participantsCategory->contains($participantsCategory)) {
            $this->participantsCategory[] = $participantsCategory;
            $participantsCategory->setCategory($this);
        }

        return $this;
    }

    public function removeParticipantsCategory(Participant $participantsCategory): self
    {
        if ($this->participantsCategory->contains($participantsCategory)) {
            $this->participantsCategory->removeElement($participantsCategory);
            // set the owning side to null (unless already changed)
            if ($participantsCategory->getCategory() === $this) {
                $participantsCategory->setCategory(null);
            }
        }

        return $this;
    }
}
