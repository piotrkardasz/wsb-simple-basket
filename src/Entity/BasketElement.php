<?php

namespace App\Entity;

use App\Repository\BasketElementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BasketElementRepository::class)
 */
class BasketElement extends Element
{
    /**
     * @ORM\Column(type="integer", options={"default": 1})
     */
    private $quantity = 1;

    /**
     * @ORM\ManyToOne(targetEntity=Basket::class, inversedBy="elements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $basket;



    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getBasket(): ?Basket
    {
        return $this->basket;
    }

    public function setBasket(?Basket $basket): self
    {
        $this->basket = $basket;

        return $this;
    }
}
