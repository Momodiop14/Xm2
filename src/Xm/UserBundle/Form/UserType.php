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
            ->add('username','text' ,array(   'label' => 'Pseudonyme') )
            ->add('password','password',array('label' => 'Mot de passe') )
            ->add('prenom')
            ->add('nom')
            ->add('dateNaissance' ,'date', array(  'label' => 'Date de naissance ' , 
                                                   'widget' => 'single_text',
                                                                                                    
                                                   'attr' => array(
                                                                    'class'=>'datepicker',
                                                                  ) 

                                                )
                 )
            ->add('email','email')
            ->add('telephone','text',array('max_length' => 9  ,'label' => 'Téléphone') )
            ->add('localite','text',array(    'label' => 'votre localité' ,
                                             'attr' => array(
                                                             'id'=>'where' ) 
                                         )               
                 );
           
        
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Xm\UserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'xm_userbundle_user';
    }
}
