<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tournoi
 *
 * @ORM\Table(name="tournoi", indexes={@ORM\Index(name="IDX_18AFD9DF61190A32", columns={"club_id"}), @ORM\Index(name="IDX_18AFD9DFF965414C", columns={"saison_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\TournoiRepository")
 */
class Tournoi
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="date", nullable=false)
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="date", nullable=false)
     */
    private $dateFin;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=100, nullable=false)
     */
    private $lieu;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lien_inscription", type="string", length=255, nullable=true)
     */
    private $lienInscription;

    /**
     * @var string|null
     *
     * @ORM\Column(name="classements", type="string", length=100, nullable=true)
     */
    private $classements;

    /**
     * @var string|null
     *
     * @ORM\Column(name="categories", type="string", length=100, nullable=true)
     */
    private $categories;

    /**
     * @var string
     *
     * @ORM\Column(name="tableaux", type="string", length=100, nullable=false)
     */
    private $tableaux;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_inscription", type="date", nullable=true)
     */
    private $dateInscription;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lien_convocation", type="string", length=255, nullable=true)
     */
    private $lienConvocation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lien_description", type="string", length=255, nullable=true)
     */
    private $lienDescription;

    /**
     * @var string|null
     *
     * @ORM\Column(name="slug", type="string", length=20, nullable=true)
     */
    private $slug;

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
     * @var \Saison
     *
     * @ORM\ManyToOne(targetEntity="Saison")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="saison_id", referencedColumnName="id")
     * })
     */
    private $saison;

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

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getLienInscription(): ?string
    {
        return $this->lienInscription;
    }

    public function setLienInscription(?string $lienInscription): self
    {
        $this->lienInscription = $lienInscription;

        return $this;
    }

    public function getClassements(): ?string
    {
        return $this->classements;
    }

    public function setClassements(?string $classements): self
    {
        $this->classements = $classements;

        return $this;
    }

    public function getCategories(): ?string
    {
        return $this->categories;
    }

    public function setCategories(?string $categories): self
    {
        $this->categories = $categories;

        return $this;
    }

    public function getTableaux(): ?string
    {
        return $this->tableaux;
    }

    public function setTableaux(string $tableaux): self
    {
        $this->tableaux = $tableaux;

        return $this;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->dateInscription;
    }

    public function setDateInscription(?\DateTimeInterface $dateInscription): self
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    public function getLienConvocation(): ?string
    {
        return $this->lienConvocation;
    }

    public function setLienConvocation(?string $lienConvocation): self
    {
        $this->lienConvocation = $lienConvocation;

        return $this;
    }

    public function getLienDescription(): ?string
    {
        return $this->lienDescription;
    }

    public function setLienDescription(?string $lienDescription): self
    {
        $this->lienDescription = $lienDescription;

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

    public function getClub(): ?Club
    {
        return $this->club;
    }

    public function setClub(?Club $club): self
    {
        $this->club = $club;

        return $this;
    }

    public function getSaison(): ?Saison
    {
        return $this->saison;
    }

    public function setSaison(?Saison $saison): self
    {
        $this->saison = $saison;

        return $this;
    }


}
