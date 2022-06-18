<?php

namespace App\Entity;

use App\Repository\DonationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use DateTimeImmutable;

#[ORM\Entity(repositoryClass: DonationRepository::class)]
class Donation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'datetime_immutable')]
    private DateTimeImmutable $donatedAt;

    #[ORM\OneToMany(mappedBy: 'donation', targetEntity: PartDonation::class, orphanRemoval: true)]
    private Collection $parts;

    #[ORM\OneToMany(mappedBy: 'donation', targetEntity: ComputerDonation::class, orphanRemoval: true)]
    private Collection $computers;

    public function __construct()
    {
        $this->parts = new ArrayCollection();
        $this->computers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDonatedAt(): DateTimeImmutable
    {
        return $this->donatedAt;
    }

    public function setDonatedAt(DateTimeImmutable $donatedAt): self
    {
        $this->donatedAt = $donatedAt;

        return $this;
    }

    /**
     * @return Collection<int, PartDonation>
     */
    public function getParts(): Collection
    {
        return $this->parts;
    }

    public function addPart(PartDonation $part): self
    {
        if (!$this->parts->contains($part)) {
            $this->parts[] = $part;
            $part->setDonation($this);
        }

        return $this;
    }

    public function removePart(PartDonation $part): self
    {
        if ($this->parts->removeElement($part)) {
            // set the owning side to null (unless already changed)
            if ($part->getDonation() === $this) {
                $part->setDonation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ComputerDonation>
     */
    public function getComputers(): Collection
    {
        return $this->computers;
    }

    public function addComputer(ComputerDonation $computer): self
    {
        if (!$this->computers->contains($computer)) {
            $this->computers[] = $computer;
            $computer->setDonation($this);
        }

        return $this;
    }

    public function removeComputer(ComputerDonation $computer): self
    {
        if ($this->computers->removeElement($computer)) {
            // set the owning side to null (unless already changed)
            if ($computer->getDonation() === $this) {
                $computer->setDonation(null);
            }
        }

        return $this;
    }
}
