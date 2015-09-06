<?php

namespace Xm\UserBundle\Listener;

use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Nc\FayeClient\Client ;
use Nc\FayeClient\Adapter\CurlAdapter;

class LoginListener
{
   private $faye_service;

   function __construct() 
     {
       $adapter = new CurlAdapter();

       $client = new Client($adapter, 'http://localhost/repertoires/XarrMatt/web/app_dev.php:3000/');
     }
   public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
   {
       if ($event->getAuthenticationToken()->isAuthenticated()) 

           {

                   // getting the user logged
                   $user=$event->getAuthenticationToken()->getUser(); 
                   $username= $user->getUsername() ;           
                   // initializing the private chaine
                   $key_channel=hash("sha512", $user->getUsername());
                   $key_channel.=$user->getSalt(); 
                   $chaine = '/notification'.$key_channel;

                   $user=$event->getAuthenticationToken()->setAttribute('client_service',$this->faye_service);
                   $user=$event->getAuthenticationToken()->setAttribute('private_channel',$chaine);

                   
                   
                   //flashMessage after login success
                   $event->getRequest()->getSession()->getFlashBag()->add('loginSuccess', 'Bienvenue à NagnDem '.$username );
           }    

   }

}