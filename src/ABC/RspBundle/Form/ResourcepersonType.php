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
            ->add('firstname','text')
            ->add('lastname','text')
            ->add('address','text',array(
                'attr'=>array(
                    'placeholder'=>'type your address here'
                   
                )
            ))
             ->add('gender','choice',array(
                'choices'=>array('Male'=>'Male',"Female"=>'Female'),
                  'empty_value'=> 'Select your gender'
            ))
            ->add('phone','text')    
            ->add('email','email')
//            ->add('photo','file',array(
//                
//            ))
            ->add('post','choice',array(
                'choices'=> array('Lecturer'=>'Lecturer','Lab Assistant'=>'Lab Assistant'),
                'empty_value'=> 'Select a post'
            ))
            ->add('deptName')
            ->add('qualification')
         //   ->add('session')
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
