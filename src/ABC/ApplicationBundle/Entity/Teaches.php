<?php

namespace ABC\ApplicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Teaches
 */
class Teaches
{
    /**
     * @var \ABC\ApplicationBundle\Entity\Resourceperson
     */
    private $rp;

    /**
     * @var \ABC\ApplicationBundle\Entity\Session
     */
    private $session;

    /**
     * @var \ABC\ApplicationBundle\Entity\Course
     */
    private $course;


    /**
     * Set rp
     *
     * @param \ABC\ApplicationBundle\Entity\Resourceperson $rp
     * @return Teaches
     */
    public function setRp(\ABC\ApplicationBundle\Entity\Resourceperson $rp)
    {
        $this->rp = $rp;

        return $this;
    }

    /**
     * Get rp
     *
     * @return \ABC\ApplicationBundle\Entity\Resourceperson 
     */
    public function getRp()
    {
        return $this->rp;
    }

    /**
     * Set session
     *
     * @param \ABC\ApplicationBundle\Entity\Session $session
     * @return Teaches
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
     * @return Teaches
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
