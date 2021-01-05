<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType as TypeIntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditProductFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('category', EntityType::class, [
                'class' => Category::class
            ])
            ->add('price')
            ->add('images', FileType::class, [
                'mapped' => false,
                'multiple' => true,
                'required' => false,
                'attr' => [
                    'type' => 'file',
                    'class' => 'custom-file-input',
                    'id' => 'customFile'
                ]
            ])
            ->add('code')
            ->add('stock')
            ->add('small', TypeIntegerType::class, [
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'Small Sizes Number'
                ]
            ])
            ->add('medium', TypeIntegerType::class, [
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'Medium Sizes Number'
                ]
            ])
            ->add('large', TypeIntegerType::class, [
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'Large Sizes Number'
                ]
            ])
            ->add('availability', CheckboxType::class, [
                'data' => true
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary float-right'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
