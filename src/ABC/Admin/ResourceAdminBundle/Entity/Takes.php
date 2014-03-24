<?php

namespace ABC\Admin\ResourceAdminBundle\Entity;

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
     * @var \ABC\Admin\ResourceAdminBundle\Entity\Session
     */
    private $session;

    /**
     * @var \ABC\Admin\ResourceAdminBundle\Entity\Course
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
     * @param \ABC\Admin\ResourceAdminBundle\Entity\Session $session
     * @return Takes
     */
    public function setSession(\ABC\Admin\ResourceAdminBundle\Entity\Session $session)
    {
        $this->session = $session;
    
        return $this;
    }

    /**
     * Get session
     *
     * @return \ABC\Admin\ResourceAdminBundle\Entity\Session 
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * Set course
     *
     * @param \ABC\Admin\ResourceAdminBundle\Entity\Course $course
     * @return Takes
     */
    public function setCourse(\ABC\Admin\ResourceAdminBundle\Entity\Course $course = null)
    {
        $this->course = $course;
    
        return $this;
    }

    /**
     * Get course
     *
     * @return \ABC\Admin\ResourceAdminBundle\Entity\Course 
     */
    public function getCourse()
    {
        return $this->course;
    }
}
