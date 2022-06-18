<?php

namespace App\Entity;

use App\Enum\Computer;
use App\Repository\ComputerDonationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ComputerDonationRepository::class)]
class ComputerDonation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'integer')]
    private int $computer;

    #[ORM\Column(type: 'string', length: 12, enumType: Computer::class)]
    private Computer $type;

    #[ORM\ManyToOne(targetEntity: Donation::class, inversedBy: 'computers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Donation $donation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComputer(): int
    {
        return $this->computer;
    }

    public function setComputer(int $computer): self
    {
        $this->computer = $computer;

        return $this;
    }

    public function getType(): Computer
    {
        return $this->type;
    }

    public function setType(Computer $type): self
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
