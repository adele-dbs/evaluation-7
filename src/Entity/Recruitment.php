<?php

namespace App\Entity;

use App\Repository\RecruitmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecruitmentRepository::class)]
class Recruitment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $company = null;

    #[ORM\Column(length: 255)]
    private ?string $adress = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\Column]
    private ?int $zip_code = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?User $user = null;

    #[ORM\OneToMany(mappedBy: 'recruitment', targetEntity: JobAdvert::class)]
    private Collection $job_id;

    public function __construct()
    {
        $this->job_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(string $company): static
    {
        $this->company = $company;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): static
    {
        $this->adress = $adress;

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

    public function getZipCode(): ?int
    {
        return $this->zip_code;
    }

    public function setZipCode(int $zip_code): static
    {
        $this->zip_code = $zip_code;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, JobAdvert>
     */
    public function getJobId(): Collection
    {
        return $this->job_id;
    }

    public function addJobId(JobAdvert $jobId): static
    {
        if (!$this->job_id->contains($jobId)) {
            $this->job_id->add($jobId);
            $jobId->setRecruitment($this);
        }

        return $this;
    }

    public function removeJobId(JobAdvert $jobId): static
    {
        if ($this->job_id->removeElement($jobId)) {
            // set the owning side to null (unless already changed)
            if ($jobId->getRecruitment() === $this) {
                $jobId->setRecruitment(null);
            }
        }

        return $this;
    }
}
