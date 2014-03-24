<?php
namespace ABC\Admin\ResourceAdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SessionType extends AbstractType{
       /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sessionId','text',array(
                'max_length'=>4,
                'label'=>'Session ID',
                'pattern'=> '[A-Z0-9]+'
            ))
            ->add('year','integer',array(
                'max_length'=>4,
                 'attr'=>array('min'=>2014,'max'=>'2020'),
                'pattern'=>'[0-9]+{4}'
            ))
            ->add('startMonth','choice',array(
                'choices'=>array('Jan'=>'January','Feb'=>'February')
            ))
                
            ->add('class','entity',array(
                'class'=>'ABCAdminResourceAdminBundle:Classroom',
                'property'=>'classId'
            ))
            ->add('timeslot','entity', array(
                 'class'=>'ABCAdminResourceAdminBundle:Timeslot',
                'property'=>'timeslotId'
            ))
             ->add('course','entity', array(
                 'class'=>'ABCAdminResourceAdminBundle:Course',
                'property'=>'courseId'
            ))    
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ABC\Admin\ResourceAdminBundle\Entity\Session'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'abc_admin_resourceadminbundle_session';
    }
}

?>
