<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InterclubUser
 *
 * @ORM\Table(name="interclub_user", indexes={@ORM\Index(name="IDX_FC040213A76ED395", columns={"user_id"}), @ORM\Index(name="IDX_FC04021337DA8F60", columns={"interclub_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\InterclubUserRepository")
 */
class InterclubUser
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
     * @var \Interclub
     *
     * @ORM\ManyToOne(targetEntity="Interclub")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="interclub_id", referencedColumnName="id")
     * })
     */
    private $interclub;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

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

    public function getInterclub(): ?Interclub
    {
        return $this->interclub;
    }

    public function setInterclub(?Interclub $interclub): self
    {
        $this->interclub = $interclub;

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


}
