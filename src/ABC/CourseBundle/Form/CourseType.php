<?php

namespace ABC\CourseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CourseType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('Title', 'text')
                ->add('CourseId', 'text',array(
                    'max_length'=>6,
                    'pattern'=>'[A-Z0-9]{6}'
                ))
                ->add('Duration', 'number')
                ->add('Fee', 'number')
                ->add('deptName', 'entity',array(
                    'label'=>"Department",
                    'class'=> 'ABCCourseBundle:Department',
                    'property'=>'name',
                    'empty_value'=>'select department'

                ))
                ->add('description', 'text')
               // ->add('leaflet', 'file')
           
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'ABC\CourseBundle\Entity\Course'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'abc_coursebundle_course';
    }

}
