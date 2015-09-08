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
             ->add('trajetSimple' ,'checkbox', array('required' => false ,'label' => 'Trajet Aller/Retour') )
                
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
             ->add('dateDepart','datetime', array(  
                                                    'label' => 'date de départ',
                                                      'date_widget' => 'single_text',
                                                      'date_format' => 'dd-MM-yyyy',  
                                                       'minutes' => array(00,10,20,30,40,50),
                                                      
                                                      
                                                      'attr' => array(
                                                                  'class'=>'form_date' ,
                                                                 
                                                                 ) 
                                         )
                  )
             ->add('dateRetour','datetime', array(     
                                                     'label' => 'date de retour',
                                                     'date_widget' => 'single_text',
                                                     'date_format' => 'dd-MM-yyyy',  
                                                      'minutes' => array(00,10,20,30,40,50),
                                                     'required' => false,
                                                      
                                                      'attr' => array(
                                                                   'class'=>'form_date' ,
                                                                 
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
