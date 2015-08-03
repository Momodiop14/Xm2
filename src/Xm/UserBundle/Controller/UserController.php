<?php

namespace Xm\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\User\UserInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use Xm\UserBundle\Entity\User;
use Xm\UserBundle\Entity\UserRepository;
use Xm\UserBundle\Form\UserType;

/**
 * User controller.
 *
 */
class UserController extends Controller
{

     

      
     /**
    * Creates a form to edit a User entity.
    *
    * @param User $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(User $entity)
    {
        $form = $this->createForm(new UserType(), $entity, array(
            'action' => $this->generateUrl('utilisateur_update', array('username' => $entity->getUsername() ) ),
            'method' => 'PUT',
        ));
 
        
        $form->add('submit', 'submit', array(  'label' => 'Confirmer mise à jour' ,
                                               'attr'  => array('class' => 'btn btn-warning')
                                             
                                            )

                 );

        return $form;
    }

        

    /**
     * Finds and displays a User entity.
     *
     */
    public function showAction($username)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('XmUserBundle:User')->findOneByUsername($username);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }
         
         
        return $this->render('XmUserBundle:User:show.html.twig', array(
            'entity'      => $entity,
          
             
        ));
    }

    /**
    * Displays a form to edit an existing User entity.
    *
    * 
    */
    
    public function editAction($username)
    {
        $em = $this->getDoctrine()->getManager();
        
        $entity= new User();
        $entity = $em->getRepository('XmUserBundle:User')->findOneByUsername($username);
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $user = new User();
        $user = $this->get('security.context')->getToken()->getUser() ;
        if( $entity->isAuthor($user ) )
           {
             $editForm = $this->createEditForm($entity);
             return $this->render('XmUserBundle:User:edit.html.twig', array(
             'entity'      => $entity,
             'edit_form'   => $editForm->createView(),
            
             ));

           }
       
               
      return $this->redirect($this->generateUrl('utilisateur_show', array('username' => $username)));
       
    }

    /**
     * Edits an existing User entity.
     *
     */
    public function updateAction(Request $request, $username)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('XmUserBundle:User')->findOneByUsername($username);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) 
        {
             $em->flush();

             return $this->redirect($this->generateUrl('utilisateur_show', array('username' => $username)));
        }

        return $this->render('XmUserBundle:User:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            
        ));
    }
    /**
     * Deletes a User entity.
     *
     *
    * @Route("/{username}/descativation", name="utilisateur_delete")
    * @Security("entity.isAuthor(user)")
    */
    
    public function deleteAction(Request $request, $username)
    {
        
        $form->handleRequest($request);

        if ($form->isValid()) 
        {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('XmUserBundle:User')->findOneByUsername($username);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find User entity.');
            }

            $entity->setEtatCompte(0);//disactive account
            $em->flush();
        }

        return $this->redirect($this->generateUrl('logout'));
    }


    

     


    
}
