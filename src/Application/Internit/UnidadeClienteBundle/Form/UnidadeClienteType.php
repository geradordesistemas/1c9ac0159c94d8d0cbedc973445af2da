<?php

namespace App\Application\Internit\UnidadeClienteBundle\Form;

use App\Application\Internit\UnidadeClienteBundle\Entity\UnidadeCliente;
use App\Application\Internit\TipoClienteBundle\Entity\TipoCliente;
use App\Application\Internit\ClienteBundle\Entity\Cliente;
use App\Application\Internit\UnidadeBundle\Entity\Unidade;

use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\OptionsResolver\OptionsResolver;

/** Components Form */
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;


class UnidadeClienteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {


        $builder->add('tipoCliente', EntityType::class, [
            'class' => TipoCliente::class,
            'choice_label' => function ($data) {
                return $data->getId() .' - '.$data->getTipo();
            },
            'label' => 'TipoCliente',
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
