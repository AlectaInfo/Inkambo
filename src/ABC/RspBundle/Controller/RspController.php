<?php

namespace ABC\RspBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ABC\RspBundle\Entity\Resourceperson;
use ABC\RspBundle\Form\ResourcepersonType;
use Symfony\Component\HttpFoundation\Request;

class RspController extends Controller
{
   // creates a form to be rendered to add Rsp
    public function createAddForm(Resourceperson $entity){
       
        $form = $this->createForm(new ResourcepersonType(),$entity,array(
           'action' => $this->generateUrl('rsp_create'),
            'method'=> 'POST'
        ));
        
       
        $form->add('Add','submit',array(
            //'attr'=>array('onClick'=>'return checksubmit(this)')
        ));
        return $form;
    }
    
     // action to render the form for adding a new resource person 
    public function newAction(){
            
        $entity = new Resourceperson();
        $form = $this->createAddForm($entity);

        
        return $this->render('ABCRspBundle:rsp:add.html.twig',array('entity'=>$entity,'form'=> $form->createView()));
    }
    
    // action to create a new resource person entity based on the form data
    public function createAction(Request $request){
           
        $entity = new Resourceperson();
        $form = $this->createAddForm($entity);
        $form->handleRequest($request);
        
        if($form->isValid()){
            
            $em = $this->getDoctrine()->getEntityManager();
            $dept = $entity->getDeptName();
            $courses = $em->getRepository('ABCRspBundle:Course')->findBy(array('deptName'=>$dept));
            
            $em->persist($entity);
            $em->flush();
            
            $request->getSession()
                     ->getFlashBag()
                    ->add('success', 'Registration went super smooth!');
                            
            // modify here to display the list of courses in the given department to be assigned into takes
            
            return $this->redirect($this->generateUrl('rsp_show',array('id'=>$entity->getRpId(),'courses'=> null)));
            
        }
        
        return $this->render('ABCRspBundle:rsp:add.html.twig',array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    
    // Editting a resourceperson Entity
     public function createEditForm(Resourceperson $entity){
        
        $form = $this->createForm(new ResourcepersonType(), $entity, array(
            'action' => $this->generateUrl('rsp_update', array('id' => $entity->getRpId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update','attr'=> array(
            'class'=>'btn btn primary'
        )));

        return $form;
    }
    
      public function editAction($id){
        
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ABCRspBundle:Resourceperson')->find($id);
        
        if(!$entity){
            throw $this->createNotFoundException("Unable to find the Resource Person");
        }
        
        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);
        
        return $this->render('ABCRspBundle:rsp:edit.html.twig',array(
              'entity' => $entity,
              'edit_form'=> $editForm->createView(),
              'delete_form' => $deleteForm->createView(),  
        ));   
    }
    
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $entity = $em->getRepository('ABCRspBundle:Resourceperson')->find($id);
        
        if(!$entity){
            throw $this->createNotFoundException('Unable to find the Resource Person');
        }
        
        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('rsp_show', array('id' => $id)));
        }

        return $this->render('ABCRspBundle:rsp:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    
    // delete a resource person
     public function createDeleteForm($id){
        return $this->createFormBuilder()
                    ->setAction($this->generateUrl('rsp_delete',array('id'=>$id)))
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
            $entity = $em->getRepository('ABCRspBundle:Resourceperson')->find($id);
            
            if(!$entity){
                throw $this->createNotFoundException("Resource Person Cannot be Found");
            }
            
            $em->remove($entity);
            $em->flush();
        }
        
        return $this->redirect($this->generateUrl('rsp'));
    }
    
    //show actions
     public function showAction($id){
        
        $em = $this->getDoctrine()->getEntityManager();
        $entity = $em->getRepository('ABCRspBundle:Resourceperson')->find($id);
        // place the code to find courses here 
        
        if(!$entity){
            throw $this->createNotFoundException('Unable to find the Resource Person');
        }
        $deleteForm = $this->createDeleteForm($id);
        return $this->render('ABCRspBundle:rsp:show.html.twig',array(
            'entity'=>$entity,
            'delete_form' => $deleteForm->createView(),
            
                ));
    }
    
    public function showAllAction(){
         $em = $this->getDoctrine()->getManager();
         $entites = $em->getRepository('ABCRspBundle:Resourceperson')->findAll();
         
         if(!$entites){
               throw $this->createNotFoundException("NO entities to be shown");
         }
         
         return $this->render('ABCRspBundle:rsp:showAll.html.twig',array("entities"=>$entites));
                 
        
    }
}
