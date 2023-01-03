<?php

namespace App\Application\Internit\ClienteBundle\Form;

use App\Application\Internit\ClienteBundle\Entity\Cliente;
use App\Application\Internit\UnidadeClienteBundle\Entity\UnidadeCliente;
use App\Application\Internit\DownloadBundle\Entity\Download;
use App\Application\Internit\ComunicadoBundle\Entity\Comunicado;

use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\OptionsResolver\OptionsResolver;

/** Components Form */
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;


class ClienteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {


        $builder->add('nome', TextType::class, [
            'label' => 'Nome',
            'required' =>  true ,
            'attr' => ['class' => ' form-control mb-2 '],
            
        ]);

        $builder->add('sobrenome', TextType::class, [
            'label' => 'Sobrenome',
            'required' =>  true ,
            'attr' => ['class' => ' form-control mb-2 '],
            
        ]);

        $builder->add('cpf', TextType::class, [
            'label' => 'Cpf',
            'required' =>  true ,
            'attr' => ['class' => ' form-control mb-2 '],
            
        ]);

        $builder->add('telefone', TextType::class, [
            'label' => 'Telefone',
            'required' =>  false ,
            'attr' => ['class' => ' form-control mb-2 '],
            
        ]);

        $builder->add('celular', TextType::class, [
            'label' => 'Celular',
            'required' =>  false ,
            'attr' => ['class' => ' form-control mb-2 '],
            
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
