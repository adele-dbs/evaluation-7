<?php

namespace App\Entity;

use App\Repository\JobAdvertRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JobAdvertRepository::class)]
class JobAdvert
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $post = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $hours = null;

    #[ORM\Column]
    private ?int $wages = null;

    #[ORM\Column]
    private ?int $recuitment_id = null;

    #[ORM\Column]
    private ?int $validation_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPost(): ?string
    {
        return $this->post;
    }

    public function setPost(string $post): static
    {
        $this->post = $post;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getHours(): ?string
    {
        return $this->hours;
    }

    public function setHours(string $hours): static
    {
        $this->hours = $hours;

        return $this;
    }

    public function getWages(): ?int
    {
        return $this->wages;
    }

    public function setWages(int $wages): static
    {
        $this->wages = $wages;

        return $this;
    }

    public function getRecuitmentId(): ?int
    {
        return $this->recuitment_id;
    }

    public function setRecuitmentId(int $recuitment_id): static
    {
        $this->recuitment_id = $recuitment_id;

        return $this;
    }

    public function getValidationId(): ?int
    {
        return $this->validation_id;
    }

    public function setValidationId(int $validation_id): static
    {
        $this->validation_id = $validation_id;

        return $this;
    }
}
