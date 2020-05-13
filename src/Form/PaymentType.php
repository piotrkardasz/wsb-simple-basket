<?php

namespace App\Form;

use App\Entity\PaymentMethod\AbstractPaymentMethod;
use App\Entity\PaymentMethod\CODPaymentMethod;
use App\Entity\PaymentMethod\PayuPaymentMethod;
use App\Entity\PaymentMethod\Przelewy24PaymentMethod;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PaymentType extends AbstractType
{
    public static function paymentOptions(): array
    {
        $paymentMethods = [
            new CODPaymentMethod(),
            new PayuPaymentMethod(),
            new Przelewy24PaymentMethod()
        ];

        return array_map(function (AbstractPaymentMethod $paymentMethod) {
            return $paymentMethod->getName();
        }, $paymentMethods);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder
            ->add('paymentOption', ChoiceType::class, [
                'choices' => array_flip(self::paymentOptions())
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here

        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }

}
