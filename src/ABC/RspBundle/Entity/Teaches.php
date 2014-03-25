<?php

namespace ABC\RspBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Teaches
 */
class Teaches
{
    /**
     * @var \ABC\RspBundle\Entity\Resourceperson
     */
    private $rp;

    /**
     * @var \ABC\RspBundle\Entity\Session
     */
    private $session;

    /**
     * @var \ABC\RspBundle\Entity\Course
     */
    private $course;


    /**
     * Set rp
     *
     * @param \ABC\RspBundle\Entity\Resourceperson $rp
     * @return Teaches
     */
    public function setRp(\ABC\RspBundle\Entity\Resourceperson $rp)
    {
        $this->rp = $rp;
    
        return $this;
    }

    /**
     * Get rp
     *
     * @return \ABC\RspBundle\Entity\Resourceperson 
     */
    public function getRp()
    {
        return $this->rp;
    }

    /**
     * Set session
     *
     * @param \ABC\RspBundle\Entity\Session $session
     * @return Teaches
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
     * @return Teaches
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
