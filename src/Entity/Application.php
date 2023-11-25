<?php

namespace App\Entity;

use App\Repository\ApplicationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApplicationRepository::class)]
class Application
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $applicant_id = null;

    #[ORM\Column]
    private ?int $id_job_advert = null;

    #[ORM\Column]
    private ?int $validation_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getApplicantId(): ?int
    {
        return $this->applicant_id;
    }

    public function setApplicantId(int $applicant_id): static
    {
        $this->applicant_id = $applicant_id;

        return $this;
    }

    public function getIdJobAdvert(): ?int
    {
        return $this->id_job_advert;
    }

    public function setIdJobAdvert(int $id_job_advert): static
    {
        $this->id_job_advert = $id_job_advert;

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
