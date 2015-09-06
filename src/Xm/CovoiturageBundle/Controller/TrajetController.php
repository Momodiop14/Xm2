<?php

namespace Xm\CovoiturageBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Xm\CovoiturageBundle\Entity\Trajet;
use Xm\CovoiturageBundle\Form\TrajetType;

/**
 * Trajet controller.
 *
 * @Route("/trajet")
 */
class TrajetController extends Controller
{

    /**
     * Lists all Trajet entities.
     *
     * @Route("/", name="trajet")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('XmCovoiturageBundle:Trajet')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Trajet entity.
     *
     * @Route("/", name="trajet_create")
     * @Method("POST")
     * @Template("XmCovoiturageBundle:Trajet:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Trajet();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('trajet_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Trajet entity.
     *
     * @param Trajet $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Trajet $entity)
    {
        $form = $this->createForm(new TrajetType(), $entity, array(
            'action' => $this->generateUrl('trajet_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Trajet entity.
     *
     * @Route("/new", name="trajet_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Trajet();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Trajet entity.
     *
     * @Route("/{id}", name="trajet_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('XmCovoiturageBundle:Trajet')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Trajet entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Trajet entity.
     *
     * @Route("/{id}/edit", name="trajet_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('XmCovoiturageBundle:Trajet')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Trajet entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Trajet entity.
    *
    * @param Trajet $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Trajet $entity)
    {
        $form = $this->createForm(new TrajetType(), $entity, array(
            'action' => $this->generateUrl('trajet_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Trajet entity.
     *
     * @Route("/{id}", name="trajet_update")
     * @Method("PUT")
     * @Template("XmCovoiturageBundle:Trajet:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('XmCovoiturageBundle:Trajet')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Trajet entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('trajet_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Trajet entity.
     *
     * @Route("/{id}", name="trajet_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('XmCovoiturageBundle:Trajet')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Trajet entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('trajet'));
    }

    /**
     * Creates a form to delete a Trajet entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('trajet_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
