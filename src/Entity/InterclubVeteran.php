<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InterclubVeteran
 *
 * @ORM\Table(name="interclub_veteran", indexes={@ORM\Index(name="IDX_21CAE2D4D7B4B9AB", columns={"team_home_id"}), @ORM\Index(name="IDX_21CAE2D46AB213CC", columns={"lieu_id"}), @ORM\Index(name="IDX_21CAE2D4F965414C", columns={"saison_id"}), @ORM\Index(name="IDX_21CAE2D42B1FF874", columns={"team_ext_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\InterclubVeteranRepository")
 */
class InterclubVeteran
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
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_rencontre", type="date", nullable=true)
     */
    private $dateRencontre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="score", type="string", length=3, nullable=true)
     */
    private $score;

    /**
     * @var string|null
     *
     * @ORM\Column(name="location", type="string", length=255, nullable=true)
     */
    private $location;

    /**
     * @var \TeamVeteran
     *
     * @ORM\ManyToOne(targetEntity="TeamVeteran")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="team_ext_id", referencedColumnName="id")
     * })
     */
    private $teamExt;

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
     * @var \TeamVeteran
     *
     * @ORM\ManyToOne(targetEntity="TeamVeteran")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="team_home_id", referencedColumnName="id")
     * })
     */
    private $teamHome;

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

    public function getDateRencontre(): ?\DateTimeInterface
    {
        return $this->dateRencontre;
    }

    public function setDateRencontre(?\DateTimeInterface $dateRencontre): self
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

    public function getTeamExt(): ?TeamVeteran
    {
        return $this->teamExt;
    }

    public function setTeamExt(?TeamVeteran $teamExt): self
    {
        $this->teamExt = $teamExt;

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

    public function getTeamHome(): ?TeamVeteran
    {
        return $this->teamHome;
    }

    public function setTeamHome(?TeamVeteran $teamHome): self
    {
        $this->teamHome = $teamHome;

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
