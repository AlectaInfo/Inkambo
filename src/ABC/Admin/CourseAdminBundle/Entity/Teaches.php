<?php

namespace ABC\Admin\CourseAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Teaches
 */
class Teaches
{
    /**
     * @var \ABC\Admin\CourseAdminBundle\Entity\Resourceperson
     */
    private $rp;

    /**
     * @var \ABC\Admin\CourseAdminBundle\Entity\Session
     */
    private $session;

    /**
     * @var \ABC\Admin\CourseAdminBundle\Entity\Course
     */
    private $course;


    /**
     * Set rp
     *
     * @param \ABC\Admin\CourseAdminBundle\Entity\Resourceperson $rp
     * @return Teaches
     */
    public function setRp(\ABC\Admin\CourseAdminBundle\Entity\Resourceperson $rp)
    {
        $this->rp = $rp;
    
        return $this;
    }

    /**
     * Get rp
     *
     * @return \ABC\Admin\CourseAdminBundle\Entity\Resourceperson 
     */
    public function getRp()
    {
        return $this->rp;
    }

    /**
     * Set session
     *
     * @param \ABC\Admin\CourseAdminBundle\Entity\Session $session
     * @return Teaches
     */
    public function setSession(\ABC\Admin\CourseAdminBundle\Entity\Session $session)
    {
        $this->session = $session;
    
        return $this;
    }

    /**
     * Get session
     *
     * @return \ABC\Admin\CourseAdminBundle\Entity\Session 
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * Set course
     *
     * @param \ABC\Admin\CourseAdminBundle\Entity\Course $course
     * @return Teaches
     */
    public function setCourse(\ABC\Admin\CourseAdminBundle\Entity\Course $course = null)
    {
        $this->course = $course;
    
        return $this;
    }

    /**
     * Get course
     *
     * @return \ABC\Admin\CourseAdminBundle\Entity\Course 
     */
    public function getCourse()
    {
        return $this->course;
    }
}
