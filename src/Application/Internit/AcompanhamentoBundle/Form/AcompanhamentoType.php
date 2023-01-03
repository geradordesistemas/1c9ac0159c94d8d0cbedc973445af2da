<?php

namespace App\Application\Internit\AcompanhamentoBundle\Form;

use App\Application\Internit\AcompanhamentoBundle\Entity\Acompanhamento;
use App\Application\Internit\EmpreendimentoBundle\Entity\Empreendimento;
use App\Application\Internit\EtapaAcompanhamentoBundle\Entity\EtapaAcompanhamento;

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
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;


class AcompanhamentoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {


        $builder->add('nome', TextType::class, [
            'label' => 'Nome',
            'required' =>  true ,
            'attr' => ['class' => ' form-control mb-2 '],
            
        ]);

        $builder->add('descricao', TextareaType::class, [
            'label' => 'Descricao',
            'required' =>  false ,
            'attr' => ['class' => ' form-control mb-2 '],
            
        ]);

        $builder->add('visivel', CheckboxType::class, [
            'label' => 'Visivel',
            'required' =>  false ,
            'attr' => ['class' => 'form-check-input'],
            
        ]);

        $builder->add('empreendimento', EntityType::class, [
            'class' => Empreendimento::class,
            'choice_label' => function ($data) {
                return $data->getId() .' - '.$data->getNome();
            },
            'label' => 'Empreendimento',
            'required' =>  false ,
            'multiple' =>  false ,
            'attr' => ['class' => 'form-control mb-2 form-select'],
        ]);

        $builder->add('etapaAcompanhamento', EntityType::class, [
            'class' => EtapaAcompanhamento::class,
            'choice_label' => function ($data) {
                return $data->getId() ;
            },
            'label' => 'EtapaAcompanhamento',
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
