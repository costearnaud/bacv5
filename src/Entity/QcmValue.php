<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QcmValue
 *
 * @ORM\Table(name="qcm_value", indexes={@ORM\Index(name="IDX_93595C4EC9EC860E", columns={"doodle_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\QcmValueRepository")
 */
class QcmValue
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255, nullable=false)
     */
    private $value;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

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
