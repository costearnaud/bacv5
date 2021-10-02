<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * TeamVeteran
 *
 * @ORM\Table(name="team_veteran", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_34A73E082A10D79E", columns={"capitaine_id"})}, indexes={@ORM\Index(name="IDX_34A73E0861190A32", columns={"club_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\TeamVeteranRepository")
 */
class TeamVeteran
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="slug", type="string", length=20, nullable=true)
     */
    private $slug;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="capitaine_id", referencedColumnName="id")
     * })
     */
    private $capitaine;

    /**
     * @var \Club
     *
     * @ORM\ManyToOne(targetEntity="Club")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="club_id", referencedColumnName="id")
     * })
     */
    private $club;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Saison", inversedBy="teamVeteran")
     * @ORM\JoinTable(name="team_veteran_saison",
     *   joinColumns={
     *     @ORM\JoinColumn(name="team_veteran_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="saison_id", referencedColumnName="id")
     *   }
     * )
     */
    private $saison;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->saison = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getCapitaine(): ?User
    {
        return $this->capitaine;
    }

    public function setCapitaine(?User $capitaine): self
    {
        $this->capitaine = $capitaine;

        return $this;
    }

    public function getClub(): ?Club
    {
        return $this->club;
    }

    public function setClub(?Club $club): self
    {
        $this->club = $club;

        return $this;
    }

    /**
     * @return Collection|Saison[]
     */
    public function getSaison(): Collection
    {
        return $this->saison;
    }

    public function addSaison(Saison $saison): self
    {
        if (!$this->saison->contains($saison)) {
            $this->saison[] = $saison;
        }

        return $this;
    }

    public function removeSaison(Saison $saison): self
    {
        $this->saison->removeElement($saison);

        return $this;
    }

}
