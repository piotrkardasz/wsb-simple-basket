<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\OneToMany(targetEntity=BasketElement::class, mappedBy="product")
     */
    private $basketElements;

    /**
     * @ORM\OneToMany(targetEntity=OrderElement::class, mappedBy="product")
     */
    private $orderElements;

    public function __construct()
    {
        $this->basketElements = new ArrayCollection();
        $this->orderElements = new ArrayCollection();
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

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection|BasketElement[]
     */
    public function getBasketElements(): Collection
    {
        return $this->basketElements;
    }

    public function addBasketElement(Element $basketElement): self
    {
        if (!$this->basketElements->contains($basketElement)) {
            $this->basketElements[] = $basketElement;
            $basketElement->setProduct($this);
        }

        return $this;
    }

    public function removeBasketElement(Element $basketElement): self
    {
        if ($this->basketElements->contains($basketElement)) {
            $this->basketElements->removeElement($basketElement);
            // set the owning side to null (unless already changed)
            if ($basketElement->getProduct() === $this) {
                $basketElement->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|OrderElement[]
     */
    public function getOrderElements(): Collection
    {
        return $this->orderElements;
    }

    public function addOrderElement(Element $orderElement): self
    {
        if (!$this->orderElements->contains($orderElement)) {
            $this->orderElements[] = $orderElement;
            $orderElement->setProduct($this);
        }

        return $this;
    }

    public function removeOrderElement(Element $orderElement): self
    {
        if ($this->orderElements->contains($orderElement)) {
            $this->orderElements->removeElement($orderElement);
            // set the owning side to null (unless already changed)
            if ($orderElement->getProduct() === $this) {
                $orderElement->setProduct(null);
            }
        }

        return $this;
    }
}
