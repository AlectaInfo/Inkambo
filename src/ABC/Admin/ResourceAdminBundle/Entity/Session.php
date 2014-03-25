<?php

namespace ABC\Admin\ResourceAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
* @ORM\Entity
* @UniqueEntity(fields="sessionId", message="The given Session id already exists")
 * 
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
     * @var \ABC\Admin\ResourceAdminBundle\Entity\Classroom
     */
    private $class;

    /**
     * @var \ABC\Admin\ResourceAdminBundle\Entity\Timeslot
     */
    private $timeslot;

    /**
     * @var \ABC\Admin\ResourceAdminBundle\Entity\Course
     */
    private $course;


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
     * @param \ABC\Admin\ResourceAdminBundle\Entity\Classroom $class
     * @return Session
     */
    public function setClass(\ABC\Admin\ResourceAdminBundle\Entity\Classroom $class)
    {
        $this->class = $class;
    
        return $this;
    }

    /**
     * Get class
     *
     * @return \ABC\Admin\ResourceAdminBundle\Entity\Classroom 
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set timeslot
     *
     * @param \ABC\Admin\ResourceAdminBundle\Entity\Timeslot $timeslot
     * @return Session
     */
    public function setTimeslot(\ABC\Admin\ResourceAdminBundle\Entity\Timeslot $timeslot)
    {
        $this->timeslot = $timeslot;
    
        return $this;
    }

    /**
     * Get timeslot
     *
     * @return \ABC\Admin\ResourceAdminBundle\Entity\Timeslot 
     */
    public function getTimeslot()
    {
        return $this->timeslot;
    }

    /**
     * Set course
     *
     * @param \ABC\Admin\ResourceAdminBundle\Entity\Course $course
     * @return Session
     */
    public function setCourse(\ABC\Admin\ResourceAdminBundle\Entity\Course $course)
    {
        $this->course = $course;
    
        return $this;
    }

    /**
     * Get course
     *
     * @return \ABC\Admin\ResourceAdminBundle\Entity\Course 
     */
    public function getCourse()
    {
        return $this->course;
    }
    
   
}
