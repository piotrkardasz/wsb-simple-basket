<?php

namespace App\Entity\PaymentMethod;

use App\Repository\Przelewy24PaymentMethodRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=Przelewy24PaymentMethodRepository::class)
 */
class Przelewy24PaymentMethod extends AbstractPaymentMethod
{
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $serviceWsdlUrl;

    public function getServiceWsdlUrl(): ?string
    {
        return $this->serviceWsdlUrl;
    }

    public function setServiceWsdlUrl(string $serviceWsdlUrl): self
    {
        $this->serviceWsdlUrl = $serviceWsdlUrl;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name ?? 'Pay with przelewy24.pl';
    }
}
