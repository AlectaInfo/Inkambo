<?php

namespace ABC\RspBundle\Entity;

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
     * @var \ABC\RspBundle\Entity\Session
     */
    private $session;

    /**
     * @var \ABC\RspBundle\Entity\Course
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
     * @param \ABC\RspBundle\Entity\Session $session
     * @return Takes
     */
    public function setSession(\ABC\RspBundle\Entity\Session $session)
    {
        $this->session = $session;
    
        return $this;
    }

    /**
     * Get session
     *
     * @return \ABC\RspBundle\Entity\Session 
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * Set course
     *
     * @param \ABC\RspBundle\Entity\Course $course
     * @return Takes
     */
    public function setCourse(\ABC\RspBundle\Entity\Course $course = null)
    {
        $this->course = $course;
    
        return $this;
    }

    /**
     * Get course
     *
     * @return \ABC\RspBundle\Entity\Course 
     */
    public function getCourse()
    {
        return $this->course;
    }
}
