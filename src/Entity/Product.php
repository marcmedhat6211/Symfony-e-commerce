<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 * @UniqueEntity("code",
 *              message="This code is already taken by another product")
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank
     * @Assert\Positive
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Assert\NotBlank
     */
    private $code;

    /**
     * @ORM\Column(type="integer")
     * @Assert\PositiveOrZero
     * @Assert\NotBlank
     */
    private $stock;

    /**
     * @ORM\Column(type="boolean", options={"default" : 1})
     * @Assert\NotBlank
     */
    private $availability;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="product")
     * @Assert\NotBlank
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Accessory", mappedBy="product", cascade={"remove"}, cascade={"persist"})
     * JoinColumn(onDelete="CASCADE")
     */
    private $accessory;

    /**
    * @ORM\OneToMany(targetEntity="App\Entity\Image", mappedBy="product")
    *
    */
    private $image;

    /**
    * @ORM\Column(type="string", length=255)
    */
    private $mainImage;

    public function __construct()
    {
        $this->image = new ArrayCollection();
        $this->accessory = new ArrayCollection();
    }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getAvailability(): ?bool
    {
        return $this->availability;
    }

    public function setAvailability(bool $availability): self
    {
        $this->availability = $availability;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImage(): Collection
    {
        return $this->image;
    }

    public function addImage(Image $image): self
    {
        if (!$this->image->contains($image)) {
            $this->image[] = $image;
            $image->setProduct($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->image->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getProduct() === $this) {
                $image->setProduct(null);
            }
        }

        return $this;
    }

    
    public function getMainImage(): ?string
    {
        return $this->mainImage;
    }
    
    public function setMainImage(string $mainImage): self
    {
        $this->mainImage = $mainImage;
        
        return $this;
    }
    
    public function getPrice(): ?float
    {
        return $this->price;
    }
    
    public function setPrice(float $price): self
    {
        $this->price = $price;
        
        return $this;
    }
    
    /**
     * @return Collection|Accessory[]
     */
    public function getAccessory(): Collection
    {
        return $this->accessory;
    }
    
    public function addAccessory(Accessory $accessory): self
    {
        if (!$this->accessory->contains($accessory)) {
            $this->accessory[] = $accessory;
            $accessory->setProduct($this);
        }
        
        return $this;
    }
    
    public function removeAccessory(Accessory $accessory): self
    {
        if ($this->accessory->removeElement($accessory)) {
            // set the owning side to null (unless already changed)
            if ($accessory->getProduct() === $this) {
                $accessory->setProduct(null);
            }
        }
        
        return $this;
    }
    
    public function __toString() {
        return $this->name;
    }
}