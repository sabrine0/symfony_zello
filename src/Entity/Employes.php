<?php

namespace App\Entity;

use App\Repository\EmployesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: EmployesRepository::class)]
class Employes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(length: 100)]
    private ?string $lastName = null;

    #[ORM\Column(length: 1)]
   //#[Assert\Choice(choices:['M','F'])]

    private ?string $gender = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $bDate = null;

    #[ORM\ManyToOne(inversedBy: 'employes')]
    private ?Services $service = null;

   // #[ORM\Column]
    //private ?int $numService = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getBDate(): ?\DateTimeInterface
    {
        return $this->bDate;
    }

    public function setBDate(\DateTimeInterface $bDate): static
    {
        $this->bDate = $bDate;

        return $this;
    }

   // public function getNumService(): ?int
  //  {
    //    return $this->numService;
  //  }

    /*public function setNumService(int $numService): static
    {
        $this->numService = $numService;

        return $this;
    }*/

    public function getService(): ?Services
    {
        return $this->service;
    }

    public function setService(?Services $service): static
    {
        $this->service = $service;

        return $this;
    }
}
