<?php

namespace App\Application\Internit\RespostaSolicitacaoBundle\Form;

use App\Application\Internit\RespostaSolicitacaoBundle\Entity\RespostaSolicitacao;
use App\Application\Internit\AndamentoSolicitacaoBundle\Entity\AndamentoSolicitacao;

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
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;


class RespostaSolicitacaoType extends AbstractType
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
