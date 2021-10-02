<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_8D93D649F85E0677", columns={"username"})}, indexes={@ORM\Index(name="IDX_8D93D64961190A32", columns={"club_id"}), @ORM\Index(name="IDX_8D93D6496125B98A", columns={"team_veteran_id"}), @ORM\Index(name="IDX_8D93D6496BF700BD", columns={"status_id"}), @ORM\Index(name="IDX_8D93D649296CD8AE", columns={"team_id"}), @ORM\Index(name="IDX_8D93D649E1F4383B", columns={"age_category_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
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
     * @ORM\Column(name="username", type="string", length=180, nullable=false)
     */
    private $username;

    /**
     * @var json
     *
     * @ORM\Column(name="roles", type="json", nullable=false)
     */
    private $roles;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=80, nullable=false)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="first_name", type="string", length=50, nullable=true)
     */
    private $firstName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="last_name", type="string", length=100, nullable=true)
     */
    private $lastName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="full_name", type="string", length=255, nullable=true)
     */
    private $fullName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reset_token", type="string", length=255, nullable=true)
     */
    private $resetToken;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mobile", type="string", length=14, nullable=true)
     */
    private $mobile;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="birth_date", type="date", nullable=true)
     */
    private $birthDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="license", type="string", length=10, nullable=true)
     */
    private $license;

    /**
     * @var string|null
     *
     * @ORM\Column(name="classement_simple", type="string", length=3, nullable=true)
     */
    private $classementSimple;

    /**
     * @var string|null
     *
     * @ORM\Column(name="classement_double", type="string", length=3, nullable=true)
     */
    private $classementDouble;

    /**
     * @var string|null
     *
     * @ORM\Column(name="classement_mixte", type="string", length=3, nullable=true)
     */
    private $classementMixte;

    /**
     * @var string|null
     *
     * @ORM\Column(name="code_postal", type="string", length=5, nullable=true)
     */
    private $codePostal;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mobile_parent", type="string", length=14, nullable=true)
     */
    private $mobileParent;

    /**
     * @var string|null
     *
     * @ORM\Column(name="rue", type="string", length=100, nullable=true)
     */
    private $rue;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ville", type="string", length=30, nullable=true)
     */
    private $ville;

    /**
     * @var string|null
     *
     * @ORM\Column(name="category", type="string", length=30, nullable=true)
     */
    private $category;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_date", type="datetime", nullable=false)
     */
    private $updateDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=false)
     */
    private $createdDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="gender", type="string", length=1, nullable=true)
     */
    private $gender;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    private $active;

    /**
     * @var \Team
     *
     * @ORM\ManyToOne(targetEntity="Team")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="team_id", referencedColumnName="id")
     * })
     */
    private $team;

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
     * @var \TeamVeteran
     *
     * @ORM\ManyToOne(targetEntity="TeamVeteran")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="team_veteran_id", referencedColumnName="id")
     * })
     */
    private $teamVeteran;

    /**
     * @var \Status
     *
     * @ORM\ManyToOne(targetEntity="Status")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     * })
     */
    private $status;

    /**
     * @var \AgeCategory
     *
     * @ORM\ManyToOne(targetEntity="AgeCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="age_category_id", referencedColumnName="id")
     * })
     */
    private $ageCategory;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Population", mappedBy="user")
     */
    private $population;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Sondage", mappedBy="user")
     */
    private $sondage;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->population = new \Doctrine\Common\Collections\ArrayCollection();
        $this->sondage = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getRoles(): ?array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(?string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getResetToken(): ?string
    {
        return $this->resetToken;
    }

    public function setResetToken(?string $resetToken): self
    {
        $this->resetToken = $resetToken;

        return $this;
    }

    public function getMobile(): ?string
    {
        return $this->mobile;
    }

    public function setMobile(?string $mobile): self
    {
        $this->mobile = $mobile;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(?\DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getLicense(): ?string
    {
        return $this->license;
    }

    public function setLicense(?string $license): self
    {
        $this->license = $license;

        return $this;
    }

    public function getClassementSimple(): ?string
    {
        return $this->classementSimple;
    }

    public function setClassementSimple(?string $classementSimple): self
    {
        $this->classementSimple = $classementSimple;

        return $this;
    }

    public function getClassementDouble(): ?string
    {
        return $this->classementDouble;
    }

    public function setClassementDouble(?string $classementDouble): self
    {
        $this->classementDouble = $classementDouble;

        return $this;
    }

    public function getClassementMixte(): ?string
    {
        return $this->classementMixte;
    }

    public function setClassementMixte(?string $classementMixte): self
    {
        $this->classementMixte = $classementMixte;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(?string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getMobileParent(): ?string
    {
        return $this->mobileParent;
    }

    public function setMobileParent(?string $mobileParent): self
    {
        $this->mobileParent = $mobileParent;

        return $this;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(?string $rue): self
    {
        $this->rue = $rue;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(?string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getUpdateDate(): ?\DateTimeInterface
    {
        return $this->updateDate;
    }

    public function setUpdateDate(\DateTimeInterface $updateDate): self
    {
        $this->updateDate = $updateDate;

        return $this;
    }

    public function getCreatedDate(): ?\DateTimeInterface
    {
        return $this->createdDate;
    }

    public function setCreatedDate(\DateTimeInterface $createdDate): self
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function setTeam(?Team $team): self
    {
        $this->team = $team;

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

    public function getTeamVeteran(): ?TeamVeteran
    {
        return $this->teamVeteran;
    }

    public function setTeamVeteran(?TeamVeteran $teamVeteran): self
    {
        $this->teamVeteran = $teamVeteran;

        return $this;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getAgeCategory(): ?AgeCategory
    {
        return $this->ageCategory;
    }

    public function setAgeCategory(?AgeCategory $ageCategory): self
    {
        $this->ageCategory = $ageCategory;

        return $this;
    }

    /**
     * @return Collection|Population[]
     */
    public function getPopulation(): Collection
    {
        return $this->population;
    }

    public function addPopulation(Population $population): self
    {
        if (!$this->population->contains($population)) {
            $this->population[] = $population;
            $population->addUser($this);
        }

        return $this;
    }

    public function removePopulation(Population $population): self
    {
        if ($this->population->removeElement($population)) {
            $population->removeUser($this);
        }

        return $this;
    }

    /**
     * @return Collection|Sondage[]
     */
    public function getSondage(): Collection
    {
        return $this->sondage;
    }

    public function addSondage(Sondage $sondage): self
    {
        if (!$this->sondage->contains($sondage)) {
            $this->sondage[] = $sondage;
            $sondage->addUser($this);
        }

        return $this;
    }

    public function removeSondage(Sondage $sondage): self
    {
        if ($this->sondage->removeElement($sondage)) {
            $sondage->removeUser($this);
        }

        return $this;
    }

}
