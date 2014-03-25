<?php

namespace ABC\ApplicationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ApplicantType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('submitdate')
            ->add('nic', 'text',
                    array(
                        'label' => 'NIC',
                        'pattern' => '[0-9vV]+',
                        'max_length' => 10
                    ))
            ->add('firstname', 'text',
                    array(
                        'label' => 'First Name'
                    ))
            ->add('lastname', 'text',
                    array(
                        'label' => 'Last Name'
                    ))
            ->add('dob', 'birthday',
                    array(
                        'years'=>range(1970,2006)
                    ))
            ->add('phone', 'text',
                    array(
                        'pattern' => '[0-9]+',
                        'max_length' => 10
                    ))
            ->add('address', 'textarea',
                    array(
                        'label' => 'Address'
                    ))
            ->add('gender', 'choice',
                    array(
                        'choices' => array('Male'=>'Male', 'Female'=>'Female')
                    ))
            ->add('email', 'email',
                    array(
                        'label'=>'E-mail'
                ))
//            ->add('currentoccuption', 'text',
//                    array(
//                        'label' => 'Current Occupation'
//                    ))
            ->add('qualification', 'textarea',
                    array(
                        'label' => 'Qualifications'
                    ))
            ->add('certificates', 'file',
                    array(
                        'label' => 'Certificates'
                    ))
//            ->add('rating')
//            ->add('status')
//            ->add('timeslot2')
//            ->add('timeslot1')
            ->add('course', 'entity',
                    array(
                        'class'=>'ABCApplicationBundle:Course',
                        'property'=>'title',
                        'label'=>'Course'
                    ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ABC\ApplicationBundle\Entity\Applicant'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'abc_applicationbundle_applicant';
    }
}

