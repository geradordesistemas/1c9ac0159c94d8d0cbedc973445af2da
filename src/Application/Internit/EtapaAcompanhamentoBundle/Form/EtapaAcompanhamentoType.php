<?php

namespace App\Application\Internit\EtapaAcompanhamentoBundle\Form;

use App\Application\Internit\EtapaAcompanhamentoBundle\Entity\EtapaAcompanhamento;
use App\Application\Internit\EtapaBundle\Entity\Etapa;
use App\Application\Internit\AcompanhamentoBundle\Entity\Acompanhamento;

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


class EtapaAcompanhamentoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {


        $builder->add('porcentagem', IntegerType::class, [
            'label' => 'Porcentagem',
            'required' =>  true ,
            'attr' => ['class' => ' form-control mb-2 '],
            
        ]);

        $builder->add('visivel', CheckboxType::class, [
            'label' => 'Visivel',
            'required' =>  false ,
            'attr' => ['class' => 'form-check-input'],
            
        ]);

        $builder->add('etapa', EntityType::class, [
            'class' => Etapa::class,
            'choice_label' => function ($data) {
                return $data->getId() .' - '.$data->getEtapa();
            },
            'label' => 'Etapa',
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
