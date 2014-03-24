<?php
 
namespace ABC\CourseBundle\Extension;
 
class CourseTwigExtension extends \Twig_Extension
{
    private $em;
    private $conn;
 
    public function __construct(\Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
        $this->conn = $em->getConnection();
    }
 
    public function getFunctions()
    {
        return array(
            'courses' => new \Twig_Function_Method($this, 'getCourses()'),
        );
    }
 
    public function getCategories($department)
    {
        $sql = "SELECT title FROM course WHERE dept_name =".$department->getName ." ORDER BY title";
        return $this->conn->fetchAll($sql);
    }
 
    public function getName()
    {
        return 'abc_course_twig_extension';
    }
}