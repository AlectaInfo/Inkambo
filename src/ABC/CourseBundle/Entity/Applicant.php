<?php

namespace ABC\CourseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Applicant
 */
class Applicant
{
    /**
     * @var \DateTime
     */
    private $submitdate;

    /**
     * @var string
     */
    private $nic;

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
    private $phone;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $gender;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $certificates;

    /**
     * @var integer
     */
    private $rating;

    /**
     * @var string
     */
    private $status;

    /**
     * @var integer
     */
    private $appId;

    /**
     * @var \ABC\CourseBundle\Entity\Timeslot
     */
    private $timeslot2;

    /**
     * @var \ABC\CourseBundle\Entity\Timeslot
     */
    private $timeslot1;

    /**
     * @var \ABC\CourseBundle\Entity\Course
     */
    private $course;


    /**
     * Set submitdate
     *
     * @param \DateTime $submitdate
     * @return Applicant
     */
    public function setSubmitdate($submitdate)
    {
        $this->submitdate = $submitdate;

        return $this;
    }

    /**
     * Get submitdate
     *
     * @return \DateTime 
     */
    public function getSubmitdate()
    {
        return $this->submitdate;
    }

    /**
     * Set nic
     *
     * @param string $nic
     * @return Applicant
     */
    public function setNic($nic)
    {
        $this->nic = $nic;

        return $this;
    }

    /**
     * Get nic
     *
     * @return string 
     */
    public function getNic()
    {
        return $this->nic;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return Applicant
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
     * @return Applicant
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
     * Set phone
     *
     * @param string $phone
     * @return Applicant
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
     * Set address
     *
     * @param string $address
     * @return Applicant
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
     * Set gender
     *
     * @param string $gender
     * @return Applicant
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
     * Set email
     *
     * @param string $email
     * @return Applicant
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
     * Set certificates
     *
     * @param string $certificates
     * @return Applicant
     */
    public function setCertificates($certificates)
    {
        $this->certificates = $certificates;

        return $this;
    }

    /**
     * Get certificates
     *
     * @return string 
     */
    public function getCertificates()
    {
        return $this->certificates;
    }

    /**
     * Set rating
     *
     * @param integer $rating
     * @return Applicant
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return integer 
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Applicant
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get appId
     *
     * @return integer 
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * Set timeslot2
     *
     * @param \ABC\CourseBundle\Entity\Timeslot $timeslot2
     * @return Applicant
     */
    public function setTimeslot2(\ABC\CourseBundle\Entity\Timeslot $timeslot2 = null)
    {
        $this->timeslot2 = $timeslot2;

        return $this;
    }

    /**
     * Get timeslot2
     *
     * @return \ABC\CourseBundle\Entity\Timeslot 
     */
    public function getTimeslot2()
    {
        return $this->timeslot2;
    }

    /**
     * Set timeslot1
     *
     * @param \ABC\CourseBundle\Entity\Timeslot $timeslot1
     * @return Applicant
     */
    public function setTimeslot1(\ABC\CourseBundle\Entity\Timeslot $timeslot1 = null)
    {
        $this->timeslot1 = $timeslot1;

        return $this;
    }

    /**
     * Get timeslot1
     *
     * @return \ABC\CourseBundle\Entity\Timeslot 
     */
    public function getTimeslot1()
    {
        return $this->timeslot1;
    }

    /**
     * Set course
     *
     * @param \ABC\CourseBundle\Entity\Course $course
     * @return Applicant
     */
    public function setCourse(\ABC\CourseBundle\Entity\Course $course = null)
    {
        $this->course = $course;

        return $this;
    }

    /**
     * Get course
     *
     * @return \ABC\CourseBundle\Entity\Course 
     */
    public function getCourse()
    {
        return $this->course;
    }
}
