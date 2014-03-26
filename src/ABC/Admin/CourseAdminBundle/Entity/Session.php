<?php

namespace ABC\Admin\CourseAdminBundle\Entity;

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
     * @var \ABC\Admin\CourseAdminBundle\Entity\Classroom
     */
    private $class;

    /**
     * @var \ABC\Admin\CourseAdminBundle\Entity\Timeslot
     */
    private $timeslot;

    /**
     * @var \ABC\Admin\CourseAdminBundle\Entity\Course
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
     * @param \ABC\Admin\CourseAdminBundle\Entity\Classroom $class
     * @return Session
     */
    public function setClass(\ABC\Admin\CourseAdminBundle\Entity\Classroom $class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Get class
     *
     * @return \ABC\Admin\CourseAdminBundle\Entity\Classroom 
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set timeslot
     *
     * @param \ABC\Admin\CourseAdminBundle\Entity\Timeslot $timeslot
     * @return Session
     */
    public function setTimeslot(\ABC\Admin\CourseAdminBundle\Entity\Timeslot $timeslot)
    {
        $this->timeslot = $timeslot;

        return $this;
    }

    /**
     * Get timeslot
     *
     * @return \ABC\Admin\CourseAdminBundle\Entity\Timeslot 
     */
    public function getTimeslot()
    {
        return $this->timeslot;
    }

    /**
     * Set course
     *
     * @param \ABC\Admin\CourseAdminBundle\Entity\Course $course
     * @return Session
     */
    public function setCourse(\ABC\Admin\CourseAdminBundle\Entity\Course $course)
    {
        $this->course = $course;

        return $this;
    }

    /**
     * Get course
     *
     * @return \ABC\Admin\CourseAdminBundle\Entity\Course 
     */
    public function getCourse()
    {
        return $this->course;
    }
}
