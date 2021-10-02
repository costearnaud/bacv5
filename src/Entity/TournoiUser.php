<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TournoiUser
 *
 * @ORM\Table(name="tournoi_user", indexes={@ORM\Index(name="IDX_D0703ACDA76ED395", columns={"user_id"}), @ORM\Index(name="IDX_D0703ACD5691070C", columns={"partenaire_mixte_id"}), @ORM\Index(name="IDX_D0703ACDF607770A", columns={"tournoi_id"}), @ORM\Index(name="IDX_D0703ACD486735A1", columns={"partenaire_double_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\TournoiUserRepository")
 */
class TournoiUser
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
     * @var bool|null
     *
     * @ORM\Column(name="inscription", type="boolean", nullable=true)
     */
    private $inscription;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="participation", type="boolean", nullable=true)
     */
    private $participation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="resultat_simple", type="string", length=30, nullable=true)
     */
    private $resultatSimple;

    /**
     * @var string|null
     *
     * @ORM\Column(name="resultat_double", type="string", length=30, nullable=true)
     */
    private $resultatDouble;

    /**
     * @var string|null
     *
     * @ORM\Column(name="resultat_mixte", type="string", length=30, nullable=true)
     */
    private $resultatMixte;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nb_tableaux", type="integer", nullable=true)
     */
    private $nbTableaux;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="inscription_simple", type="boolean", nullable=true)
     */
    private $inscriptionSimple;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="inscription_double", type="boolean", nullable=true)
     */
    private $inscriptionDouble;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="inscription_mixte", type="boolean", nullable=true)
     */
    private $inscriptionMixte;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="participation_simple", type="boolean", nullable=true)
     */
    private $participationSimple;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="participation_double", type="boolean", nullable=true)
     */
    private $participationDouble;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="participation_mixte", type="boolean", nullable=true)
     */
    private $participationMixte;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="inscription_confirmee", type="boolean", nullable=true)
     */
    private $inscriptionConfirmee;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="partenaire_double_id", referencedColumnName="id")
     * })
     */
    private $partenaireDouble;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="partenaire_mixte_id", referencedColumnName="id")
     * })
     */
    private $partenaireMixte;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \Tournoi
     *
     * @ORM\ManyToOne(targetEntity="Tournoi")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tournoi_id", referencedColumnName="id")
     * })
     */
    private $tournoi;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInscription(): ?bool
    {
        return $this->inscription;
    }

    public function setInscription(?bool $inscription): self
    {
        $this->inscription = $inscription;

        return $this;
    }

    public function getParticipation(): ?bool
    {
        return $this->participation;
    }

    public function setParticipation(?bool $participation): self
    {
        $this->participation = $participation;

        return $this;
    }

    public function getResultatSimple(): ?string
    {
        return $this->resultatSimple;
    }

    public function setResultatSimple(?string $resultatSimple): self
    {
        $this->resultatSimple = $resultatSimple;

        return $this;
    }

    public function getResultatDouble(): ?string
    {
        return $this->resultatDouble;
    }

    public function setResultatDouble(?string $resultatDouble): self
    {
        $this->resultatDouble = $resultatDouble;

        return $this;
    }

    public function getResultatMixte(): ?string
    {
        return $this->resultatMixte;
    }

    public function setResultatMixte(?string $resultatMixte): self
    {
        $this->resultatMixte = $resultatMixte;

        return $this;
    }

    public function getNbTableaux(): ?int
    {
        return $this->nbTableaux;
    }

    public function setNbTableaux(?int $nbTableaux): self
    {
        $this->nbTableaux = $nbTableaux;

        return $this;
    }

    public function getInscriptionSimple(): ?bool
    {
        return $this->inscriptionSimple;
    }

    public function setInscriptionSimple(?bool $inscriptionSimple): self
    {
        $this->inscriptionSimple = $inscriptionSimple;

        return $this;
    }

    public function getInscriptionDouble(): ?bool
    {
        return $this->inscriptionDouble;
    }

    public function setInscriptionDouble(?bool $inscriptionDouble): self
    {
        $this->inscriptionDouble = $inscriptionDouble;

        return $this;
    }

    public function getInscriptionMixte(): ?bool
    {
        return $this->inscriptionMixte;
    }

    public function setInscriptionMixte(?bool $inscriptionMixte): self
    {
        $this->inscriptionMixte = $inscriptionMixte;

        return $this;
    }

    public function getParticipationSimple(): ?bool
    {
        return $this->participationSimple;
    }

    public function setParticipationSimple(?bool $participationSimple): self
    {
        $this->participationSimple = $participationSimple;

        return $this;
    }

    public function getParticipationDouble(): ?bool
    {
        return $this->participationDouble;
    }

    public function setParticipationDouble(?bool $participationDouble): self
    {
        $this->participationDouble = $participationDouble;

        return $this;
    }

    public function getParticipationMixte(): ?bool
    {
        return $this->participationMixte;
    }

    public function setParticipationMixte(?bool $participationMixte): self
    {
        $this->participationMixte = $participationMixte;

        return $this;
    }

    public function getInscriptionConfirmee(): ?bool
    {
        return $this->inscriptionConfirmee;
    }

    public function setInscriptionConfirmee(?bool $inscriptionConfirmee): self
    {
        $this->inscriptionConfirmee = $inscriptionConfirmee;

        return $this;
    }

    public function getPartenaireDouble(): ?User
    {
        return $this->partenaireDouble;
    }

    public function setPartenaireDouble(?User $partenaireDouble): self
    {
        $this->partenaireDouble = $partenaireDouble;

        return $this;
    }

    public function getPartenaireMixte(): ?User
    {
        return $this->partenaireMixte;
    }

    public function setPartenaireMixte(?User $partenaireMixte): self
    {
        $this->partenaireMixte = $partenaireMixte;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getTournoi(): ?Tournoi
    {
        return $this->tournoi;
    }

    public function setTournoi(?Tournoi $tournoi): self
    {
        $this->tournoi = $tournoi;

        return $this;
    }


}
