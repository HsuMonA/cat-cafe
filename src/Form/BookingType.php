<?php

namespace App\Form;

use App\Entity\Booking;
use App\Entity\Service;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class BookingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, ['mapped' => false])
            ->add('lastName', TextType::class, ['mapped' => false])
            ->add('email', EmailType::class, ['mapped' => false])
            ->add('telephoneNumber', TelType::class, ['mapped' => false])
            ->add('date')
            ->add('numberOfPersons')
            ->add('service', EntityType::class, [
                'class' => Service::class,
                'choice_label' => 'type',

                // used to render a select box, check boxes or radios
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('submit', SubmitType::class, ['label' => 'Submit'])
            ->add('cancel', ButtonType::class, ['label' => 'Cancel'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
        ]);
    }
}