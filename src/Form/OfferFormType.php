<?php

namespace App\Form;

use App\Entity\Offer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OfferFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre de l\'annonce',
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
            ])
            ->add('location', TextType::class, [
                'label' => 'Ville',
            ]);
            if($options['data']->getId()){
                $builder->add('isClosed', CheckboxType::class, [
                    'label' => 'Fermer l\'annonce?',
                    'required' => false,
                    ])
                    ;
                }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offer::class,
        ]);
    }
}
