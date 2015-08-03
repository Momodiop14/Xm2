<?php

namespace Xm\MainBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request ;
use Symfony\Component\Security\Core\SecurityContext;

use Xm\UserBundle\Form\UserType;
use Xm\UserBundle\Entity\User;

class DefaultController extends Controller
{
	 
    

    public function indexAction()
     {
       //  if ($this->get('security.context')->isGranted('ROLE_USER'))
         //    return $this->render('XmMainBundle:Default:index_memb.html.twig');
         
         return $this->render('XmMainBundle:Default:index.html.twig');
     }

     public function guideAction()
     {
        return $this->render('XmMainBundle:Default:guide.html.twig'); 
     }
      
     /**
     * Creates a form to authentificate an User .
     */
     private function createLoginForm()
      {
         $form = $this->get('form.factory')
                ->createNamed('', new LoginType(), array(
                       'action' => $this->generateUrl('xm_main_validation_connexion'),
                       'method' => 'POST'
                ));

        return $form;
    }

     
     /**
     * Displays a form to create a new User entity.
     *
     */
    public function newAction()
    {
        $entity = new User();
        $form   = $this->createCreateForm($entity);
        
        return $this->render('XmMainBundle:Default:inscription.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

     /**
     * Creates a form to create a User entity.
     *
     * @param User $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(User $entity)
    {
        $form = $this->createForm(new UserType(), $entity, array(
            'action' => $this->generateUrl('utilisateur_create'),
            'method' => 'POST',
        ));
        
         $form->add('submit', 'submit', array('label' => 'Créer votre compte',
                                              'attr'  => array('class' => 'btn-primary')
                                             
                                          ) 
                 );

        return $form;
    }


     /**
     * Creates a new User entity.
     *
     */
    public function createAction(Request $request)
    {
       
        $entity = new User();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
       
        if ($form->isValid())
         {
             
             $em = $this->getDoctrine()->getManager();
            
             $factory = $this->get('security.encoder_factory');
             $encoder = $factory->getEncoder($entity);
             $password = $encoder->encodePassword($entity->getPassword(), $entity->getSalt()); //hashing the password
             $entity->setPassword($password);
             $entity=$entity->setEtatCompte(0); //enable the account state by putting 1 as value
             
             $em->persist($entity);
             $em->flush();
             
              $this->SendConfirmation( $entity );
              $this->get('session')->getFlashBag()->add(
                        'notice',
                        'Un mail de confirmation est envoyé à votre adresse mail ,si cela ne trouve pas dans la boite de reception veuillez vérifier dans les spams'
                        );
             return $this->redirect($this->generateUrl('xm_main_accueil')  );
          }

        return $this->render('XmUserBundle:Main:inscription.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    

     public function resetAction($email)
       {
         $message = \Swift_Message::newInstance()
        ->setSubject('Hello Email')
        ->setFrom('send@example.com')
        ->setTo('recipient@example.com')
        ->setBody($this->renderView('XmMainBundle:Default:email.txt.twig', array('name' => $name)))
        ;
        $this->get('mailer')->send($message);

       }
     
     public function SendConfirmation(User $user)
     {
         $message = \Swift_Message::newInstance()
        ->setSubject('Activation du compte')
        ->setFrom( array('xarrmatt@hotmail.com' => 'XarrMatt Corp') )
        ->setTo($user->getEmail() )
        ->setBody($this->renderView('XmMainBundle:Default:message_validation.html.twig', array(
            'user' => $user
                                                                                            )
                                    ) 
                  );
        
        $this->get('mailer')->send($message);

     }
     

}
