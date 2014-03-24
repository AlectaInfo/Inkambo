<?php

namespace ABC\Admin\CourseAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Timeslot
 */
class Timeslot
{
    /**
     * @var string
     */
    private $day;

    /**
     * @var \DateTime
     */
    private $start;

    /**
     * @var \DateTime
     */
    private $finish;

    /**
     * @var string
     */
    private $timeslotId;


    /**
     * Set day
     *
     * @param string $day
     * @return Timeslot
     */
    public function setDay($day)
    {
        $this->day = $day;
    
        return $this;
    }

    /**
     * Get day
     *
     * @return string 
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Set start
     *
     * @param \DateTime $start
     * @return Timeslot
     */
    public function setStart($start)
    {
        $this->start = $start;
    
        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime 
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set finish
     *
     * @param \DateTime $finish
     * @return Timeslot
     */
    public function setFinish($finish)
    {
        $this->finish = $finish;
    
        return $this;
    }

    /**
     * Get finish
     *
     * @return \DateTime 
     */
    public function getFinish()
    {
        return $this->finish;
    }

    /**
     * Set timeslotId
     *
     * @param string $timeslotId
     * @return Timeslot
     */
    public function setTimeslotId($timeslotId)
    {
        $this->timeslotId = $timeslotId;
    
        return $this;
    }

    /**
     * Get timeslotId
     *
     * @return string 
     */
    public function getTimeslotId()
    {
        return $this->timeslotId;
    }
}
