<?php

namespace App\Entity;

use App\Repository\OrderElementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderElementRepository::class)
 */
class OrderElement extends Element
{
    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="orderElements")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $product;

    /**
     * @ORM\ManyToOne(targetEntity=Order::class, inversedBy="elements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $shopOrder;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    public function getShopOrder(): ?Order
    {
        return $this->shopOrder;
    }

    public function setShopOrder(?Order $shopOrder): self
    {
        $this->shopOrder = $shopOrder;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }
}
