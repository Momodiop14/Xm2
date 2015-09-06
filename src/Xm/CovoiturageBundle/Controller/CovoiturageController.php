<?php

namespace Xm\CovoiturageBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Xm\CovoiturageBundle\Entity\Covoiturage;
use Xm\CovoiturageBundle\Form\CovoiturageType;

/**
 * Covoiturage controller.
 *
 * @Route("/")
 */
class CovoiturageController extends Controller
{

    /**
     * Lists all Covoiturage entities.
     *
     * @Route("/", name="")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('XmCovoiturageBundle:Covoiturage')->findAll();

        return array(
            'entities' => $entities,
        );
    }

     /**
     * Displays a form to create a new Covoiturage entity.
     *
     * @Route("/nouveau/initialiser", name="_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Covoiturage();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Validates the first step of the new Covoiturage entity creation .
     *
     * @Route("/firstValidation", name="_validate_first_step")
     * @Method("POST")
     * @Template("XmCovoiturageBundle:Covoiturage:new.html.twig")
     */
    public function firstStepAction(Request $request)
    {
        $entity = new Covoiturage();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
       

              //getting the post variables 
            $postParams = $request->request;
            
            //getting the session
            $session = $this->getRequest()->getSession();
            
            //storing valid values in session
            $session->set('postDataFirstStep' ,$postParams);
            $session->set('entityFirstStep' ,$entity);
            $session->set('$formFirstStep', $form->createView());
       
            return $this->forward( 'XmCovoiturageBundle:Covoiturage:finalize');


                                 
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

     /**
     * Displays a form to create a new Covoiturage entity.
     *
     * @Route("/nouveau/finaliser", name="_finalize")
     * @Method("GET")
     * @Template()
     */
     public function finalizeAction()
      {
        return array(
            
            'data' => $this->getRequest()->getSession()->get('postDataFirstStep')
        
        );
      }
      
       /**
     * Creates a new Covoiturage entity.
     *
     * @Route("/create", name="_create")
     * @Method("POST")
     * @Template("XmCovoiturageBundle:Covoiturage:finalStep.html.twig")
     */
      public function createAction(Request $request)
      {
         
            // $em = $this->getDoctrine()->getManager();
            // $em->persist($entity);
            // $em->flush();

      }


    /**
     * Creates a form to create a Covoiturage entity.
     *
     * @param Covoiturage $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Covoiturage $entity)
    {
        $form = $this->createForm(new CovoiturageType(), $entity, array(
            'action' => $this->generateUrl('covoiturage_validate_first_step'),
            'method' => 'POST',
        ));

        $form->add('continuer', 'submit', array('label' => 'Prochaine étape'));


        return $form;
    }

   

    /**
     * Finds and displays a Covoiturage entity.
     *
     * @Route("/{id}", name="_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('XmCovoiturageBundle:Covoiturage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Covoiturage entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Covoiturage entity.
     *
     * @Route("/{id}/edit", name="_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('XmCovoiturageBundle:Covoiturage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Covoiturage entity.');
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
    * Creates a form to edit a Covoiturage entity.
    *
    * @param Covoiturage $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Covoiturage $entity)
    {
        $form = $this->createForm(new CovoiturageType(), $entity, array(
            'action' => $this->generateUrl('_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Covoiturage entity.
     *
     * @Route("/{id}", name="_update")
     * @Method("PUT")
     * @Template("XmCovoiturageBundle:Covoiturage:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('XmCovoiturageBundle:Covoiturage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Covoiturage entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Covoiturage entity.
     *
     * @Route("/{id}", name="_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('XmCovoiturageBundle:Covoiturage')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Covoiturage entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl(''));
    }

    /**
     * Creates a form to delete a Covoiturage entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
