<?php

namespace Xm\MainBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LoginType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('username','text' ,array('label' => 'Pseudonyme') )
        ->add('password','password',array('label' => 'Mot de passe') )
        ->add('remember_me', 'checkbox' ,array('label' => 'Se souvenir de moi') )
        ->add('submit', 'submit' ,array('label' => 'Connexion',
                                         'attr'  => array('class' => 'btn-primary')
                                        )

             ); // new form
        
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
         'csrf_field_name' => '_csrf_token',
         'intention' => 'authenticate',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    { 
        return 'login';
    }
}
