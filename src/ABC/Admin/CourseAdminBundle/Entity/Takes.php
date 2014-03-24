<?php

namespace ABC\Admin\CourseAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Takes
 */
class Takes
{
    /**
     * @var integer
     */
    private $studentId;

    /**
     * @var \ABC\Admin\CourseAdminBundle\Entity\Session
     */
    private $session;

    /**
     * @var \ABC\Admin\CourseAdminBundle\Entity\Course
     */
    private $course;


    /**
     * Set studentId
     *
     * @param integer $studentId
     * @return Takes
     */
    public function setStudentId($studentId)
    {
        $this->studentId = $studentId;
    
        return $this;
    }

    /**
     * Get studentId
     *
     * @return integer 
     */
    public function getStudentId()
    {
        return $this->studentId;
    }

    /**
     * Set session
     *
     * @param \ABC\Admin\CourseAdminBundle\Entity\Session $session
     * @return Takes
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
     * @return Takes
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
