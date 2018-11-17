<?php

namespace App\Form;

use App\Entity\Participant;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParticipantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category')
        ;

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event){
                // this would be your entity, i.e. SportMeetup
                $data = $event->getData();
                $form = $event->getForm();

                if(!empty($data->getId()))
                {
                    $form 
                        ->add('numberOfX')
                        ->add('numberOfTen')
                        ->add('numberOfNine')
                        ->add('points')
                        ->add('isForfeited')
                    ;
                }
            }
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Participant::class,
            
            // Configure your form options here
        ]);
    }
}
