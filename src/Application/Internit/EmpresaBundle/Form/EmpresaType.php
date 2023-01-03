<?php

namespace App\Application\Internit\EmpresaBundle\Form;

use App\Application\Internit\EmpresaBundle\Entity\Empresa;

use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\OptionsResolver\OptionsResolver;

/** Components Form */
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;


class EmpresaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {


        $builder->add('nome', TextType::class, [
            'label' => 'Nome',
            'required' =>  true ,
            'attr' => ['class' => ' form-control mb-2 '],
            
        ]);

        $builder->add('email', TextType::class, [
            'label' => 'Email',
            'required' =>  true ,
            'attr' => ['class' => ' form-control mb-2 '],
            
        ]);

        $builder->add('telefone', TextType::class, [
            'label' => 'Telefone',
            'required' =>  false ,
            'attr' => ['class' => ' form-control mb-2 '],
            
        ]);

        $builder->add('cep', TextType::class, [
            'label' => 'Cep',
            'required' =>  false ,
            'attr' => ['class' => ' form-control mb-2 '],
            
        ]);

        $builder->add('estado', TextType::class, [
            'label' => 'Estado',
            'required' =>  false ,
            'attr' => ['class' => ' form-control mb-2 '],
            
        ]);

        $builder->add('cidade', TextType::class, [
            'label' => 'Cidade',
            'required' =>  false ,
            'attr' => ['class' => ' form-control mb-2 '],
            
        ]);

        $builder->add('bairro', TextType::class, [
            'label' => 'Bairro',
            'required' =>  false ,
            'attr' => ['class' => ' form-control mb-2 '],
            
        ]);

        $builder->add('rua', TextType::class, [
            'label' => 'Rua',
            'required' =>  false ,
            'attr' => ['class' => ' form-control mb-2 '],
            
        ]);

        $builder->add('numero', TextType::class, [
            'label' => 'Numero',
            'required' =>  false ,
            'attr' => ['class' => ' form-control mb-2 '],
            
        ]);

        $builder->add('complemento', TextType::class, [
            'label' => 'Complemento',
            'required' =>  false ,
            'attr' => ['class' => ' form-control mb-2 '],
            
        ]);



         $builder->add('enviar', SubmitType::class, [
            'attr' => ['type' => 'submit', 'class' => 'save btn btn-primary' ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
