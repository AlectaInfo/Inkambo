<?php

namespace ABC\Admin\ResourceAdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TimeslotType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('timeslotId','text',array(
                    'label'=>'Timeslot ID'
            ))   
            ->add('day','choice',array(
                'choices'=>array('Monday'=>'Monday','Tuesday'=>'Tuesday','Wednesday'=>'Wednesday','Thursday'=>'Thursday','Friday'=>'Friday','Saturday'=>'Saturday','Sunday'=>'Sunday')
            ))
            ->add('start','time',array(
                'widget'=>'single_text',
                'input'=>'datetime',
                'empty_value'=>array('hour'=>'HH','minute'=>'MM')
//                'pattern'=>'[0-9:]{5}+',
//                'attr'=>array('placeholder'=> 'HH:MM(24 hour format)')
            ))
            ->add('finish','time',array(
                'widget'=>'single_text',
                'input'=>'datetime',
                'empty_value'=>array('hour'=>'HH','minute'=>'MM')
//                'pattern'=>'[0-9:]{5}+',
//                'attr'=>array('placeholder'=> 'HH:MM(24 hour format)')
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ABC\Admin\ResourceAdminBundle\Entity\Timeslot'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'abc_admin_resourceadminbundle_timeslot';
    }
}
