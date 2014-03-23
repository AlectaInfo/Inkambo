<?php

namespace ABC\Admin\ResourceAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Teaches
 */
class Teaches
{
    /**
     * @var \ABC\Admin\ResourceAdminBundle\Entity\Resourceperson
     */
    private $rp;

    /**
     * @var \ABC\Admin\ResourceAdminBundle\Entity\Session
     */
    private $session;

    /**
     * @var \ABC\Admin\ResourceAdminBundle\Entity\Course
     */
    private $course;


    /**
     * Set rp
     *
     * @param \ABC\Admin\ResourceAdminBundle\Entity\Resourceperson $rp
     * @return Teaches
     */
    public function setRp(\ABC\Admin\ResourceAdminBundle\Entity\Resourceperson $rp)
    {
        $this->rp = $rp;
    
        return $this;
    }

    /**
     * Get rp
     *
     * @return \ABC\Admin\ResourceAdminBundle\Entity\Resourceperson 
     */
    public function getRp()
    {
        return $this->rp;
    }

    /**
     * Set session
     *
     * @param \ABC\Admin\ResourceAdminBundle\Entity\Session $session
     * @return Teaches
     */
    public function setSession(\ABC\Admin\ResourceAdminBundle\Entity\Session $session)
    {
        $this->session = $session;
    
        return $this;
    }

    /**
     * Get session
     *
     * @return \ABC\Admin\ResourceAdminBundle\Entity\Session 
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * Set course
     *
     * @param \ABC\Admin\ResourceAdminBundle\Entity\Course $course
     * @return Teaches
     */
    public function setCourse(\ABC\Admin\ResourceAdminBundle\Entity\Course $course = null)
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
