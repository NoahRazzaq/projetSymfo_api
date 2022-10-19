<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Odm\Filter\SearchFilter;
use Doctrine\ODM\MongoDB\Types;
use Symfony\Component\Validator\Constraints\Type;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\PersonRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\{ApiFilter, Get,Put,Delete,Post};
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Doctrine\Orm\Filter\DateFilter;
use ApiPlatform\Doctrine\Orm\Filter\OrderFilter;
use Symfony\Component\Serializer\Annotation\Groups;

use ApiPlatform\Api\IriConverterInterface;
use ApiPlatform\Api\FilterInterface;

#[ApiResource(
    operations: [
        new Get(),
        new Put(),
        new Post(),
        new Delete(),
        new GetCollection(),]
)]
#[ApiFilter(OrderFilter::class, properties: ['firstName', 'lastName'], arguments: ['orderParameterName' => 'order'])]
#[ORM\Entity(repositoryClass: PersonRepository::class)]
class Person
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['movie'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['movie'])]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    #[Groups(['movie'])]
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
