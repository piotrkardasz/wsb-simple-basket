<?php

namespace App\Entity;

use App\Helper\HashGenerator;
use App\Repository\BasketRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BasketRepository::class)
 */
class Basket
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=BasketElement::class, mappedBy="basket", orphanRemoval=true)
     */
    private $elements;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hash;

    public function __construct()
    {
        $this->hash = HashGenerator::generateHash();
        $this->elements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|BasketElement[]
     */
    public function getElements(): Collection
    {
        return $this->elements;
    }

    public function addElement(BasketElement $element): self
    {
        if (!$this->elements->contains($element)) {
            $this->elements[] = $element;
            $element->setBasket($this);
        }

        return $this;
    }

    public function removeElement(BasketElement $element): self
    {
        if ($this->elements->contains($element)) {
            $this->elements->removeElement($element);
            // set the owning side to null (unless already changed)
            if ($element->getBasket() === $this) {
                $element->setBasket(null);
            }
        }

        return $this;
    }

    public function getHash(): ?string
    {
        return $this->hash;
    }

    public function setHash(string $hash): self
    {
        $this->hash = $hash;

        return $this;
    }
}
