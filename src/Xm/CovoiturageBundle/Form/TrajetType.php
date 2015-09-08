<?php

namespace Xm\CovoiturageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TrajetType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
             ->add('localiteDepart','text',array(  'attr' => array(
                                                                    'placeholder'=>' point de passage',
                                                                    'class'=>'address step'
                                                                  ) 
                                                )
                  )
             // ->add('prixTrajet')
             // ->add('localiteDestination')
             // ->add('ref_coivoiturage')
             // ->add('reservations')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Xm\CovoiturageBundle\Entity\Trajet'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'xm_covoituragebundle_trajet';
    }
}
