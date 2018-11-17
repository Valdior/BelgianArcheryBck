<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Archer;
use App\Entity\Participant;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParticipantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        dump($options);
        $user = $options['user'];
        $roles = $user->getRoles();
        if (in_array('ROLE_ADMIN', $roles)) 
            $builder->add('archer', EntityType::class, array(
                'class' => Archer::class,
                'data' => $user->getArcher(),
            ));

        $builder
            ->add('category')
        ;

        dump($builder);

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event){
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
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'csrf_token_id'   => 'participant_item',
            'user'  => User::class
        ]);
    }
}
