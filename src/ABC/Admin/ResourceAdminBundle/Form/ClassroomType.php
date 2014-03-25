<?php

namespace ABC\Admin\ResourceAdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClassroomType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('classID','text',array(
                'pattern'=>'[A-Z0-9]+{3}',
                'max_length'=>4,
                'label'=>'Class ID'
            ))    
            ->add('capacity','text',array(
                'pattern'=>'[0-9]+{3}',
                'max_length'=>3
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ABC\Admin\ResourceAdminBundle\Entity\Classroom'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'abc_admin_resourceadminbundle_classroom';
    }
}
