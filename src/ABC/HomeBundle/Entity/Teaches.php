<?php

namespace ABC\HomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Teaches
 */
class Teaches
{
    /**
     * @var \ABC\HomeBundle\Entity\Resourceperson
     */
    private $rp;

    /**
     * @var \ABC\HomeBundle\Entity\Session
     */
    private $session;

    /**
     * @var \ABC\HomeBundle\Entity\Course
     */
    private $course;


    /**
     * Set rp
     *
     * @param \ABC\HomeBundle\Entity\Resourceperson $rp
     * @return Teaches
     */
    public function setRp(\ABC\HomeBundle\Entity\Resourceperson $rp)
    {
        $this->rp = $rp;

        return $this;
    }

    /**
     * Get rp
     *
     * @return \ABC\HomeBundle\Entity\Resourceperson 
     */
    public function getRp()
    {
        return $this->rp;
    }

    /**
     * Set session
     *
     * @param \ABC\HomeBundle\Entity\Session $session
     * @return Teaches
     */
    public function setSession(\ABC\HomeBundle\Entity\Session $session)
    {
        $this->session = $session;

        return $this;
    }

    /**
     * Get session
     *
     * @return \ABC\HomeBundle\Entity\Session 
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * Set course
     *
     * @param \ABC\HomeBundle\Entity\Course $course
     * @return Teaches
     */
    public function setCourse(\ABC\HomeBundle\Entity\Course $course = null)
    {
        $this->course = $course;

        return $this;
    }

    /**
     * Get course
     *
     * @return \ABC\HomeBundle\Entity\Course 
     */
    public function getCourse()
    {
        return $this->course;
    }
}
