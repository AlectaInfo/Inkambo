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
            ->add('nic', 'text')
            ->add('firstname', 'text')
            ->add('lastname', 'text')
            ->add('phone', 'text')
            ->add('address', 'text')
            ->add('email', 'email')
            ->add('certificates')
            ->add('course', 'entity',
                    array(
                        'class'=>'ABC\ApplicationBundle\Entity\Course',
                        'property'=>'title'
                        ))
            ->add('timeslot1', 'entity',
                    array(
                        'class'=>'ABC\ApplicationBundle\Entity\Timeslot',
                        'property'=>'day'
                    ))
            
            ->add('timeslot2', 'entity',
                    array(
                        'class'=>'ABC\ApplicationBundle\Entity\Timeslot',
                        'property'=>'day'
                    ))
            ->add('submit','submit', array(
                'label' => 'Register',
                'attr' => array(
                    'class' => 'button'
                )))
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
