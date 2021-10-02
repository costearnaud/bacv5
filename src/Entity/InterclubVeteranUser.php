<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InterclubVeteranUser
 *
 * @ORM\Table(name="interclub_veteran_user", indexes={@ORM\Index(name="IDX_C012F00DA76ED395", columns={"user_id"}), @ORM\Index(name="IDX_C012F00DFB38E23D", columns={"interclub_veteran_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\InterclubVeteranUserRepository")
 */
class InterclubVeteranUser
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
     * @ORM\Column(name="type", type="string", length=30, nullable=false)
     */
    private $type;

    /**
     * @var string|null
     *
     * @ORM\Column(name="value", type="string", length=30, nullable=true)
     */
    private $value;

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
     * @var \InterclubVeteran
     *
     * @ORM\ManyToOne(targetEntity="InterclubVeteran")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="interclub_veteran_id", referencedColumnName="id")
     * })
     */
    private $interclubVeteran;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(?string $value): self
    {
        $this->value = $value;

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

    public function getInterclubVeteran(): ?InterclubVeteran
    {
        return $this->interclubVeteran;
    }

    public function setInterclubVeteran(?InterclubVeteran $interclubVeteran): self
    {
        $this->interclubVeteran = $interclubVeteran;

        return $this;
    }


}
