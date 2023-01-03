<?php

namespace App\Application\Internit\DiaIndisponivelAgendamentoBundle\Form;

use App\Application\Internit\DiaIndisponivelAgendamentoBundle\Entity\DiaIndisponivelAgendamento;

use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\OptionsResolver\OptionsResolver;

/** Components Form */
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;


class DiaIndisponivelAgendamentoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {


        $builder->add('data', DateType::class, [
            'label' => 'Data',
            'required' =>  true ,
            'attr' => ['class' => ' form-control mb-2 '],
            'widget' => 'single_text',
        ]);

        $builder->add('descricao', TextType::class, [
            'label' => 'Descricao',
            'required' =>  false ,
            'attr' => ['class' => ' form-control mb-2 '],
            
        ]);

        $builder->add('feriado', CheckboxType::class, [
            'label' => 'Feriado',
            'required' =>  false ,
            'attr' => ['class' => 'form-check-input'],
            
        ]);

        $builder->add('indisponivel', CheckboxType::class, [
            'label' => 'Indisponivel',
            'required' =>  false ,
            'attr' => ['class' => 'form-check-input'],
            
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
