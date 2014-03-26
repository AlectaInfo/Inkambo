<?php

namespace ABC\Admin\CourseAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Department
 */
class Department
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $name;


    /**
     * Set code
     *
     * @param string $code
     * @return Department
     */
    public function setCode($code)
    {
        $this->code = $code;
    
        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Department
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
}
