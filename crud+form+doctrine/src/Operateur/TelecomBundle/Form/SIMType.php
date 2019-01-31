<?php

namespace Operateur\TelecomBundle\Form;

use Doctrine\DBAL\Types\FloatType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SIMType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('numAppel',IntegerType::class,array('attr'=>array('class'=>'form-control','style'=>'margin-bottom:15px')))
            ->add('solde',IntegerType::class,array('attr'=>array('class'=>'form-control','style'=>'margin-bottom:15px')))
            ->add('bonus',IntegerType::class,array('attr'=>array('class'=>'form-control','style'=>'margin-bottom:15px')))
            ->add('abonne',EntityType::class,array('attr'=>array('class'=>'form-control','style'=>'margin-bottom:15px'),
                'class'=>'OperateurTelecomBundle:Abonnes',
                'choice_label'=>'cin'

            ))
            ->add('Ajouter',SubmitType::class,array('label'=>'Ajouter','attr'=>array('class'=>'btn btn-success','style'=>'margin-bottom:15px')))

            ->getForm();

        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Operateur\TelecomBundle\Entity\SIM'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'operateur_telecombundle_sim';
    }


}
