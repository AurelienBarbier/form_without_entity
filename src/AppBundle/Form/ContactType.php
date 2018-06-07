<?php
// src/AppBundle/Form/TaskType.php
namespace AppBundle\Form;

//Forms classes
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
// Validation Classes
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('email', EmailType::class)
        ->add('subject', TextType::class, array(
            'constraints' => array(
                new NotBlank(),
                new Length(array('min' => 5))
                )
            ))
        ->add('message', TextareaType::class, array(
            'constraints' => new Length(array('min' => 50, 'max' => 1000)),
            ))
        ->add('submit', SubmitType::class)
        ;
    }
}
