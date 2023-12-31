<?php

namespace App\Form;

use App\Entity\Kitchen;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class KitchenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
        {
                $builder
                        ->add('description')
                        ->add('owner', null, [
                                'disabled'   => true,
                        ])
                ;
        }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Kitchen::class,
        ]);
    }
}