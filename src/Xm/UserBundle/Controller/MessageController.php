<?php

namespace Xm\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


use Xm\UserBundle\Entity\Message;
use Xm\UserBundle\Entity\MessageRepository;
use Xm\UserBundle\Form\MessageType;

/**
 * Message controller.
 *
 */
class MessageController extends Controller
{

    /**
     * Lists all Message entities.
     *
     */
    public function indexAction()
    {
        $user=$this->get('security.context')->getToken()->getUser();  
        $em = $this->getDoctrine()->getManager();
        
        $outbox = $em->getRepository('XmUserBundle:MessageSent')->findBySender( $user->getId() );
        $inbox = $em->getRepository('XmUserBundle:MessageReceived')->findAllMessagesReceived( $user->getId() );
        
        return $this->render('XmUserBundle:Message:index.html.twig', array(
            'outbox' => $outbox,
            'inbox'  => $inbox 
        ));
    }
    /**
     * Creates a new Message entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new MessageSent();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('message_show', array('id' => $entity->getId())));
        }

        return $this->render('XmUserBundle:Message:new.html.twig');
    }

    
    /**
     * Displays a form to create a new Message entity.
     *
     */
    public function newAction()
    {
         return $this->render('XmUserBundle:Message:new.html.twig');
    }

    /**
     * Finds and displays a Message entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('XmUserBundle:Message')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Message entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('XmUserBundle:Message:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Message entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('XmUserBundle:Message')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Message entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('XmUserBundle:Message:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Message entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('XmUserBundle:Message')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Message entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('message'));
    }


}
