<?php

namespace Xm\UserBundle\Listener;


class ChannelGenerator
{
   
   /*
       generates a channel hashed from the arguments
   */
   private function generateChannel($param,$channelName)

    {
         
          $key_channel.=hash("sha512", $user->getUsername()) ;
          $key_channel.=hash("sha512", $user->getSalt()) ; 
          
          $chaine = '/'.$channelName.$key_channel;

          return $chaine ;
    }

}



