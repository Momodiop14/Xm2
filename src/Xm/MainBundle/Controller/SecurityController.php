<?php
namespace Xm\MainBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request ;
use Symfony\Component\Security\Core\SecurityContext;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use JMS\SecurityExtraBundle\Annotation\PreAuthorize;

class SecurityController extends Controller 
{
   /*
       @Security("!has_role('ROLE_MEMBRE')")
     * @PreAuthorize("!isAuthenticated()") 
   */   
   public function loginAction(Request $request)
     {
       $authenticationUtils = $this->get('security.authentication_utils');

       // get the login error if there is one
       $error = $authenticationUtils->getLastAuthenticationError();
       
       // last username entered by the user
      $lastUsername = $authenticationUtils->getLastUsername();

      return $this->render(
        'XmMainBundle:Default:index.html.twig',
        array(
            // last username entered by the user
            'last_username' => $lastUsername,
            'error'         => $error,
            'intention'        =>'login'
         )
       );
     }

     public function resetAction($value='')
     {
       # code...
     }

 
   
   

}