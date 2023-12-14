<?php

namespace App\Entity;

use App\Repository\EquipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipeRepository::class)]
class Equipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $libelle = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $classement = null;

    #[ORM\ManyToOne(inversedBy: 'equipes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?club $club = null;

    #[ORM\ManyToMany(targetEntity: matchVolley::class, inversedBy: 'equipes')]
    private Collection $matchVolley;

    #[ORM\ManyToMany(targetEntity: Entraineur::class, mappedBy: 'equipes')]
    private Collection $entraineurs;

    #[ORM\ManyToMany(targetEntity: Joueur::class, mappedBy: 'equipes')]
    private Collection $joueurs;

    public function __construct()
    {
        $this->matchVolley = new ArrayCollection();
        $this->entraineurs = new ArrayCollection();
        $this->joueurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getClassement(): ?string
    {
        return $this->classement;
    }

    public function setClassement(?string $classement): static
    {
        $this->classement = $classement;

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
     * @return Collection<int, matchVolley>
     */
    public function getMatchVolley(): Collection
    {
        return $this->matchVolley;
    }

    public function addMatchVolley(matchVolley $matchVolley): static
    {
        if (!$this->matchVolley->contains($matchVolley)) {
            $this->matchVolley->add($matchVolley);
        }

        return $this;
    }

    public function removeMatchVolley(matchVolley $matchVolley): static
    {
        $this->matchVolley->removeElement($matchVolley);

        return $this;
    }

    /**
     * @return Collection<int, Entraineur>
     */
    public function getEntraineurs(): Collection
    {
        return $this->entraineurs;
    }

    public function addEntraineur(Entraineur $entraineur): static
    {
        if (!$this->entraineurs->contains($entraineur)) {
            $this->entraineurs->add($entraineur);
            $entraineur->addEquipe($this);
        }

        return $this;
    }

    public function removeEntraineur(Entraineur $entraineur): static
    {
        if ($this->entraineurs->removeElement($entraineur)) {
            $entraineur->removeEquipe($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Joueur>
     */
    public function getJoueurs(): Collection
    {
        return $this->joueurs;
    }

    public function addJoueur(Joueur $joueur): static
    {
        if (!$this->joueurs->contains($joueur)) {
            $this->joueurs->add($joueur);
            $joueur->addEquipe($this);
        }

        return $this;
    }

    public function removeJoueur(Joueur $joueur): static
    {
        if ($this->joueurs->removeElement($joueur)) {
            $joueur->removeEquipe($this);
        }

        return $this;
    }
}
