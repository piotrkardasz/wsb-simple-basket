<?php

namespace App\Entity\PaymentMethod;

use App\Repository\CODPaymentMethodRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CODPaymentMethodRepository::class)
 */
class CODPaymentMethod extends AbstractPaymentMethod
{
    public function getName(): ?string
    {
        return $this->name ??  "Cash On Delivery";
    }

}
