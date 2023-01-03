<?php

namespace App\Application\Internit\ComunicadoBundle\Form;

use App\Application\Internit\ComunicadoBundle\Entity\Comunicado;
use App\Application\Internit\ClienteBundle\Entity\Cliente;

use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\OptionsResolver\OptionsResolver;

/** Components Form */
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;


class ComunicadoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {


        $builder->add('titulo', TextType::class, [
            'label' => 'Titulo',
            'required' =>  true ,
            'attr' => ['class' => ' form-control mb-2 '],
            
        ]);

        $builder->add('mensagem', TextareaType::class, [
            'label' => 'Mensagem',
            'required' =>  false ,
            'attr' => ['class' => ' form-control mb-2 '],
            
        ]);

        $builder->add('data', DateType::class, [
            'label' => 'Data',
            'required' =>  true ,
            'attr' => ['class' => ' form-control mb-2 '],
            'widget' => 'single_text',
        ]);

        $builder->add('visivel', CheckboxType::class, [
            'label' => 'Visivel',
            'required' =>  false ,
            'attr' => ['class' => 'form-check-input'],
            
        ]);

        $builder->add('clientes', EntityType::class, [
            'class' => Cliente::class,
            'choice_label' => function ($data) {
                return $data->getId() .' - '.$data->getNome().' - '.$data->getSobrenome();
            },
            'label' => 'Clientes',
            'required' =>  false ,
            'multiple' =>  true ,
            'attr' => ['class' => 'form-control mb-2 form-select'],
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
