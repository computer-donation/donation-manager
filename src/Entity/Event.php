<?php

namespace App\Entity;

use App\Enum\Computer;
use App\Repository\EventRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;

#[ORM\Entity(repositoryClass: EventRepository::class)]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'datetime')]
    private DateTimeInterface $eventTime;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\Column(type: 'array')]
    private array $photos = [];

    #[ORM\Column(type: 'integer')]
    private int $computer;

    #[ORM\Column(type: 'string', length: 12, enumType: Computer::class)]
    private Computer $computerType;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEventTime(): DateTimeInterface
    {
        return $this->eventTime;
    }

    public function setEventTime(DateTimeInterface $eventTime): self
    {
        $this->eventTime = $eventTime;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPhotos(): array
    {
        return $this->photos;
    }

    public function setPhotos(array $photos): self
    {
        $this->photos = $photos;

        return $this;
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

    public function getComputerType(): Computer
    {
        return $this->computerType;
    }

    public function setComputerType(Computer $computerType): self
    {
        $this->computerType = $computerType;

        return $this;
    }
}
