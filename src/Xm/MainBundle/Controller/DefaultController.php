<?php

namespace Xm\MainBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request ;
use Xm\MainBundle\Form\LoginType;

class DefaultController extends Controller
{
	 
     /**
     * Creates a form to create a User entity.
     */
	 private function createCreateForm()
      {
         $form = $this->get('form.factory')
 				->createNamed('', new LoginType(), array(
 				       'action' => $this->generateUrl('xm_main_validation_connexion'),
 				       'method' => 'POST'
 				));

        return $form;
    }

    public function indexAction()
     {
        return $this->render('XmMainBundle:Default:index.html.twig');
     }
  
     public function newLoginAction()
    {   
          $form   = $this->createCreateForm();       
         return $this->render('XmMainBundle:Default:connexion.html.twig', array(
		         'form' => $form->createView()
				 ));
		
   }
        

}
