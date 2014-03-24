<?php

namespace ABC\CourseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
//use Symfony\Component\Form\FormEvent;
//use Symfony\Component\Form\FormEvents;
//use Symfony\Component\EventDispatcher\EventSubscriberInterface;


//Symfony\Component\Form\FormEvents;

//use Symfony\Component\Form\FormEvent;

//Symfony\Component\Security\Core\SecurityContext;

class CourseType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
   
    

    public function buildForm(FormBuilderInterface $builder, array $options) {


        $builder
                  ->add('deptName', 'entity', array(
                    'class' => 'ABC\CourseBundle\Entity\Department',
                    'property' => 'name'
                ))
                ->add('title', 'text')
                
                ->add('courseId', 'text', array(
                    'max_length' => 4, 'pattern' => '[0-9]+'
                ))
                ->add('duration', 'number')
                ->add('fee', 'number')
              
               
                ->add('description', 'text', array('max_length' => 200))
                // ->add('leaflet', 'file')

        ;
      /*  $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function(FormEvent $event) {
                $form = $event->getForm();

                $data = $event->getData();

                $department = $data->getName();
                $code = null === $department ? array() : $department->getAvailableCode();

                $form->add('courseId', 'text', array(
                    'class'       => 'AcmeDemoBundle:Position',
                    'empty_value' => '',
                    'choices'     => $positions,
                ));
            }
        );*/
        
        

        
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
