<?php

namespace ABC\RspBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classroom
 */
class Classroom
{
    /**
     * @var integer
     */
    private $capacity;

    /**
     * @var string
     */
    private $classId;


    /**
     * Set capacity
     *
     * @param integer $capacity
     * @return Classroom
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
    
        return $this;
    }

    /**
     * Get capacity
     *
     * @return integer 
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Get classId
     *
     * @return string 
     */
    public function getClassId()
    {
        return $this->classId;
    }
}
