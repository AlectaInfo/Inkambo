<?php

namespace ABC\Admin\ResourceAdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DepartmentType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code','text',array(
                'max_length'=>2,
                'label'=>'Department Code',
                'pattern'=> '[A-Z]{2}'
            ))
            ->add('name','text',array(
                'max_length'=>30,
                'label'=>'Department Name',
                'pattern'=>'[A-Z &a-z]+'
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ABC\Admin\ResourceAdminBundle\Entity\Department'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'abc_admin_resourceadminbundle_department';
    }
}
