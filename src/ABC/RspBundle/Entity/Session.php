<?php

namespace ABC\RspBundle\Entity;

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
     * @var \ABC\RspBundle\Entity\Course
     */
    private $course;

    /**
     * @var \ABC\RspBundle\Entity\Classroom
     */
    private $class;

    /**
     * @var \ABC\RspBundle\Entity\Timeslot
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
     * @param \ABC\RspBundle\Entity\Course $course
     * @return Session
     */
    public function setCourse(\ABC\RspBundle\Entity\Course $course)
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

    /**
     * Set class
     *
     * @param \ABC\RspBundle\Entity\Classroom $class
     * @return Session
     */
    public function setClass(\ABC\RspBundle\Entity\Classroom $class = null)
    {
        $this->class = $class;
    
        return $this;
    }

    /**
     * Get class
     *
     * @return \ABC\RspBundle\Entity\Classroom 
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set timeslot
     *
     * @param \ABC\RspBundle\Entity\Timeslot $timeslot
     * @return Session
     */
    public function setTimeslot(\ABC\RspBundle\Entity\Timeslot $timeslot = null)
    {
        $this->timeslot = $timeslot;
    
        return $this;
    }

    /**
     * Get timeslot
     *
     * @return \ABC\RspBundle\Entity\Timeslot 
     */
    public function getTimeslot()
    {
        return $this->timeslot;
    }

    /**
     * Add rp
     *
     * @param \ABC\RspBundle\Entity\Resourceperson $rp
     * @return Session
     */
    public function addRp(\ABC\RspBundle\Entity\Resourceperson $rp)
    {
        $this->rp[] = $rp;
    
        return $this;
    }

    /**
     * Remove rp
     *
     * @param \ABC\RspBundle\Entity\Resourceperson $rp
     */
    public function removeRp(\ABC\RspBundle\Entity\Resourceperson $rp)
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
    /**
     * @var integer
     */
    private $maxStudents;


    /**
     * Set maxStudents
     *
     * @param integer $maxStudents
     * @return Session
     */
    public function setMaxStudents($maxStudents)
    {
        $this->maxStudents = $maxStudents;
    
        return $this;
    }

    /**
     * Get maxStudents
     *
     * @return integer 
     */
    public function getMaxStudents()
    {
        return $this->maxStudents;
    }
}
