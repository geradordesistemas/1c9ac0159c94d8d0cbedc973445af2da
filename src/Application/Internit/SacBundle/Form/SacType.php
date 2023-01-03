<?php

namespace App\Application\Internit\SacBundle\Form;

use App\Application\Internit\SacBundle\Entity\Sac;
use App\Application\Internit\DepartamentoBundle\Entity\Departamento;
use App\Application\Internit\UnidadeBundle\Entity\Unidade;
use App\Application\Internit\ClienteBundle\Entity\Cliente;

use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\OptionsResolver\OptionsResolver;

/** Components Form */
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;


class SacType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {


        $builder->add('assunto', TextareaType::class, [
            'label' => 'Assunto',
            'required' =>  true ,
            'attr' => ['class' => ' form-control mb-2 '],
            
        ]);

        $builder->add('mensagem', TextareaType::class, [
            'label' => 'Mensagem',
            'required' =>  true ,
            'attr' => ['class' => ' form-control mb-2 '],
            
        ]);

        $builder->add('departamento', EntityType::class, [
            'class' => Departamento::class,
            'choice_label' => function ($data) {
                return $data->getId() .' - '.$data->getNome();
            },
            'label' => 'Departamento',
            'required' =>  false ,
            'multiple' =>  false ,
            'attr' => ['class' => 'form-control mb-2 form-select'],
        ]);

        $builder->add('unidade', EntityType::class, [
            'class' => Unidade::class,
            'choice_label' => function ($data) {
                return $data->getId() .' - '.$data->getUnidade();
            },
            'label' => 'Unidade',
            'required' =>  false ,
            'multiple' =>  false ,
            'attr' => ['class' => 'form-control mb-2 form-select'],
        ]);

        $builder->add('cliente', EntityType::class, [
            'class' => Cliente::class,
            'choice_label' => function ($data) {
                return $data->getId() .' - '.$data->getNome().' - '.$data->getSobrenome();
            },
            'label' => 'Cliente',
            'required' =>  false ,
            'multiple' =>  false ,
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
