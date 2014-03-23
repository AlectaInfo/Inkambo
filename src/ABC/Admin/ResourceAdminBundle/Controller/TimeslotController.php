<?php

namespace ABC\Admin\ResourceAdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;

use ABC\Admin\ResourceAdminBundle\Entity\Timeslot;
use ABC\Admin\ResourceAdminBundle\Form\TimeslotType;

class TimeslotController extends Controller
{
     /**
     * Lists all Timeslot entities.
     
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        

        $entities = $em->getRepository('ABCAdminResourceAdminBundle:Timeslot')->findAll();
        $count = count($entities);
        //$test=array_multisort($entities);
        return $this->render('ABCAdminResourceAdminBundle:Timeslot:showAll.html.twig', array(
            'entities' => $entities,'total'=>$count
        ));
    }
    /**
     * Creates a new Timeslot entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Timeslot();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('timeslot_showAll'));
        }

        return $this->render('ABCAdminResourceAdminBundle:Timeslot:add.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Timeslot entity.
    *
    * @param Timeslot $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Timeslot $entity)
    {
        $form = $this->createForm(new TimeslotType(), $entity, array(
            'action' => $this->generateUrl('timeslot_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Timeslot entity.
     *
     */
    public function newAction()
    {
        $entity = new Timeslot();
        $form   = $this->createCreateForm($entity);

        return $this->render('ABCAdminResourceAdminBundle:Timeslot:add.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Timeslot entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCAdminResourceAdminBundle:Timeslot')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Timeslot entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ABCAdminResourceAdminBundle:Timeslot:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Timeslot entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCAdminResourceAdminBundle:Timeslot')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Timeslot entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ABCAdminResourceAdminBundle:Timeslot:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Timeslot entity.
    *
    * @param Timeslot $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Timeslot $entity)
    {
        $form = $this->createForm(new TimeslotType(), $entity, array(
            'action' => $this->generateUrl('timeslot_update', array('id' => $entity->getName())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Timeslot entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCAdminResourceAdminBundle:Timeslot')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Timeslot entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('timeslot_edit', array('id' => $id)));
        }

        return $this->render('ABCAdminResourceAdminBundle:Timeslot:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Timeslot entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        if($request->getMethod()== 'POST'){
            $id = $request->get('name');
       
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ABCAdminResourceAdminBundle:Timeslot')->find($id);
            
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Timeslot entity.');
            }

            $em->remove($entity);
            $em->flush();              
            
        }
        return $this->redirect($this->generateUrl('timeslot_showAll'));
    }

    /**
     * Creates a form to delete a Timeslot entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('timeslot_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
