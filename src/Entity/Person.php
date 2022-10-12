<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PersonRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\{Get,Put,Delete,Post};
use ApiPlatform\Metadata\GetCollection;

#[ApiResource(
    operations: [
        new Get(),
        new Put(),
        new Delete(),
        new GetCollection(),
        new Post(), ]
)]
#[ORM\Entity(repositoryClass: PersonRepository::class)]
class Person
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }
}
