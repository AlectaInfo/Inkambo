<?php

namespace ABC\Admin\CourseAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SelectionController extends Controller
{
    
    
    //Show currently available sessions
    public function indexAction()
    {
        $stm = $this->getDoctrine()->getEntityManager()->getConnection()
                    ->prepare("SELECT DISTINCT course_id FROM applicant WHERE status = 'Pending' OR status = 'Reviewed'");
        $stm->execute();
        $courseID = $stm->fetchAll();
        
        $em = $this->getDoctrine()->getEntityManager();
               
        foreach ($courseID as $id) {
            $courses[] = $em->getRepository('ABCAdminCourseAdminBundle:Course')->find($id['course_id']);
            $em->flush();
        }
        
        $em1 = $this->getDoctrine()->getEntityManager();
        
        //If no applicants are to be assigned to any of the courses
        if(!courses){
            return $this->render('ABCAdminCourseAdminBundle:Selection:noCourses.html.twig');
        }
        
        foreach ($courses as $c) {
            $all[] = $em1->getRepository('ABCAdminCourseAdminBundle:Applicant')->findBy(array('course'=>$c->getCourseId()));
            $em1->flush();
            $reviewed[] = $em1->getRepository('ABCAdminCourseAdminBundle:Applicant')->findBy(array('course'=>$c->getCourseId(),'status'=>"Reviewed"), array('rating' => 'desc'));
            $em1->flush();
        }
        
        return $this->render('ABCAdminCourseAdminBundle:Selection:index.html.twig', array('courses'=>$courses, 'all'=>$all, 'reviewed'=>$reviewed));
    }
    
    //Select students according to the preferences
    public function selectAction(Request $request) {
//        if($request->isMethod('POST'))
//        {
            $courseId = $request->get("courseId");
            
            $em = $this->getDoctrine()->getEntityManager();
            
            $application = $em->getRepository('ABCAdminCourseAdminBundle:Applicant')->findBy(array('course'=>$courseId,'status'=>"Reviewed"), array('rating' => 'desc'));
           
            $stm = $this->getDoctrine()->getEntityManager()->getConnection()
                    ->prepare("SELECT session_id FROM session WHERE course_id = '".$courseId."' AND year = 2014");
            $stm->execute();
            $sessions = $stm->fetchAll();
            
            //Assumption - Maximum 2 sessions are available
            
            $em1 = $this->getDoctrine()->getEntityManager();
            $size = count($sessions);
            
            if($size > 0)
            {
                $ses1 = $em1->getRepository('ABCAdminCourseAdminBundle:Session')->findOneBy(array('sessionId'=>$sessions[0]['session_id'], 'year'=>2014));
                $em1->flush();
                $timeslot1 = $ses1->getTimeslot();
                $max1 = $ses1->getAvailable();
                //$size = 1 or 2 
            }
            if($size == 2)
            {
                $ses2 = $em1->getRepository('ABCAdminCourseAdminBundle:Session')->findOneBy(array('sessionId'=>$sessions[1]['session_id'], 'year'=>2014));
                $em1->flush();
                $timeslot2 = $ses2->getTimeslot();
                $max2 = $ses2->getAvailable();
                //$size = 2
            }
            
            foreach ($application as $app) {
                
                $em2 = $this->getDoctrine()->getEntityManager();
                $em3 = $this->getDoctrine()->getEntityManager();
                
                if($size > 0) {
                    if($size == 1) {
                        if($app->getTimeslot1() == $timeslot1) {
                            if($max1>0) {
                                $app->setStatus("Selected ".$ses1->getSessionId());
                                $max1--;
                                $ses1->setAvailable($max1);
                                $em3->persist($ses1);
                                $em3->flush();
                            }
                            else {
                                $app->setStatus("Ignored");
                            }
                        }
                    }
                    else {
                        if($app->getTimeslot1() == $timeslot1) {
                            if($max1>0) {
                                $app->setStatus("Selected ".$ses1->getSessionId());
                                $max1--;
                                $ses1->setAvailable($max1);
                                $em3->persist($ses1);
                                $em3->flush();
                            }
                            elseif($app->getTimeslot2() == $timeslot2) {
                                if($max2>0) {
                                $app->setStatus("Selected ".$ses2->getSessionId());
                                $max2--;
                                $ses2->setAvailable($max2);
                                $em3->persist($ses1);
                                $em3->flush();
                                }
                                else {
                                    $app->setStatus("Ignored");
                                }
                            }
                        }
                        elseif($app->getTimeslot1() == $timeslot2) {
                            if($max2>0) {
                                $app->setStatus("Selected ".$ses2->getSessionId());
                                $max2--;
                                $ses2->setAvailable($max2);
                                $em3->persist($ses1);
                                $em3->flush();
                            }
                            elseif($app->getTimeslot2() == $timeslot1) {
                                if($max1>0) {
                                    $app->setStatus("Selected ".$ses1->getSessionId());
                                    $max1--;
                                    $ses1->setAvailable($max1);
                                    $em3->persist($ses1);
                                    $em3->flush();
                                }
                            }
                        }
                    }
                }
                else {
                    $app->setStatus("Ignored");
                } 
                $em2->persist($app);
                $em2->flush();
            }
//        }
        return $this->redirect('ABCAdminCourseAdminBundle:Selection:index');
    }
}