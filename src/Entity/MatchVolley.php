<?php

namespace App\Entity;

use App\Repository\MatchVolleyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MatchVolleyRepository::class)]
class MatchVolley
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $idEquipe_vainqueur = null;

    #[ORM\Column(nullable: true)]
    private ?int $idEquipe_perdant = null;

    #[ORM\Column(length: 3, nullable: true)]
    private ?string $score = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $duree = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateMatch = null;

    #[ORM\ManyToOne(inversedBy: 'matchVolleys')]
    #[ORM\JoinColumn(nullable: false)]
    private ?club $club = null;

    #[ORM\ManyToMany(targetEntity: Equipe::class, mappedBy: 'matchVolley')]
    private Collection $equipes;

    public function __construct()
    {
        $this->equipes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdEquipeVainqueur(): ?int
    {
        return $this->idEquipe_vainqueur;
    }

    public function setIdEquipeVainqueur(?int $idEquipe_vainqueur): static
    {
        $this->idEquipe_vainqueur = $idEquipe_vainqueur;

        return $this;
    }

    public function getIdEquipePerdant(): ?int
    {
        return $this->idEquipe_perdant;
    }

    public function setIdEquipePerdant(?int $idEquipe_perdant): static
    {
        $this->idEquipe_perdant = $idEquipe_perdant;

        return $this;
    }

    public function getScore(): ?string
    {
        return $this->score;
    }

    public function setScore(?string $score): static
    {
        $this->score = $score;

        return $this;
    }

    public function getDuree(): ?\DateTimeInterface
    {
        return $this->duree;
    }

    public function setDuree(?\DateTimeInterface $duree): static
    {
        $this->duree = $duree;

        return $this;
    }

    public function getDateMatch(): ?\DateTimeInterface
    {
        return $this->dateMatch;
    }

    public function setDateMatch(\DateTimeInterface $dateMatch): static
    {
        $this->dateMatch = $dateMatch;

        return $this;
    }

    public function getClub(): ?club
    {
        return $this->club;
    }

    public function setClub(?club $club): static
    {
        $this->club = $club;

        return $this;
    }

    /**
     * @return Collection<int, Equipe>
     */
    public function getEquipes(): Collection
    {
        return $this->equipes;
    }

    public function addEquipe(Equipe $equipe): static
    {
        if (!$this->equipes->contains($equipe)) {
            $this->equipes->add($equipe);
            $equipe->addMatchVolley($this);
        }

        return $this;
    }

    public function removeEquipe(Equipe $equipe): static
    {
        if ($this->equipes->removeElement($equipe)) {
            $equipe->removeMatchVolley($this);
        }

        return $this;
    }
}
