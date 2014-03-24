<?php

namespace ABC\Admin\CourseAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SelectionController extends Controller
{
    
    
    //Show currently available sessions
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $courses = $em->getRepository('ABCAdminCourseAdminBundle:Course')->findAll();
        
        $em1 = $this->getDoctrine()->getEntityManager();
        
        foreach ($courses as $c) {
            $all[] = $em1->getRepository('ABCAdminCourseAdminBundle:Applicant')->findBy(array('course'=>$c->getCourseId()));
            $em1->flush();
            $reviewed[] = $em1->getRepository('ABCAdminCourseAdminBundle:Applicant')->findBy(array('course'=>$c->getCourseId(),'status'=>"Reviewed"), array('rating' => 'asc'));
            $em1->flush();
        }
        
        return $this->render('ABCAdminCourseAdminBundle:Selection:index.html.twig', array('courses'=>$courses, 'all'=>$all, 'reviewed'=>$reviewed));
    }
    
    //Select students according to the preferences
    public function selectAction(Request $request) {
        if($request->isMethod('POST'))
        {
            $courseId = $request->get("courseId");
            $em = $this->getDoctrine()->getEntityManager();
            $application = $em->getRepository('ABCAdminCourseAdminBundle:Applicant')->findBy(array('course'=>$courseId,'status'=>"Reviewed"), array('rating' => 'asc'));
            $em->flush();
            
            $em1 = $this->getDoctrine()->getEntityManager();
            $sessions = $em1->getRepository('ABCAdminCourseAdminBundle:Session')->findBy(array("course"=>$courseId, "year"=>2014), array('sessionId' => 'asc'));
        
            //Assumption - Maximum 2 sessions are available
            foreach ($sessions as $s) {
                $timeslot[] = $s->getTimeslot();
                $max[] = $s->getAvailable();
            }
            
            $timeslot1 = $sessions->getTimeslot();
            $max1 = $sessions[0]->getAvailable();
            
            $timeslot2 = $sessions[1]->getTimeslot();
            $max2 = $sessions[1]->getAvailable();
            
            foreach ($application as $app) {
                $em2 = $this->getDoctrine()->getEntityManager();
                
                if($app->getTimeslot1() != null and $app->getTimeslot1() == $timeslot1)
                {
                    if($max1 > 0) 
                    {
                        $app->setStatus("Selected for ".$sessions[0]->getSessionId());
                        $max1--;
                        $sessions[0]->setAvailable($max1);
                    }
                    elseif($app->getTimeslot2() != null and $app->getTimeslot2() == $timeslot2)
                    {
                        if($max2>0) 
                        {
                            $app->setStatus("Selected for ".$sessions[1]->getSessionId());
                            $max2--;
                            $sessions[1]->setAvailable($max2);
                        }
                        else 
                        {
                            $app->setStatus("Ignored");
                        }                       
                    }
                }
                elseif($app->getTimeslot1() != null and $app->getTimeslot1() == $timeslot2)
                {
                    if($max2>0) 
                    {
                        $app->setStatus("Selected for ".$sessions[1]->getSessionId());
                        $max2--;
                        $sessions[1]->setAvailable($max2);
                    }
                    elseif ($app->getTimeslot2() != null and $app->getTimeslot2() == $timeslot1) 
                    {
                        if($max1>0)
                        {
                            $app->setStatus("Selected for ".$sessions[0]->getSessionId());
                            $max1--;
                            $sessions[0]->setAvailable($max1);
                        }
                        else 
                        {
                            $app->setStatus("Ignored");
                        }
                    }   
                }
            }
        }        
    }
}