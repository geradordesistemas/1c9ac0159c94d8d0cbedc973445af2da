<?php

namespace App\Application\Internit\PeriodoDisponivelAgendamentoBundle\Form;

use App\Application\Internit\PeriodoDisponivelAgendamentoBundle\Entity\PeriodoDisponivelAgendamento;
use App\Application\Internit\DiaSemanaBundle\Entity\DiaSemana;
use App\Application\Internit\PeriodoAgendamentoBundle\Entity\PeriodoAgendamento;

use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\OptionsResolver\OptionsResolver;

/** Components Form */
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;


class PeriodoDisponivelAgendamentoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {


        $builder->add('quatidadeAgendamentos', IntegerType::class, [
            'label' => 'Quatidadeagendamentos',
            'required' =>  true ,
            'attr' => ['class' => ' form-control mb-2 '],
            
        ]);

        $builder->add('disponivel', CheckboxType::class, [
            'label' => 'Disponivel',
            'required' =>  false ,
            'attr' => ['class' => 'form-check-input'],
            
        ]);

        $builder->add('diaSemana', EntityType::class, [
            'class' => DiaSemana::class,
            'choice_label' => function ($data) {
                return $data->getId() .' - '.$data->getDiaSemana();
            },
            'label' => 'DiaSemana',
            'required' =>  false ,
            'multiple' =>  false ,
            'attr' => ['class' => 'form-control mb-2 form-select'],
        ]);

        $builder->add('periodoAgendamento', EntityType::class, [
            'class' => PeriodoAgendamento::class,
            'choice_label' => function ($data) {
                return $data->getId() .' - '.$data->getPeriodo();
            },
            'label' => 'PeriodoAgendamento',
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
