<?php

namespace App\Entity\PaymentMethod;

use App\Repository\PayuPaymentMethodRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PayuPaymentMethodRepository::class)
 */
class PayuPaymentMethod extends AbstractPaymentMethod
{
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $serviceUrl;

    public function getServiceUrl(): ?string
    {
        return $this->serviceUrl;
    }

    public function setServiceUrl(string $serviceUrl): self
    {
        $this->serviceUrl = $serviceUrl;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name ?? 'PayU - Electronic payments by allegro.pl';
    }


}
