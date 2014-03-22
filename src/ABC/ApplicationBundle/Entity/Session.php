<?php

namespace ABC\ApplicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Session
 */
class Session
{
    /**
     * @var string
     */
    private $sessionId;

    /**
     * @var string
     */
    private $year;

    /**
     * @var string
     */
    private $startMonth;

    /**
     * @var \ABC\ApplicationBundle\Entity\Course
     */
    private $course;

    /**
     * @var \ABC\ApplicationBundle\Entity\Classroom
     */
    private $class;

    /**
     * @var \ABC\ApplicationBundle\Entity\Timeslot
     */
    private $timeslot;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $rp;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rp = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set sessionId
     *
     * @param string $sessionId
     * @return Session
     */
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;

        return $this;
    }

    /**
     * Get sessionId
     *
     * @return string 
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * Set year
     *
     * @param string $year
     * @return Session
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return string 
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set startMonth
     *
     * @param string $startMonth
     * @return Session
     */
    public function setStartMonth($startMonth)
    {
        $this->startMonth = $startMonth;

        return $this;
    }

    /**
     * Get startMonth
     *
     * @return string 
     */
    public function getStartMonth()
    {
        return $this->startMonth;
    }

    /**
     * Set course
     *
     * @param \ABC\ApplicationBundle\Entity\Course $course
     * @return Session
     */
    public function setCourse(\ABC\ApplicationBundle\Entity\Course $course)
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

    /**
     * Set class
     *
     * @param \ABC\ApplicationBundle\Entity\Classroom $class
     * @return Session
     */
    public function setClass(\ABC\ApplicationBundle\Entity\Classroom $class = null)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Get class
     *
     * @return \ABC\ApplicationBundle\Entity\Classroom 
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set timeslot
     *
     * @param \ABC\ApplicationBundle\Entity\Timeslot $timeslot
     * @return Session
     */
    public function setTimeslot(\ABC\ApplicationBundle\Entity\Timeslot $timeslot = null)
    {
        $this->timeslot = $timeslot;

        return $this;
    }

    /**
     * Get timeslot
     *
     * @return \ABC\ApplicationBundle\Entity\Timeslot 
     */
    public function getTimeslot()
    {
        return $this->timeslot;
    }

    /**
     * Add rp
     *
     * @param \ABC\ApplicationBundle\Entity\Resourceperson $rp
     * @return Session
     */
    public function addRp(\ABC\ApplicationBundle\Entity\Resourceperson $rp)
    {
        $this->rp[] = $rp;

        return $this;
    }

    /**
     * Remove rp
     *
     * @param \ABC\ApplicationBundle\Entity\Resourceperson $rp
     */
    public function removeRp(\ABC\ApplicationBundle\Entity\Resourceperson $rp)
    {
        $this->rp->removeElement($rp);
    }

    /**
     * Get rp
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRp()
    {
        return $this->rp;
    }
}
