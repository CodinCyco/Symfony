<?php

namespace Operateur\TelecomBundle\Form;

use function Sodium\add;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AbonnesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('cin',IntegerType::class,array('attr'=>array('class'=>'form-control','style'=>'margin-bottom:15px')))
                ->add('nom',TextType::class,array('attr'=>array('class'=>'form-control','style'=>'margin-bottom:15px')))
                ->add('prenom',TextType::class,array('attr'=>array('class'=>'form-control','style'=>'margin-bottom:15px')))
                ->add('dateNaissance',DateType::class,array('attr'=>array('class'=>'form-control','style'=>'margin-bottom:15px')))
                ->add('Ajouter',SubmitType::class,array('label'=>'Save','attr'=>array('class'=>'btn btn-success','style'=>'margin-bottom:15px')))
                ->getForm();
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Operateur\TelecomBundle\Entity\Abonnes'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'operateur_telecombundle_abonnes';
    }


}
