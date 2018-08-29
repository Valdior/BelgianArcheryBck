<?php

namespace App\Form;

use App\Entity\Peloton;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PelotonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('maxParticipant')
            ->add('type',           ChoiceType::class, array(
                'choices'  => Peloton::getTypeList(),
                'choice_label' => function ($value, $key, $index) {
                    return $value;
                },
            ))
            ->add('startTime')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Peloton::class,
        ]);
    }
}
