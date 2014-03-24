<?php

namespace ABC\CourseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Session
 */
class Session
{
    /**
     * @var integer
     */
    private $maxStudents;

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
     * @var \ABC\CourseBundle\Entity\Classroom
     */
    private $class;

    /**
     * @var \ABC\CourseBundle\Entity\Timeslot
     */
    private $timeslot;

    /**
     * @var \ABC\CourseBundle\Entity\Course
     */
    private $course;

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
     * Set class
     *
     * @param \ABC\CourseBundle\Entity\Classroom $class
     * @return Session
     */
    public function setClass(\ABC\CourseBundle\Entity\Classroom $class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Get class
     *
     * @return \ABC\CourseBundle\Entity\Classroom 
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set timeslot
     *
     * @param \ABC\CourseBundle\Entity\Timeslot $timeslot
     * @return Session
     */
    public function setTimeslot(\ABC\CourseBundle\Entity\Timeslot $timeslot)
    {
        $this->timeslot = $timeslot;

        return $this;
    }

    /**
     * Get timeslot
     *
     * @return \ABC\CourseBundle\Entity\Timeslot 
     */
    public function getTimeslot()
    {
        return $this->timeslot;
    }

    /**
     * Set course
     *
     * @param \ABC\CourseBundle\Entity\Course $course
     * @return Session
     */
    public function setCourse(\ABC\CourseBundle\Entity\Course $course)
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

    /**
     * Add rp
     *
     * @param \ABC\CourseBundle\Entity\Resourceperson $rp
     * @return Session
     */
    public function addRp(\ABC\CourseBundle\Entity\Resourceperson $rp)
    {
        $this->rp[] = $rp;

        return $this;
    }

    /**
     * Remove rp
     *
     * @param \ABC\CourseBundle\Entity\Resourceperson $rp
     */
    public function removeRp(\ABC\CourseBundle\Entity\Resourceperson $rp)
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
