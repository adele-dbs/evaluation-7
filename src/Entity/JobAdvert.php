<?php

namespace App\Entity;

use App\Repository\JobAdvertRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\ManyToOne(inversedBy: 'job_advert_id')]
    private ?ValidationStatus $validation = null;

    #[ORM\ManyToOne(inversedBy: 'job_id')]
    private ?Recruitment $recruitment = null;

    #[ORM\OneToMany(mappedBy: 'application_id', targetEntity: Application::class)]
    private Collection $job_advert;

    public function __construct()
    {
        $this->job_advert = new ArrayCollection();
    }

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

    public function getValidation(): ?ValidationStatus
    {
        return $this->validation;
    }

    public function setValidation(?ValidationStatus $validation): static
    {
        $this->validation = $validation;

        return $this;
    }

    public function getRecruitment(): ?Recruitment
    {
        return $this->recruitment;
    }

    public function setRecruitment(?Recruitment $recruitment): static
    {
        $this->recruitment = $recruitment;

        return $this;
    }

    /**
     * @return Collection<int, Application>
     */
    public function getJobAdvert(): Collection
    {
        return $this->job_advert;
    }

    public function addJobAdvert(Application $jobAdvert): static
    {
        if (!$this->job_advert->contains($jobAdvert)) {
            $this->job_advert->add($jobAdvert);
            $jobAdvert->setJobAdvert($this);
        }

        return $this;
    }

    public function removeJobAdvert(Application $jobAdvert): static
    {
        if ($this->job_advert->removeElement($jobAdvert)) {
            // set the owning side to null (unless already changed)
            if ($jobAdvert->getJobAdvert() === $this) {
                $jobAdvert->setJobAdvert(null);
            }
        }

        return $this;
    }
}
