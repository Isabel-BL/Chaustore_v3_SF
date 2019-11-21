<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StockRepository")
 */
class Stock
{
    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="App\Entity\Product", inversedBy="stock")
     * @ORM\JoinColumn(nullable=false)
     */
    private $product;

    /** 
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="App\Entity\Size", inversedBy="stock")
     * @ORM\JoinColumn(nullable=false)
     */
    private $size;

    /**
     * @ORM\Column(type="integer")
     */
    private $stock;

    public function __constuct()
    {
        $this->product = $product;
        $this->size = $size;
    }  
      
    public function getId(): ?int
    {
        return $this->id;
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

    public function getSize(): ?Size
    {
        return $this->size;
    }

    public function setSize(?Size $size): self
    {
        $this->size = $size;

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
    public function __toString()
    {
        return $this->name;
    }    
    
}
