<?php

namespace App\Application\Internit\PerguntaFrequenteBundle\Form;

use App\Application\Internit\PerguntaFrequenteBundle\Entity\PerguntaFrequente;
use App\Application\Internit\TopicoBundle\Entity\Topico;

use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\OptionsResolver\OptionsResolver;

/** Components Form */
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;


class PerguntaFrequenteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {


        $builder->add('pergunta', TextareaType::class, [
            'label' => 'Pergunta',
            'required' =>  true ,
            'attr' => ['class' => ' form-control mb-2 '],
            
        ]);

        $builder->add('resposta', TextareaType::class, [
            'label' => 'Resposta',
            'required' =>  true ,
            'attr' => ['class' => ' form-control mb-2 '],
            
        ]);

        $builder->add('visivel', CheckboxType::class, [
            'label' => 'Visivel',
            'required' =>  false ,
            'attr' => ['class' => 'form-check-input'],
            
        ]);

        $builder->add('topico', EntityType::class, [
            'class' => Topico::class,
            'choice_label' => function ($data) {
                return $data->getId() .' - '.$data->getNome();
            },
            'label' => 'Topico',
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
