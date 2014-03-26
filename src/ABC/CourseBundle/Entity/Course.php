<?php

namespace ABC\CourseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Course
 */
/**
* @ORM\Entity
* @UniqueEntity(fields="courseId", message="The given course id already exists")
*/
class Course
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $fee;

    /**
     * @var integer
     */
    private $duration;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $leaflet;

    /**
     * @var string
     */
    private $courseId;

    /**
     * @var Department
     */
    private $deptName;
    private $identifier;

    /**
     * Set title
     *
     * @param string $title
     * @return Course
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set fee
     *
     * @param string $fee
     * @return Course
     */
    public function setFee($fee)
    {
        $this->fee = $fee;

        return $this;
    }

    /**
     * Get fee
     *
     * @return string 
     */
    public function getFee()
    {
        return $this->fee;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     * @return Course
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return integer 
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Course
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set leaflet
     *
     * @param string $leaflet
     * @return Course
     */
    public function setLeaflet($leaflet)
    {
        $this->leaflet = $leaflet;

        return $this;
    }

    /**
     * Get leaflet
     *
     * @return string 
     */
    public function getLeaflet()
    {
        return $this->leaflet;
    }

    /**
     * Set courseId
     *
     * @param string $courseId
     * @return Course
     */
    public function setCourseId($courseId)
    {
        $this->courseId = $this->identifier.$courseId;

        return $this;
    }

    /**
     * Get courseId
     *
     * @return string 
     */
    public function getCourseId()
    {
        return $this->courseId;
    }

    /**
     * Set deptName
     *
     * @param Department $deptName
     * @return Course
     */
    public function setDeptName(Department $deptName )
    {
        $this->deptName = $deptName;
        $this->identifier = $deptName->getCode();
        return $this;
    }

    /**
     * Get deptName
     *
     * @return Department 
     */
    public function getDeptName()
    {
        return $this->deptName;
    }
}
