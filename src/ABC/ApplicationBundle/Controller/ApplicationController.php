<?php

namespace ABC\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ABC\ApplicationBundle\Entity\Applicant;
use ABC\ApplicationBundle\Form\ApplicantType;
use Symfony\Component\HttpFoundation\Request;

class ApplicationController extends Controller
{
    public function indexAction()
    {
        return $this->render('ABCApplicationBundle:Application:index.html.twig');
    }

    public function newAction(){
            
        $applicant = new Applicant();
        $form = $this->createAddForm($applicant);
    
        return $this->render('ABCApplicationBundle:Application:add.html.twig',array('applicant'=>$applicant,'form'=> $form->createView()));
    }
    
    public function newGivenCourseAction($courseId){
        $applicant = new Applicant();
        $form = $this->createAddForm($applicant);
               
        $em1 = $this->getDoctrine()->getEntityManager();
        $course = $em1->getRepository('ABCApplicationBundle:Course')->find($courseId);
        
        $applicant->setCourse($course);
        
        if($form->isValid()){
            
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($applicant);
            $em->flush();
            
            return $this->redirect($this->generateUrl('application_show',array('id'=>$applicant->getAppId())));
        }
        
        return $this->render('ABCApplicationBundle:Application:add_course.html.twig',array(
            'applicant' => $applicant,
            'form'   => $form->createView(),
        ));
    }
    
    public function createAction(Request $request){
           
        $applicant = new Applicant();
        $form = $this->createAddForm($applicant);
        $form->handleRequest($request);
        
        if($form->isValid()){
            
            $applicant->setStatus("Pending");
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($applicant);
            $em->flush();
            
            return $this->redirect($this->generateUrl('application_show',array('id'=>$applicant->getAppId())));
        }
        
        return $this->render('ABCApplicationBundle:Application:add.html.twig',array(
            'applicant' => $applicant,
            'form'   => $form->createView(),
        ));
    }
    
    public function createAddForm(Applicant $applicant){
        
        $form = $this->createForm(new ApplicantType(),$applicant,array(
           'action' => $this->generateUrl('application_create'),
           'method'=> 'POST'
        ));
        
        $form->add('Apply Now','submit');
        
        return $form;
    }
    
    public function createEditForm(Applicant $applicant){
        
        $form = $this->createForm(new ApplicantType(), $applicant, array(
            'action' => $this->generateUrl('application_update', array('id' => $applicant->getAppId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    
    public function showAction($id){
        
        $em = $this->getDoctrine()->getEntityManager();
        $applicant = $em->getRepository('ABCApplicationBundle:Applicant')->find($id);
        
        if(!$applicant){
            throw $this->createNotFoundException('Unable to find the Application Form');
        }
        return $this->render('ABCApplicationBundle:Application:show.html.twig',array(
            'applicant'=>$applicant   
                ));
    }
  
    public function createDeleteForm($id){
        return $this->createFormBuilder()
                    ->setAction($this->generateUrl('application_delete',array('id'=>$id)))
                    ->setMethod('DELETE')
                    ->add('submit','submit',array('label'=>'Delete'))
                    ->getForm()
                ;
    }
    
    public function deleteAction(Request $request,$id){
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);
        
        if($form->isValid()){
            $em = $this->getDoctrine()->getEntityManager();
            $applicant = $em->getRepository('ABCApplicationBundle:Applicant')->find($id);
            
            if(!$applicant){
                throw $this->createNotFoundException("Application Form Cannot be Found");
            }
            
            $em->remove($applicant);
            $em->flush();
        }
        
        return $this->redirect($this->generateUrl('application'));
    }
    
    public function editAction($id){
        
        $em = $this->getDoctrine()->getManager();
        $applicant = $em->getRepository('ABCApplicationBundle:Applicant')->find($id);
        
        if(!$applicant){
            throw $this->createNotFoundException("Unable to find the Application Form");
        }
        
        $editForm = $this->createEditForm($applicant);
        $deleteForm = $this->createDeleteForm($id);
        
        return $this->render('ABCApplicationBundle:Application:edit.html.twig',array(
              'applicant' => $applicant,
              'edit_form'=> $editForm->createView(),
              'delete_form' => $deleteForm->createView(),  
        ));   
    }
    
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $applicant = $em->getRepository('ABCApplicationBundle:Applicant')->find($id);
        
        if(!$applicant){
            throw $this->createNotFoundException('Unable to find the Application Form');
        }
        
        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($applicant);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('application_show', array('id' => $id)));
        }

        return $this->render('ABCApplicationBundle:Course:edit.html.twig', array(
            'applicant'      => $applicant,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    
}
