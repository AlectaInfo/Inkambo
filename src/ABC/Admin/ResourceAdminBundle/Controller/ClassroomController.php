<?php

namespace ABC\Admin\ResourceAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use ABC\Admin\ResourceAdminBundle\Entity\Classroom;
use ABC\Admin\ResourceAdminBundle\Form\ClassroomType;

class ClassroomController extends Controller
{

    /**
     * Lists all Classroom entities.
     
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        

        $entities = $em->getRepository('ABCAdminResourceAdminBundle:Classroom')->findAll();
        $count = count($entities);
        //$test=array_multisort($entities);
        return $this->render('ABCAdminResourceAdminBundle:Class:showAll.html.twig', array(
            'entities' => $entities,'total'=>$count
        ));
    }
    /**
     * Creates a new Classroom entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Classroom();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('class_showAll'));
        }

        return $this->render('ABCAdminResourceAdminBundle:Class:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Classroom entity.
    *
    * @param Classroom $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Classroom $entity)
    {
        $form = $this->createForm(new ClassroomType(), $entity, array(
            'action' => $this->generateUrl('class_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Classroom entity.
     *
     */
    public function newAction()
    {
        $entity = new Classroom();
        $form   = $this->createCreateForm($entity);

        return $this->render('ABCAdminResourceAdminBundle:Class:add.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Classroom entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCAdminResourceAdminBundle:Classroom')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Classroom entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ABCAdminResourceAdminBundle:Class:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Classroom entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCAdminResourceAdminBundle:Classroom')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Classroom entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ABCAdminResourceAdminBundle:Class:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Classroom entity.
    *
    * @param Classroom $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Classroom $entity)
    {
        $form = $this->createForm(new ClassroomType(), $entity, array(
            'action' => $this->generateUrl('Classroom_update', array('id' => $entity->getName())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Classroom entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCAdminResourceAdminBundle:Classroom')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Classroom entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('class_edit', array('id' => $id)));
        }

        return $this->render('ABCAdminResourceAdminBundle:Class:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Classroom entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        if($request->getMethod()== 'POST'){
            $id = $request->get('name');
       
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ABCAdminResourceAdminBundle:Classroom')->find($id);
            
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Classroom entity.');
            }

            $em->remove($entity);
            $em->flush();              
            
        }
        return $this->redirect($this->generateUrl('class_showAll'));
    }

    /**
     * Creates a form to delete a Classroom entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Classroom_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}


