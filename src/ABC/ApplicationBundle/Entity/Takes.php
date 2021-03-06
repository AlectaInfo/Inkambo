<?php

namespace ABC\ApplicationBundle\Entity;

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
     * @var \ABC\ApplicationBundle\Entity\Session
     */
    private $session;

    /**
     * @var \ABC\ApplicationBundle\Entity\Course
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
     * @param \ABC\ApplicationBundle\Entity\Session $session
     * @return Takes
     */
    public function setSession(\ABC\ApplicationBundle\Entity\Session $session)
    {
        $this->session = $session;

        return $this;
    }

    /**
     * Get session
     *
     * @return \ABC\ApplicationBundle\Entity\Session 
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * Set course
     *
     * @param \ABC\ApplicationBundle\Entity\Course $course
     * @return Takes
     */
    public function setCourse(\ABC\ApplicationBundle\Entity\Course $course = null)
    {
        $this->course = $course;

        return $this;
    }

    /**
     * Get course
     *
     * @return \ABC\ApplicationBundle\Entity\Course 
     */
    public function getCourse()
    {
        return $this->course;
    }
}
