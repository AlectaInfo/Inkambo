<?php

namespace ABC\RatingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RatingController extends Controller
{
    public function indexAction()
    {
        return $this->render('ABCRatingBundle:Rating:index.html.twig');
    }
    
    public function rateAction($appId)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $applicant = $em->getRepository('ABCRatingBundle:Applicant')->find($appId);
        
        if(!$applicant) {
            throw $this->createNotFoundException('Unable to find the Application Form');
        }
        
        return $this->render('ABCRatingBundle:Rating:rate.html.twig', array('applicant'=>$applicant));
    }
    
    public function updateAction(Request $request)
    {
        $rate = $request->get("c1")+$request->get("c2")+$request->get("c3")+$request->get("c4")+$request->get("c5");
        
        if($request->isMethod('POST'))
        {
            $em = $this->getDoctrine()->getEntityManager();
            $appId = (int)$request->get('appId');
            $applicant = $em->getRepository('ABCRatingBundle:Applicant')->find($appId);

            if(!$applicant) {
                throw $this->createNotFoundException('Unable to find the Application Form');
            }

            $applicant->setRating($rate);
            $applicant->setStatus("Reviewed");
            $em->persist($applicant);
            $em->flush();

            return $this->render('ABCRatingBundle:Rating:rated.html.twig', array('applicant' => $applicant));
        }           
    }
}
