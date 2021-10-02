<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LienDoodle
 *
 * @ORM\Table(name="lien_doodle", indexes={@ORM\Index(name="IDX_4ABFED90A21BD112", columns={"personne_id"}), @ORM\Index(name="IDX_4ABFED90C9EC860E", columns={"doodle_id"}), @ORM\Index(name="IDX_4ABFED90126F525E", columns={"item_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\LienDoodleRepository")
 */
class LienDoodle
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
     * @var string|null
     *
     * @ORM\Column(name="value", type="string", length=255, nullable=true)
     */
    private $value;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated_dt", type="datetime", nullable=true)
     */
    private $updatedDt;

    /**
     * @var \Item
     *
     * @ORM\ManyToOne(targetEntity="Item")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="item_id", referencedColumnName="id")
     * })
     */
    private $item;

    /**
     * @var \Personne
     *
     * @ORM\ManyToOne(targetEntity="Personne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="personne_id", referencedColumnName="id")
     * })
     */
    private $personne;

    /**
     * @var \Doodle
     *
     * @ORM\ManyToOne(targetEntity="Doodle")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="doodle_id", referencedColumnName="id")
     * })
     */
    private $doodle;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getUpdatedDt(): ?\DateTimeInterface
    {
        return $this->updatedDt;
    }

    public function setUpdatedDt(?\DateTimeInterface $updatedDt): self
    {
        $this->updatedDt = $updatedDt;

        return $this;
    }

    public function getItem(): ?Item
    {
        return $this->item;
    }

    public function setItem(?Item $item): self
    {
        $this->item = $item;

        return $this;
    }

    public function getPersonne(): ?Personne
    {
        return $this->personne;
    }

    public function setPersonne(?Personne $personne): self
    {
        $this->personne = $personne;

        return $this;
    }

    public function getDoodle(): ?Doodle
    {
        return $this->doodle;
    }

    public function setDoodle(?Doodle $doodle): self
    {
        $this->doodle = $doodle;

        return $this;
    }


}
