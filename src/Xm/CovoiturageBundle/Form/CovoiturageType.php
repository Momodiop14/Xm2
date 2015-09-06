<?php

namespace Xm\CovoiturageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CovoiturageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
             ->add('trajetSimple' ,'checkbox', array('required' => false) )
                
             ->add('addressDepart','text', array(       'label' => 'ville de départ',
                                                 'attr' => array(
                                                                  'class'=>'address' 
                                                                 ) 
                                         ) 
                  )
             ->add('addressRetour','text',array(       'label' => 'ville de destination' ,
                                                'attr' => array(
                                                                 'class'=>'address' 
                                                             ) 
                                         ) 
                  )
             ->add('trajets', 'collection', array(
                        'type' => new TrajetType(),
                        'allow_add' => true,
                        'allow_delete' => true,
                        'by_reference' => false,
                        'label' => 'Villes de passage'
                 ))
             ->add('dateDepart','date', array(       'label' => 'date de départ',
                                                     'widget' => 'single_text',
                                                     'format' => 'dd-MM-yyyy',  
                                                      'attr' => array(
                                                                  'class'=>'datepicker' 
                                                                 ) 
                                         )
                  )
             ->add('dateRetour','date', array(       'label' => 'date de retour',
                                                     'widget' => 'single_text',
                                                     'format' => 'dd-MM-yyyy',  
                                                      'attr' => array(
                                                                  'class'=>'datepicker' 
                                                                 ) 
                                         )
                  )
             ->add('heureDepart','time', array(     
                                                     'label' => 'heure de départ',
                                                     'widget' => 'single_text'
                                                    
                                         ))
             ->add('heureRetour','time', array(       'label' => 'heure départ',
                                                     'widget' => 'single_text'
                                                     
                                         ))
            
             ->add('resume','textarea', array(   
                                                 'required' => false,
                                                 'attr' => array(
                                                                  'placeholder'=>"Veuillez saisir en quelques phrases les details du voyage comme la taille des bagages que les passagers peuvent amener ,l'acceptation de retard ."
                                                                 ) 
                                         )
                 )

            
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Xm\CovoiturageBundle\Entity\Covoiturage',
            'validation_groups' => array('basics'),
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'form_covoiturage';
    }
}
