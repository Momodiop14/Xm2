<?php

namespace Xm\MainBundle\Controller;

    
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request ;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use JMS\SecurityExtraBundle\Annotation\PreAuthorize;

use Xm\UserBundle\Form\UserType;
use Xm\UserBundle\Entity\Utilisateur;


class DefaultController extends Controller
{
	  
       
      public function indexAction()
         {
               if($this->isGranted('ROLE_USER') )
                    {
                     
                      return $this->render('XmMainBundle:Default:index_membre.html.twig' );
                     
                    }
               
              

              return $this->render('XmMainBundle:Default:index.html.twig');
         }

     public function guideAction()
       {
        return $this->render('XmMainBundle:Default:guide.html.twig'); 
       }
           
      public function errorAction()
       {
          return $this->render('XmMainBundle:Default:error_page.html.twig');
       }



}
