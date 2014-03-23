<?php

namespace ABC\RatingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RatingController extends Controller
{
    public function indexAction()
    {
        return $this->render('ABCRatingBundle:Rating:index.html.twig');
    }
    
    public function rateAction($appId)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $applicant = $em->getRepository('ABCRatingBundle: Applicant')->find($appId);
        
        if(!$applicant) {
            throw $this->createNotFoundException('Unable to find the Application Form');
        }
        return $this->render('ABCRatingBundle:Rating:rate.html.twig',array(
            'applicant'=>$applicant));
    }
    
}
