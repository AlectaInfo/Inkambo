<?php

namespace ABC\ApplicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Resourceperson
 */
class Resourceperson
{
    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $gender;

    /**
     * @var string
     */
    private $photo;

    /**
     * @var string
     */
    private $post;

    /**
     * @var string
     */
    private $qualification;

    /**
     * @var integer
     */
    private $rpId;

    /**
     * @var \ABC\ApplicationBundle\Entity\Department
     */
    private $deptName;


    /**
     * Set firstname
     *
     * @param string $firstname
     * @return Resourceperson
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Resourceperson
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Resourceperson
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Resourceperson
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Resourceperson
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return Resourceperson
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set photo
     *
     * @param string $photo
     * @return Resourceperson
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string 
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set post
     *
     * @param string $post
     * @return Resourceperson
     */
    public function setPost($post)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get post
     *
     * @return string 
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Set qualification
     *
     * @param string $qualification
     * @return Resourceperson
     */
    public function setQualification($qualification)
    {
        $this->qualification = $qualification;

        return $this;
    }

    /**
     * Get qualification
     *
     * @return string 
     */
    public function getQualification()
    {
        return $this->qualification;
    }

    /**
     * Get rpId
     *
     * @return integer 
     */
    public function getRpId()
    {
        return $this->rpId;
    }

    /**
     * Set deptName
     *
     * @param \ABC\ApplicationBundle\Entity\Department $deptName
     * @return Resourceperson
     */
    public function setDeptName(\ABC\ApplicationBundle\Entity\Department $deptName = null)
    {
        $this->deptName = $deptName;

        return $this;
    }

    /**
     * Get deptName
     *
     * @return \ABC\ApplicationBundle\Entity\Department 
     */
    public function getDeptName()
    {
        return $this->deptName;
    }
}
