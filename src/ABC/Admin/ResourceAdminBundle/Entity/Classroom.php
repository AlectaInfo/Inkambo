<?php

namespace ABC\Admin\ResourceAdminBundle\Entity;

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
     * Set classId
     *
     * @param string $classId
     * @return Classroom
     */
    public function setClassId($classId)
    {
        $this->classId = $classId;
    
        return $this;
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
    
    public function __toString(){
        return $this->getClassId();
    }
}
