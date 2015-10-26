<?php

namespace Xm\UserBundle\Listener;

use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;


class LoginListener
{
   
   public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
   {
       if ($event->getAuthenticationToken()->isAuthenticated()) 

           {

                   // getting the user logged
                   $user=$event->getAuthenticationToken()->getUser(); 
                   $username= $user->getUsername() ;                       
                   
                   //flashMessage after login success
                   $event->getRequest()->getSession()->getFlashBag()->add('loginSuccess', 'Bienvenue à NagnDem '.$username );
           }    

   }

}