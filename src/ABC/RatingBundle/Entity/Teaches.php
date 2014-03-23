<?php

namespace ABC\RatingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Teaches
 */
class Teaches
{
    /**
     * @var \ABC\RatingBundle\Entity\Resourceperson
     */
    private $rp;

    /**
     * @var \ABC\RatingBundle\Entity\Session
     */
    private $session;

    /**
     * @var \ABC\RatingBundle\Entity\Course
     */
    private $course;


    /**
     * Set rp
     *
     * @param \ABC\RatingBundle\Entity\Resourceperson $rp
     * @return Teaches
     */
    public function setRp(\ABC\RatingBundle\Entity\Resourceperson $rp)
    {
        $this->rp = $rp;

        return $this;
    }

    /**
     * Get rp
     *
     * @return \ABC\RatingBundle\Entity\Resourceperson 
     */
    public function getRp()
    {
        return $this->rp;
    }

    /**
     * Set session
     *
     * @param \ABC\RatingBundle\Entity\Session $session
     * @return Teaches
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
     * @return Teaches
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
