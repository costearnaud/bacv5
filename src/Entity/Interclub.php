<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Interclub
 *
 * @ORM\Table(name="interclub", indexes={@ORM\Index(name="IDX_890EAFC8E961E301", columns={"ddjoueuse1_id"}), @ORM\Index(name="IDX_890EAFC877CFF221", columns={"dh1joueur1_id"}), @ORM\Index(name="IDX_890EAFC82B1FF874", columns={"team_ext_id"}), @ORM\Index(name="IDX_890EAFC8EE2D9420", columns={"dh2joueur1_id"}), @ORM\Index(name="IDX_890EAFC86AB213CC", columns={"lieu_id"}), @ORM\Index(name="IDX_890EAFC861B44C89", columns={"dmxjoueur_id"}), @ORM\Index(name="IDX_890EAFC85614CE48", columns={"sh2_id"}), @ORM\Index(name="IDX_890EAFC8B452C185", columns={"team_bacv_id"}), @ORM\Index(name="IDX_890EAFC8737F9194", columns={"sh4_id"}), @ORM\Index(name="IDX_890EAFC8FBD44CEF", columns={"ddjoueuse2_id"}), @ORM\Index(name="IDX_890EAFC8D7B4B9AB", columns={"team_home_id"}), @ORM\Index(name="IDX_890EAFC8657A5DCF", columns={"dh1joueur2_id"}), @ORM\Index(name="IDX_890EAFC8F965414C", columns={"saison_id"}), @ORM\Index(name="IDX_890EAFC8FC983BCE", columns={"dh2joueur2_id"}), @ORM\Index(name="IDX_890EAFC844A161A6", columns={"sh1_id"}), @ORM\Index(name="IDX_890EAFC83B66131E", columns={"dmxjoueuse_id"}), @ORM\Index(name="IDX_890EAFC8EEA8A92D", columns={"sh3_id"}), @ORM\Index(name="IDX_890EAFC855141174", columns={"sd_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\InterclubRepository")
 */
class Interclub
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
     * @ORM\Column(name="name", type="string", length=40, nullable=false)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_rencontre", type="datetime", nullable=false)
     */
    private $dateRencontre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="score", type="string", length=10, nullable=true)
     */
    private $score;

    /**
     * @var string|null
     *
     * @ORM\Column(name="location", type="string", length=255, nullable=true)
     */
    private $location;

    /**
     * @var \Team
     *
     * @ORM\ManyToOne(targetEntity="Team")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="team_ext_id", referencedColumnName="id")
     * })
     */
    private $teamExt;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dmxjoueuse_id", referencedColumnName="id")
     * })
     */
    private $dmxjoueuse;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sh1_id", referencedColumnName="id")
     * })
     */
    private $sh1;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sd_id", referencedColumnName="id")
     * })
     */
    private $sd;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sh2_id", referencedColumnName="id")
     * })
     */
    private $sh2;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dmxjoueur_id", referencedColumnName="id")
     * })
     */
    private $dmxjoueur;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dh1joueur2_id", referencedColumnName="id")
     * })
     */
    private $dh1joueur2;

    /**
     * @var \Lieu
     *
     * @ORM\ManyToOne(targetEntity="Lieu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lieu_id", referencedColumnName="id")
     * })
     */
    private $lieu;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sh4_id", referencedColumnName="id")
     * })
     */
    private $sh4;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dh1joueur1_id", referencedColumnName="id")
     * })
     */
    private $dh1joueur1;

    /**
     * @var \Team
     *
     * @ORM\ManyToOne(targetEntity="Team")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="team_bacv_id", referencedColumnName="id")
     * })
     */
    private $teamBacv;

    /**
     * @var \Team
     *
     * @ORM\ManyToOne(targetEntity="Team")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="team_home_id", referencedColumnName="id")
     * })
     */
    private $teamHome;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ddjoueuse1_id", referencedColumnName="id")
     * })
     */
    private $ddjoueuse1;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dh2joueur1_id", referencedColumnName="id")
     * })
     */
    private $dh2joueur1;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sh3_id", referencedColumnName="id")
     * })
     */
    private $sh3;

    /**
     * @var \Saison
     *
     * @ORM\ManyToOne(targetEntity="Saison")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="saison_id", referencedColumnName="id")
     * })
     */
    private $saison;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ddjoueuse2_id", referencedColumnName="id")
     * })
     */
    private $ddjoueuse2;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dh2joueur2_id", referencedColumnName="id")
     * })
     */
    private $dh2joueur2;

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

    public function getDateRencontre(): ?\DateTimeInterface
    {
        return $this->dateRencontre;
    }

    public function setDateRencontre(\DateTimeInterface $dateRencontre): self
    {
        $this->dateRencontre = $dateRencontre;

        return $this;
    }

    public function getScore(): ?string
    {
        return $this->score;
    }

    public function setScore(?string $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getTeamExt(): ?Team
    {
        return $this->teamExt;
    }

    public function setTeamExt(?Team $teamExt): self
    {
        $this->teamExt = $teamExt;

        return $this;
    }

    public function getDmxjoueuse(): ?User
    {
        return $this->dmxjoueuse;
    }

    public function setDmxjoueuse(?User $dmxjoueuse): self
    {
        $this->dmxjoueuse = $dmxjoueuse;

        return $this;
    }

    public function getSh1(): ?User
    {
        return $this->sh1;
    }

    public function setSh1(?User $sh1): self
    {
        $this->sh1 = $sh1;

        return $this;
    }

    public function getSd(): ?User
    {
        return $this->sd;
    }

    public function setSd(?User $sd): self
    {
        $this->sd = $sd;

        return $this;
    }

    public function getSh2(): ?User
    {
        return $this->sh2;
    }

    public function setSh2(?User $sh2): self
    {
        $this->sh2 = $sh2;

        return $this;
    }

    public function getDmxjoueur(): ?User
    {
        return $this->dmxjoueur;
    }

    public function setDmxjoueur(?User $dmxjoueur): self
    {
        $this->dmxjoueur = $dmxjoueur;

        return $this;
    }

    public function getDh1joueur2(): ?User
    {
        return $this->dh1joueur2;
    }

    public function setDh1joueur2(?User $dh1joueur2): self
    {
        $this->dh1joueur2 = $dh1joueur2;

        return $this;
    }

    public function getLieu(): ?Lieu
    {
        return $this->lieu;
    }

    public function setLieu(?Lieu $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getSh4(): ?User
    {
        return $this->sh4;
    }

    public function setSh4(?User $sh4): self
    {
        $this->sh4 = $sh4;

        return $this;
    }

    public function getDh1joueur1(): ?User
    {
        return $this->dh1joueur1;
    }

    public function setDh1joueur1(?User $dh1joueur1): self
    {
        $this->dh1joueur1 = $dh1joueur1;

        return $this;
    }

    public function getTeamBacv(): ?Team
    {
        return $this->teamBacv;
    }

    public function setTeamBacv(?Team $teamBacv): self
    {
        $this->teamBacv = $teamBacv;

        return $this;
    }

    public function getTeamHome(): ?Team
    {
        return $this->teamHome;
    }

    public function setTeamHome(?Team $teamHome): self
    {
        $this->teamHome = $teamHome;

        return $this;
    }

    public function getDdjoueuse1(): ?User
    {
        return $this->ddjoueuse1;
    }

    public function setDdjoueuse1(?User $ddjoueuse1): self
    {
        $this->ddjoueuse1 = $ddjoueuse1;

        return $this;
    }

    public function getDh2joueur1(): ?User
    {
        return $this->dh2joueur1;
    }

    public function setDh2joueur1(?User $dh2joueur1): self
    {
        $this->dh2joueur1 = $dh2joueur1;

        return $this;
    }

    public function getSh3(): ?User
    {
        return $this->sh3;
    }

    public function setSh3(?User $sh3): self
    {
        $this->sh3 = $sh3;

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

    public function getDdjoueuse2(): ?User
    {
        return $this->ddjoueuse2;
    }

    public function setDdjoueuse2(?User $ddjoueuse2): self
    {
        $this->ddjoueuse2 = $ddjoueuse2;

        return $this;
    }

    public function getDh2joueur2(): ?User
    {
        return $this->dh2joueur2;
    }

    public function setDh2joueur2(?User $dh2joueur2): self
    {
        $this->dh2joueur2 = $dh2joueur2;

        return $this;
    }


}
