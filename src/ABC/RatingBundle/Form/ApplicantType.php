<?php

namespace ABC\RatingBundle\Form;

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
            ->add('rating')
            ->add('status', 'choice',
                    array(
                        'choices'=>array('Reviewed', 'Pending')
                    ))
            ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ABC\RatingBundle\Entity\Applicant'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'abc_ratingbundle_applicant';
    }
}
