<?php
namespace App\Application\Internit\EmpresaBundle\Admin;

use App\Application\Internit\EmpresaBundle\Entity\Empresa;
use App\Application\Internit\SonataMediaMediaBundle\Entity\SonataMediaMedia;

use App\Application\Project\ContentBundle\Admin\Base\BaseAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

/** Components Form */
use Sonata\DoctrineORMAdminBundle\Filter\ModelFilter;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;

final class EmpresaAdmin extends BaseAdmin
{

    public function toString(object $object): string
    {
        return $object instanceof Empresa ? $object->getId().''
        
        : '';
    }



    protected function configureFormFields(FormMapper $form): void
    {
        $form->tab('Geral');
            $form->with('Informações Gerais');


                $form->add('nome',  TextType::class, [
                    'label' => 'Nome',
                    'required' =>  true ,
                    
                ]);

                $form->add('email',  TextType::class, [
                    'label' => 'Email',
                    'required' =>  true ,
                    
                ]);

                $form->add('telefone',  TextType::class, [
                    'label' => 'Telefone',
                    'required' =>  false ,
                    
                ]);

                $form->add('cep',  TextType::class, [
                    'label' => 'Cep',
                    'required' =>  false ,
                    
                ]);

                $form->add('estado',  TextType::class, [
                    'label' => 'Estado',
                    'required' =>  false ,
                    
                ]);

                $form->add('cidade',  TextType::class, [
                    'label' => 'Cidade',
                    'required' =>  false ,
                    
                ]);

                $form->add('bairro',  TextType::class, [
                    'label' => 'Bairro',
                    'required' =>  false ,
                    
                ]);

                $form->add('rua',  TextType::class, [
                    'label' => 'Rua',
                    'required' =>  false ,
                    
                ]);

                $form->add('numero',  TextType::class, [
                    'label' => 'Numero',
                    'required' =>  false ,
                    
                ]);

                $form->add('complemento',  TextType::class, [
                    'label' => 'Complemento',
                    'required' =>  false ,
                    
                ]);

                $form->add('logo', ModelListType::class,[
                    'label' => 'Logo: ',
                ]);

            $form->end();
        $form->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagrid): void
    {
        $datagrid->add('id', null, [
            'label' => 'Id',
        ]);

        $datagrid->add('nome', null, [
            'label' => 'Nome',
        ]);

        $datagrid->add('email', null, [
            'label' => 'Email',
        ]);

        $datagrid->add('telefone', null, [
            'label' => 'Telefone',
        ]);

        $datagrid->add('cep', null, [
            'label' => 'Cep',
        ]);

        $datagrid->add('estado', null, [
            'label' => 'Estado',
        ]);

        $datagrid->add('cidade', null, [
            'label' => 'Cidade',
        ]);

        $datagrid->add('bairro', null, [
            'label' => 'Bairro',
        ]);

        $datagrid->add('rua', null, [
            'label' => 'Rua',
        ]);

        $datagrid->add('numero', null, [
            'label' => 'Numero',
        ]);

        $datagrid->add('complemento', null, [
            'label' => 'Complemento',
        ]);


    }

    protected function configureListFields(ListMapper $list): void
    {

        $list->addIdentifier('id', null, [
            'label' => 'Id',
                                                            
        ]);


        $list->addIdentifier('nome', null, [
            'label' => 'Nome',
                                                            
        ]);


        $list->addIdentifier('email', null, [
            'label' => 'Email',
                                                            
        ]);


        $list->addIdentifier('telefone', null, [
            'label' => 'Telefone',
                                                            
        ]);


        $list->addIdentifier('cep', null, [
            'label' => 'Cep',
                                                            
        ]);


        $list->addIdentifier('estado', null, [
            'label' => 'Estado',
                                                            
        ]);


        $list->addIdentifier('cidade', null, [
            'label' => 'Cidade',
                                                            
        ]);


        $list->addIdentifier('bairro', null, [
            'label' => 'Bairro',
                                                            
        ]);


        $list->addIdentifier('rua', null, [
            'label' => 'Rua',
                                                            
        ]);


        $list->addIdentifier('numero', null, [
            'label' => 'Numero',
                                                            
        ]);


        $list->addIdentifier('complemento', null, [
            'label' => 'Complemento',
                                                            
        ]);




        $list->add(ListMapper::NAME_ACTIONS, ListMapper::TYPE_ACTIONS, [
            'actions' => [
                'show'   => [],
                'edit'   => [],
                'delete' => [],
            ]
        ]);

    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show->tab('Geral');
            $show->with('Informações Gerais', [
                'class'       => 'col-md-12',
                'box_class'   => 'box box-solid box-primary',
                'description' => 'Informações Gerais',
            ]);

                $show->add('id', null, [
                    'label' => 'Id',
                                                            
                ]);

                $show->add('nome', null, [
                    'label' => 'Nome',
                                                            
                ]);

                $show->add('email', null, [
                    'label' => 'Email',
                                                            
                ]);

                $show->add('telefone', null, [
                    'label' => 'Telefone',
                                                            
                ]);

                $show->add('cep', null, [
                    'label' => 'Cep',
                                                            
                ]);

                $show->add('estado', null, [
                    'label' => 'Estado',
                                                            
                ]);

                $show->add('cidade', null, [
                    'label' => 'Cidade',
                                                            
                ]);

                $show->add('bairro', null, [
                    'label' => 'Bairro',
                                                            
                ]);

                $show->add('rua', null, [
                    'label' => 'Rua',
                                                            
                ]);

                $show->add('numero', null, [
                    'label' => 'Numero',
                                                            
                ]);

                $show->add('complemento', null, [
                    'label' => 'Complemento',
                                                            
                ]);



            $show->end();
        $show->end();
    }


}