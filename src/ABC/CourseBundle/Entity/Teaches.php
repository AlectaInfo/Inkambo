<?php

namespace ABC\CourseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Teaches
 */
class Teaches
{
    /**
     * @var \ABC\CourseBundle\Entity\Resourceperson
     */
    private $rp;

    /**
     * @var \ABC\CourseBundle\Entity\Session
     */
    private $session;

    /**
     * @var \ABC\CourseBundle\Entity\Course
     */
    private $course;


    /**
     * Set rp
     *
     * @param \ABC\CourseBundle\Entity\Resourceperson $rp
     * @return Teaches
     */
    public function setRp(\ABC\CourseBundle\Entity\Resourceperson $rp)
    {
        $this->rp = $rp;

        return $this;
    }

    /**
     * Get rp
     *
     * @return \ABC\CourseBundle\Entity\Resourceperson 
     */
    public function getRp()
    {
        return $this->rp;
    }

    /**
     * Set session
     *
     * @param \ABC\CourseBundle\Entity\Session $session
     * @return Teaches
     */
    public function setSession(\ABC\CourseBundle\Entity\Session $session)
    {
        $this->session = $session;

        return $this;
    }

    /**
     * Get session
     *
     * @return \ABC\CourseBundle\Entity\Session 
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * Set course
     *
     * @param \ABC\CourseBundle\Entity\Course $course
     * @return Teaches
     */
    public function setCourse(\ABC\CourseBundle\Entity\Course $course = null)
    {
        $this->course = $course;

        return $this;
    }

    /**
     * Get course
     *
     * @return \ABC\CourseBundle\Entity\Course 
     */
    public function getCourse()
    {
        return $this->course;
    }
}
