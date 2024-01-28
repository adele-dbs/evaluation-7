<?php

namespace App\Entity;

use App\Repository\ApplicationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApplicationRepository::class)]
class Application
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'application_id')]
    private ?ValidationStatus $validation = null;

    #[ORM\ManyToMany(targetEntity: Applicant::class, mappedBy: 'application_id')]
    private Collection $applicants;

    #[ORM\ManyToOne(inversedBy: 'application_id')]
    private ?JobAdvert $job_advert = null;

    public function __construct()
    {
        $this->applicants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValidation(): ?ValidationStatus
    {
        return $this->validation;
    }

    public function setValidation(?ValidationStatus $validation): static
    {
        $this->validation = $validation;

        return $this;
    }

    /**
     * @return Collection<int, Applicant>
     */
    public function getApplicants(): Collection
    {
        return $this->applicants;
    }

    public function addApplicant(Applicant $applicant): static
    {
        if (!$this->applicants->contains($applicant)) {
            $this->applicants->add($applicant);
            $applicant->addApplicationId($this);
        }

        return $this;
    }

    public function removeApplicant(Applicant $applicant): static
    {
        if ($this->applicants->removeElement($applicant)) {
            $applicant->removeApplicationId($this);
        }

        return $this;
    }

    public function getJobAdvert(): ?JobAdvert
    {
        return $this->job_advert;
    }

    public function setJobAdvert(?JobAdvert $job_advert): static
    {
        $this->job_advert = $job_advert;

        return $this;
    }
}
