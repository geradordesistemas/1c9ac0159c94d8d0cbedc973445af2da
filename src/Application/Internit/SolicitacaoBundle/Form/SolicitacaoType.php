<?php

namespace App\Application\Internit\SolicitacaoBundle\Form;

use App\Application\Internit\SolicitacaoBundle\Entity\Solicitacao;
use App\Application\Internit\TipoSolicitacaoBundle\Entity\TipoSolicitacao;
use App\Application\Internit\PeriodoAgendamentoBundle\Entity\PeriodoAgendamento;
use App\Application\Internit\AndamentoSolicitacaoBundle\Entity\AndamentoSolicitacao;
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
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;


class SolicitacaoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {


        $builder->add('assunto', TextType::class, [
            'label' => 'Assunto',
            'required' =>  true ,
            'attr' => ['class' => ' form-control mb-2 '],
            
        ]);

        $builder->add('mensagem', TextareaType::class, [
            'label' => 'Mensagem',
            'required' =>  true ,
            'attr' => ['class' => ' form-control mb-2 '],
            
        ]);

        $builder->add('data', DateType::class, [
            'label' => 'Data',
            'required' =>  true ,
            'attr' => ['class' => ' form-control mb-2 '],
            'widget' => 'single_text',
        ]);

        $builder->add('tipoSolicitacao', EntityType::class, [
            'class' => TipoSolicitacao::class,
            'choice_label' => function ($data) {
                return $data->getId() .' - '.$data->getTipo();
            },
            'label' => 'TipoSolicitacao',
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
