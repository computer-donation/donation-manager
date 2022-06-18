<?php

namespace App\Entity;

use App\Enum\Part;
use App\Repository\PartDonationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartDonationRepository::class)]
class PartDonation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'integer')]
    private int $part;

    #[ORM\Column(type: 'string', length: 9, enumType: Part::class)]
    private Part $type;

    #[ORM\ManyToOne(targetEntity: Donation::class, inversedBy: 'parts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Donation $donation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPart(): int
    {
        return $this->part;
    }

    public function setPart(int $part): self
    {
        $this->part = $part;

        return $this;
    }

    public function getType(): Part
    {
        return $this->type;
    }

    public function setType(Part $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDonation(): ?Donation
    {
        return $this->donation;
    }

    public function setDonation(?Donation $donation): self
    {
        $this->donation = $donation;

        return $this;
    }
}
