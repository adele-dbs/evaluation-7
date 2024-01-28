<?php

namespace App\Entity;

use App\Repository\ValidationStatusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ValidationStatusRepository::class)]
class ValidationStatus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?string $status = null;

    #[ORM\OneToMany(mappedBy: 'validation', targetEntity: User::class)]
    private Collection $user_id;

    #[ORM\OneToMany(mappedBy: 'validation', targetEntity: JobAdvert::class)]
    private Collection $job_advert_id;

    #[ORM\OneToMany(mappedBy: 'validation', targetEntity: Application::class)]
    private Collection $application_id;

    public function __construct()
    {
        $this->user_id = new ArrayCollection();
        $this->job_advert_id = new ArrayCollection();
        $this->application_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUserId(): Collection
    {
        return $this->user_id;
    }

    public function addUserId(User $userId): static
    {
        if (!$this->user_id->contains($userId)) {
            $this->user_id->add($userId);
            $userId->setValidation($this);
        }

        return $this;
    }

    public function removeUserId(User $userId): static
    {
        if ($this->user_id->removeElement($userId)) {
            // set the owning side to null (unless already changed)
            if ($userId->getValidation() === $this) {
                $userId->setValidation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, JobAdvert>
     */
    public function getJobAdvertId(): Collection
    {
        return $this->job_advert_id;
    }

    public function addJobAdvertId(JobAdvert $jobAdvertId): static
    {
        if (!$this->job_advert_id->contains($jobAdvertId)) {
            $this->job_advert_id->add($jobAdvertId);
            $jobAdvertId->setValidation($this);
        }

        return $this;
    }

    public function removeJobAdvertId(JobAdvert $jobAdvertId): static
    {
        if ($this->job_advert_id->removeElement($jobAdvertId)) {
            // set the owning side to null (unless already changed)
            if ($jobAdvertId->getValidation() === $this) {
                $jobAdvertId->setValidation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Application>
     */
    public function getApplicationId(): Collection
    {
        return $this->application_id;
    }

    public function addApplicationId(Application $applicationId): static
    {
        if (!$this->application_id->contains($applicationId)) {
            $this->application_id->add($applicationId);
            $applicationId->setValidation($this);
        }

        return $this;
    }

    public function removeApplicationId(Application $applicationId): static
    {
        if ($this->application_id->removeElement($applicationId)) {
            // set the owning side to null (unless already changed)
            if ($applicationId->getValidation() === $this) {
                $applicationId->setValidation(null);
            }
        }

        return $this;
    }
}
