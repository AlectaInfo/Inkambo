<?php

namespace ABC\HomeBundle\Entity;

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
     * @var \ABC\HomeBundle\Entity\Classroom
     */
    private $class;

    /**
     * @var \ABC\HomeBundle\Entity\Timeslot
     */
    private $timeslot;

    /**
     * @var \ABC\HomeBundle\Entity\Course
     */
    private $course;


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
     * @param \ABC\HomeBundle\Entity\Classroom $class
     * @return Session
     */
    public function setClass(\ABC\HomeBundle\Entity\Classroom $class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Get class
     *
     * @return \ABC\HomeBundle\Entity\Classroom 
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set timeslot
     *
     * @param \ABC\HomeBundle\Entity\Timeslot $timeslot
     * @return Session
     */
    public function setTimeslot(\ABC\HomeBundle\Entity\Timeslot $timeslot)
    {
        $this->timeslot = $timeslot;

        return $this;
    }

    /**
     * Get timeslot
     *
     * @return \ABC\HomeBundle\Entity\Timeslot 
     */
    public function getTimeslot()
    {
        return $this->timeslot;
    }

    /**
     * Set course
     *
     * @param \ABC\HomeBundle\Entity\Course $course
     * @return Session
     */
    public function setCourse(\ABC\HomeBundle\Entity\Course $course)
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
