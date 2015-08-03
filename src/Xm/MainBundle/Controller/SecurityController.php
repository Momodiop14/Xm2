<?php
namespace Xm\MainBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request ;
use Symfony\Component\Security\Core\SecurityContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SecurityController extends Controller 
{
   
   /* public function loginAction()
    {
        $request = $this->getRequest();
        $session = $request->getSession();
        $error ='les coordonnées saisies sont incorrectes ' ;
        
        // get the login error if there is one   
        if($request->)          
        
         return $this->render('XmMainBundle:Security:connexion.html.twig', array(
            // last username entered by the user
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
             'erreur' => $error 
             
            
         ));

       
    }*/

    public function loginAction(Request $request)
     {
       $authenticationUtils = $this->get('security.authentication_utils');

       // get the login error if there is one
       $error = $authenticationUtils->getLastAuthenticationError();
       
       // last username entered by the user
      $lastUsername = $authenticationUtils->getLastUsername();

      return $this->render(
        'XmMainBundle:Security:connexion.html.twig',
        array(
            // last username entered by the user
            'last_username' => $lastUsername,
            'error'         => $error,
         )
       );
     }

 
   
   

}