<?php

namespace App\Application\Internit\AgendamentoBundle\Form;

use App\Application\Internit\AgendamentoBundle\Entity\Agendamento;
use App\Application\Internit\PeriodoAgendamentoBundle\Entity\PeriodoAgendamento;
use App\Application\Internit\AndamentoSolicitacaoBundle\Entity\AndamentoSolicitacao;
use App\Application\Internit\ProfissionalBundle\Entity\Profissional;

use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\OptionsResolver\OptionsResolver;

/** Components Form */
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;


class AgendamentoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {


        $builder->add('data', DateType::class, [
            'label' => 'Data',
            'required' =>  true ,
            'attr' => ['class' => ' form-control mb-2 '],
            'widget' => 'single_text',
        ]);

        $builder->add('observacoes', TextareaType::class, [
            'label' => 'Observacoes',
            'required' =>  true ,
            'attr' => ['class' => ' form-control mb-2 '],
            
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

        $builder->add('andamentoSolicitacao', EntityType::class, [
            'class' => AndamentoSolicitacao::class,
            'choice_label' => function ($data) {
                return $data->getId() .' - '.$data->getAssunto();
            },
            'label' => 'AndamentoSolicitacao',
            'required' =>  false ,
            'multiple' =>  false ,
            'attr' => ['class' => 'form-control mb-2 form-select'],
        ]);

        $builder->add('profissionais', EntityType::class, [
            'class' => Profissional::class,
            'choice_label' => function ($data) {
                return $data->getId() .' - '.$data->getNomeCompleto();
            },
            'label' => 'Profissionais',
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
