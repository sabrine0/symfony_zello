<?php

namespace App\Form;

use App\Entity\Employes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use App\Entity\Service; // Import the Service entity
use App\Entity\Services;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;







class EmployesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('lastName')
          //  ->add('gender')
          ->add('gender', ChoiceType::class, [ 'choices' => ['M' => 'M','F' => 'F', ], 'placeholder' => 'Choose gender',])
            ->add('address',TextareaType::class, [
              
                'attr' => ['rows' => 5], // Optional: set the number of rows for the text area
            ])
            ->add('bDate',DateType::class, [
                'label' => 'Birth Date',
                'widget' => 'single_text', // Renders as a single input field
                // You can add more options as needed, such as 'years' to limit the year range
            ])
            ->add('service', EntityType::class, [
                'class' => Services::class,
                'choice_label' => 'designation', // Assuming 'name' is a property in the Service entity
                'placeholder' => 'Choose services',
            ])
         
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Employes::class,
        ]);
    }
}
