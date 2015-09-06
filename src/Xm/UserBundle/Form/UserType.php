<?php

namespace Xm\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom')
            ->add('nom')
            ->add('dateNaissance' ,'date', array(  'label' => 'Date de naissance ' ,
                                                   'widget' => 'single_text',
                                                   'format' => 'dd-MM-yyyy',                                                                                                   
                                                   'attr' => array(
                                                                    'class'=>'datepicker',
                                                                  ) 

                                                )
                 )
            ->add('telephone','text',array('max_length' => 9  ,'label' => 'Téléphone') )
            ->add('localite','text',array(    'label' => 'votre localité' ,
                                             'attr' => array(
                                                             'class'=>'address' ) 
                                         )               
                 );
           
        
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Xm\UserBundle\Entity\Utilisateur'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'xm_user_registration';
    }

      public function getParent()
    {
        return 'fos_user_registration';
    }
}
