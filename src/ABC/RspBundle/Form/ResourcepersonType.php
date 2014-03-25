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
            ->add('firstname','text', array(
                'attr'=>array(
                    'placeholder'=>'First name'  
                )
            ))
            ->add('lastname','text',array(
                'attr'=>array(
                    'placeholder'=>'Last name '  
                )
            ))
            ->add('address','text',array(
                'attr'=>array(
                    'placeholder'=>'Address'
                   
                )
            ))
             ->add('gender','choice',array(
                'choices'=>array('Male'=>'Male',"Female"=>'Female'),
                  'empty_value'=> 'Select your gender'
            ))
            ->add('phone','text',array(
                'max_length'=>10,
                'pattern' => '[0-9]+',
                'attr'=>array(
                    'placeholder'=>'xxxxxxxxxx'  
                )
            ))    
            ->add('email','email',array(
               // 'pattern' => '[A-Z@.a-z]+',
                'attr'=>array(
                    'placeholder'=>'Enter email here'  
                )
            ))
//            ->add('photo','file',array(
//                
//            ))
            ->add('post','choice',array(
                'choices'=> array('Lecturer'=>'Lecturer','Lab Assistant'=>'Lab Assistant','Asst. Lecturer'=>'Asst. Lecturer'),
                'empty_value'=> 'Select a post'
            ))
            ->add('deptName','entity',array(
                'class'=>'ABCRspBundle:Department',
                'property'=>'name',
                'label'=>'Department',
                'empty_value'=> 'Select a Department'
            ))
            ->add('qualification',"textarea",array(
                'required'=>'false',
                'max_length'=>300,
                'attr'=>array(
                    'placeholder'=>'Enter your qualification here'  
                )
            ))
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
