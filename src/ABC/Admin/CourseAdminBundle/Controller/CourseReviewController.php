<?php

namespace ABC\Admin\CourseAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CourseReviewController extends Controller
{
    
//testing 
public function indexAction(){
    
    $em = $this->getDoctrine()->getEntityManager();
    $repo = $em->getRepository('ABCAdminCourseAdminBundle:Applicant');
    
    $count = count($repo->findAll());
            
    return $this->render('ABCAdminCourseAdminBundle:Review:Review.html.twig',array('Total'=>$count));
}


public function reviewApplication(){
    
    
}
    
    
}
