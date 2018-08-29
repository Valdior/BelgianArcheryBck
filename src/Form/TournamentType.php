<?php

namespace App\Form;

use App\Entity\Tournament;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class TournamentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('startDate', DateType::class, array(
                'widget' => 'choice',
            ))
            ->add('endDate', DateType::class, array(
                'widget' => 'choice',
            ))
            ->add('type',           ChoiceType::class, array(
                'choices'  => Tournament::getTypeList(),
                'choice_label' => function ($value, $key, $index) {
                    return $value;
                },
            ))
            ->add('organizer')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tournament::class,
        ]);
    }
}
