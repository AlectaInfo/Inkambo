<?php

namespace ABC\RspBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ResourcepersonType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('address')
            ->add('phone')
            ->add('email')
            ->add('photo')
            ->add('post')
            ->add('deptName')
            ->add('qualification')
            ->add('session')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ABC\RspBundle\Entity\Resourceperson'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'abc_rspbundle_resourceperson';
    }
}
