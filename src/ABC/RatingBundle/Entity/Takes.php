<?php

namespace ABC\RatingBundle\Entity;

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
     * @var \ABC\RatingBundle\Entity\Session
     */
    private $session;

    /**
     * @var \ABC\RatingBundle\Entity\Course
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
     * @param \ABC\RatingBundle\Entity\Session $session
     * @return Takes
     */
    public function setSession(\ABC\RatingBundle\Entity\Session $session)
    {
        $this->session = $session;

        return $this;
    }

    /**
     * Get session
     *
     * @return \ABC\RatingBundle\Entity\Session 
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * Set course
     *
     * @param \ABC\RatingBundle\Entity\Course $course
     * @return Takes
     */
    public function setCourse(\ABC\RatingBundle\Entity\Course $course = null)
    {
        $this->course = $course;

        return $this;
    }

    /**
     * Get course
     *
     * @return \ABC\RatingBundle\Entity\Course 
     */
    public function getCourse()
    {
        return $this->course;
    }
}
