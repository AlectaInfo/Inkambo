<?php

namespace ABC\Admin\ResourceAdminBundle\Controller;

use ABC\Admin\ResourceAdminBundle\Entity\Session;
use ABC\Admin\ResourceAdminBundle\Form\SessionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

class SessionController extends Controller
{
     /**
     * Lists all Session entities.
     
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        

        $entities = $em->getRepository('ABCAdminResourceAdminBundle:Session')->findAll();
        $count = count($entities);
        //$test=array_multisort($entities);
        return $this->render('ABCAdminResourceAdminBundle:Session:showAll.html.twig', array(
            'entities' => $entities,'total'=>$count
        ));
    }
    /**
     * Creates a new Session entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Session();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('session_showAll'));
        }

        return $this->render('ABCAdminResourceAdminBundle:Session:add.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    
 

    /**
    * Creates a form to create a Session entity.
    *
    * @param Session $entity The entity
    *
    * @return Form The form
    */
    private function createCreateForm(Session $entity)
    {
        $form = $this->createForm(new SessionType, $entity, array(
            'action' => $this->generateUrl('session_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }
        
    /**
     * Displays a form to create a new Session entity.
     *
     */
    public function newAction()
    {
        $entity = new Session();
        $form   = $this->createCreateForm($entity);

        return $this->render('ABCAdminResourceAdminBundle:Session:add.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Session entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCAdminResourceAdminBundle:Session')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Session entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ABCAdminResourceAdminBundle:Session:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Session entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCAdminResourceAdminBundle:Session')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Session entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ABCAdminResourceAdminBundle:Session:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Session entity.
    *
    * @param Session $entity The entity
    *
    * @return Form The form
    */
    private function createEditForm(Session $entity)
    {
        $form = $this->createForm(new SessionType(), $entity, array(
            'action' => $this->generateUrl('session_update', array('id' => $entity->getName())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Session entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ABCAdminResourceAdminBundle:Session')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Session entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('session_edit', array('id' => $id)));
        }

        return $this->render('ABCAdminResourceAdminBundle:Session:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Session entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        if($request->getMethod()== 'POST'){
            $sessionId = $request->get('sessionId');
            
              $em = $this->getDoctrine()->getEntityManager();
              $repo = $em->getRepository('ABCAdminResourceAdminBundle:Session');
              $entityArr = $repo->findBy(array('sessionId'=>$sessionId));
              
              if(count($entityArr)==0){
                  return $this->createNotFoundException("NO Session as such");
              }
              $entity = $entityArr[0];
              $em->remove($entity);
              $em->flush();
         }
        return $this->redirect($this->generateUrl('session_showAll'));
    }

    /**
     * Creates a form to delete a Session entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('session_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
