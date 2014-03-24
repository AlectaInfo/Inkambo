<?php

namespace ABC\CourseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ABC\CourseBundle\Entity\Course;
use ABC\CourseBundle\Form\CourseType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session;

class CourseUpdateController extends Controller {

    // action to render the form for adding a new course 
    public function newAction() {

        $entity = new Course();
        $form = $this->createAddForm($entity);


        return $this->render('ABCCourseBundle:updatecourse:add.html.twig', array('entity' => $entity, 'form' => $form->createView()));
    }

    // action to create a new course entity based on the form data
    public function createAction(Request $request) {
       /* $key = '_security.' . $providerKey . '.target_path';
        $session = $this->getRequest()->getSession();
*/
        // get the URL to the last page, or fallback to the homepage

        $entity = new Course();
        $form = $this->createAddForm($entity);
        $form->handleRequest($request);
        
//        if ($session->has($key)) {
//            $url = $session->get($key);
//            $session->remove($key);
//        } else {
//            $url = $this->generateUrl('homepage');
//        }
//        return $this->redirect($url);
        if ($form->isValid()) {

            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('updatecourse_show', array('id' => $entity->getCourseId())));
        }

        return $this->render('ABCCourseBundle:updatecourse:add.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    public function editAction($id) {

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ABCCourseBundle:Course')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException("Unable to find the course");
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ABCCourseBundle:updatecourse:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getEntityManager();
        $entity = $em->getRepository('ABCCourseBundle:Course')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find the course');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('updatecourse_show', array('id' => $id)));
        }

        return $this->render('ABCCourseBundle:updatecourse_show:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('ABCCourseBundle:Course')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException("Course Cannot be found");
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('courseadmin_home'));
    }

    public function showAction($id) {

        $em = $this->getDoctrine()->getEntityManager();
        $entity = $em->getRepository('ABCCourseBundle:Course')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find the Course');
        }
        $deleteForm = $this->createDeleteForm($id);
        return $this->render('ABCCourseBundle:updatecourse:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView()
        ));
    }

    // Create Forms for each action of the CRUD

    public function createAddForm(Course $entity) {

        $form = $this->createForm(new CourseType(), $entity, array(
            'action' => $this->generateUrl('updatecourse_create'),
            'method' => 'POST'
        ));

        $form->add('Add', 'submit');
        //    $form->add('Add ', 'submit', array('attr'=> array('action' => $this->generateUrl("course_homepage"),'label' => 'add new department')));

        return $form;
    }

    public function createEditForm(Course $entity) {

        $form = $this->createForm(new CourseType(), $entity, array(
            'action' => $this->generateUrl('updatecourse_update', array('id' => $entity->getCourseId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    public function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('updatecourse_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm();
    }

}
