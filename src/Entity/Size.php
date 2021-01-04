<?php

namespace App\Entity;

use App\Repository\SizeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SizeRepository::class)
 */
class Size
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $small;

    /**
     * @ORM\Column(type="integer")
     */
    private $medium;

    /**
     * @ORM\Column(type="integer")
     */
    private $large;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Product", inversedBy="size", cascade={"remove"})
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $product;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSmall(): ?int
    {
        return $this->small;
    }

    public function setSmall(int $small): self
    {
        $this->small = $small;

        return $this;
    }

    public function getMedium(): ?int
    {
        return $this->medium;
    }

    public function setMedium(int $medium): self
    {
        $this->medium = $medium;

        return $this;
    }

    public function getLarge(): ?int
    {
        return $this->large;
    }

    public function setLarge(int $large): self
    {
        $this->large = $large;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }
}
