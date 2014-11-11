<?php

namespace Dev\Pub\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormError;

class FormType extends AbstractType
{
    public function __construct()
    {
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $choices = array('choice a', 'choice b', 'choice c');

        $builder
            ->add(
                $builder->create('sub-form', 'form', array(
                    'mapped' => false,
                    ))
                    ->add('subformemail1', 'email', array(
                        'constraints' => array(new Assert\NotBlank(), new Assert\Email()),
                        'attr'        => array('placeholder' => 'email constraints'),
                        'label'       => 'A custom label : ',
                    ))
                    ->add('subformtext1', 'text')
            )
            ->add('text1', 'text', array(
                'constraints' => new Assert\NotBlank(),
                'attr'        => array('placeholder' => 'not blank constraints')
            ))
            ->add('text2', 'text', array('attr' => array('class' => 'span1', 'placeholder' => '.span1')))
            ->add('text3', 'text', array('attr' => array('class' => 'span2', 'placeholder' => '.span2')))
            ->add('text4', 'text', array('attr' => array('class' => 'span3', 'placeholder' => '.span3')))
            ->add('text5', 'text', array('attr' => array('class' => 'span4', 'placeholder' => '.span4')))
            ->add('text6', 'text', array('attr' => array('class' => 'span5', 'placeholder' => '.span5')))
            ->add('text8', 'text', array('disabled' => true, 'attr' => array('placeholder' => 'disabled field')))
            ->add('textarea', 'textarea')
            ->add('email', 'email')
            ->add('integer', 'integer')
            ->add('money', 'money')
            ->add('number', 'number')
            ->add('password', 'password')
            ->add('percent', 'percent')
            ->add('search', 'search')
            ->add('url', 'url')
            ->add('choices1', 'choice', array(
                'choices'  => $choices,
                'multiple' => true,
                'expanded' => true
            ))
            ->add('choice2', 'choice', array(
                'choices'  => $choices,
                'multiple' => false,
                'expanded' => true
            ))
            ->add('choices3', 'choice', array(
                'choices'  => $choices,
                'multiple' => true,
                'expanded' => false
            ))
            ->add('choice4', 'choice', array(
                'choices'  => $choices,
                'multiple' => false,
                'expanded' => false
            ))
            ->add('country', 'country')
            ->add('language', 'language')
            ->add('locale', 'locale')
            ->add('timezone', 'timezone')
            ->add('date', 'date')
            ->add('datetime', 'datetime')
            ->add('time', 'time')
            ->add('birthday', 'birthday')
            ->add('checkbox', 'checkbox')
            // ->add('file', 'file')
            ->add('radio', 'radio')
            ->add('password_repeated', 'repeated', array(
                'type'            => 'password',
                'invalid_message' => 'The password fields must match.',
                'options'         => array('required' => true),
                'first_options'   => array('label' => 'Password'),
                'second_options'  => array('label' => 'Repeat Password'),
            ))
            ->add('submit', 'submit')
        ;

        // $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
        //     error_log(print_r('PRE_SET_DATA',1).' '.__FILE__.' '.__LINE__.PHP_EOL,0);
        //     $data = $event->getData();
        //     $form = $event->getForm();
        // });

        // $builder->addEventListener(FormEvents::POST_SET_DATA, function (FormEvent $event) {
        //     error_log(print_r('POST_SET_DATA',1).' '.__FILE__.' '.__LINE__.PHP_EOL,0);
        //     $data = $event->getData();
        //     $form = $event->getForm();
        // });

        // $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) {
        //     error_log(print_r('PRE_SUBMIT',1).' '.__FILE__.' '.__LINE__.PHP_EOL,0);
        //     $data = $event->getData();
        //     $form = $event->getForm();
        // });

        // $builder->addEventListener(FormEvents::SUBMIT, function (FormEvent $event) {
        //     error_log(print_r('SUBMIT',1).' '.__FILE__.' '.__LINE__.PHP_EOL,0);
        //     $data = $event->getData();
        //     $form = $event->getForm();
        // });

        // $builder->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event) {
        //     error_log(print_r('POST_SUBMIT',1).' '.__FILE__.' '.__LINE__.PHP_EOL,0);
        //     $data = $event->getData();
        //     $form = $event->getForm();
        // });
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Dev\Pub\Entity\Form',
        ));
    }

    public function getName()
    {
        return 'dev_pub_formtype';
    }
}
