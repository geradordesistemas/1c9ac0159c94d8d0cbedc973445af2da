<?php

namespace App\Application\Internit\AndamentoSolicitacaoBundle\Form;

use App\Application\Internit\AndamentoSolicitacaoBundle\Entity\AndamentoSolicitacao;
use App\Application\Internit\StatusSolicitacaoBundle\Entity\StatusSolicitacao;
use App\Application\Internit\SolicitacaoBundle\Entity\Solicitacao;
use App\Application\Internit\AgendamentoBundle\Entity\Agendamento;
use App\Application\Internit\RespostaSolicitacaoBundle\Entity\RespostaSolicitacao;

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


class AndamentoSolicitacaoType extends AbstractType
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

        $builder->add('visivel', CheckboxType::class, [
            'label' => 'Visivel',
            'required' =>  false ,
            'attr' => ['class' => 'form-check-input'],
            
        ]);

        $builder->add('statusSolicitacao', EntityType::class, [
            'class' => StatusSolicitacao::class,
            'choice_label' => function ($data) {
                return $data->getId() .' - '.$data->getStatus();
            },
            'label' => 'StatusSolicitacao',
            'required' =>  false ,
            'multiple' =>  false ,
            'attr' => ['class' => 'form-control mb-2 form-select'],
        ]);

        $builder->add('solicitacao', EntityType::class, [
            'class' => Solicitacao::class,
            'choice_label' => function ($data) {
                return $data->getId() .' - '.$data->getAssunto();
            },
            'label' => 'Solicitacao',
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
