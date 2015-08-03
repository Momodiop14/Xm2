<?php

namespace Xm\CovoiturageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('XmCovoiturageBundle:Default:index.html.twig', array('name' => $name));
    }
}
