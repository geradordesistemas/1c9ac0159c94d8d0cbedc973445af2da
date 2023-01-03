<?php
namespace App\Application\Internit\DownloadBundle\Admin;

use App\Application\Internit\DownloadBundle\Entity\Download;
use App\Application\Internit\ClienteBundle\Entity\Cliente;
use App\Application\Internit\SonataMediaGalleryBundle\Entity\SonataMediaGallery;

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
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;

final class DownloadAdmin extends BaseAdmin
{

    public function toString(object $object): string
    {
        return $object instanceof Download ? $object->getId().''
        
        : '';
    }



    protected function configureFormFields(FormMapper $form): void
    {
        $form->tab('Geral');
            $form->with('Informações Gerais');


                $form->add('titulo',  TextType::class, [
                    'label' => 'Titulo',
                    'required' =>  true ,
                    
                ]);

                $form->add('descricao',  TextareaType::class, [
                    'label' => 'Descricao',
                    'required' =>  false ,
                    
                ]);

                $form->add('visivel',  CheckboxType::class, [
                    'label' => 'Visivel',
                    'required' =>  false ,
                    
                ]);

                $form->add('clientes', ModelAutocompleteType::class, [
                    'property' => 'id',
                    'placeholder' => 'Escolha o Clientes',
                    'help' => 'Filtros para pesquisa: [ id, nome, sobrenome, cpf, telefone, celular,  ] - Exemplo de utilização: [ filtro=texto_pesquisa ]',
                    'minimum_input_length' => 0,
                    'items_per_page' => 10,
                    'quiet_millis' => 100,
                    'multiple' =>  true ,
                    'required' =>  false ,
                    'to_string_callback' => function($entity, $property) {
                        return $entity->getId() .' - '.$entity->getNome().' - '.$entity->getSobrenome();
                    },
                    'callback' => static function (AdminInterface $admin, string $property, string $value): void {
                        $property = strtolower($property);
                        $value = strtolower($value);
                        $datagrid = $admin->getDatagrid();
                        $valueParts = explode('=', $value);
                        if (count($valueParts) === 2 && in_array($valueParts[0], [ "id","nome","sobrenome","cpf","telefone","celular", ]))
                        [$property, $value] = $valueParts;

                        $datagrid->setValue($datagrid->getFilter($property)->getFormName(), null, $value);
                    },
                ]);

                $form->add('arquivos', ModelListType::class,[
                    'label' => 'Arquivos: ',
                ]);

            $form->end();
        $form->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagrid): void
    {
        $datagrid->add('id', null, [
            'label' => 'Id',
        ]);

        $datagrid->add('titulo', null, [
            'label' => 'Titulo',
        ]);

        $datagrid->add('descricao', null, [
            'label' => 'Descricao',
        ]);

        $datagrid->add('visivel', null, [
            'label' => 'Visivel',
        ]);

        $datagrid->add('clientes', ModelFilter::class, [
            'label' => 'Clientes',
            'field_options' => [
                'multiple' => true,
                'choice_label'=> function (Cliente $clientes) {
                    return $clientes->getId()
                    .' - '.$clientes->getNome()
                    .' - '.$clientes->getSobrenome()
                    ;
                },
            ],
        ]);


    }

    protected function configureListFields(ListMapper $list): void
    {

        $list->addIdentifier('id', null, [
            'label' => 'Id',
                                                            
        ]);


        $list->addIdentifier('titulo', null, [
            'label' => 'Titulo',
                                                            
        ]);


        $list->addIdentifier('descricao', null, [
            'label' => 'Descricao',
                                                            
        ]);


        $list->add('visivel', null, [
            'label' => 'Visivel',
                                                'editable' => true,            'inverse' => false,
        ]);


        $list->add('clientes', null, [
            'label' => 'Clientes',
            'associated_property' => function (Cliente $clientes) {
                return $clientes->getId()
                .' - '.$clientes->getNome()
                .' - '.$clientes->getSobrenome()
                ;
            },
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

                $show->add('titulo', null, [
                    'label' => 'Titulo',
                                                            
                ]);

                $show->add('descricao', null, [
                    'label' => 'Descricao',
                                                            
                ]);

                $show->add('visivel', null, [
                    'label' => 'Visivel',
                                                            
                ]);

                $show->add('clientes', null, [
                    'label' => 'Clientes',
                    'associated_property' => function (Cliente $clientes) {
                        return $clientes->getId()
                        .' - '.$clientes->getNome()
                        .' - '.$clientes->getSobrenome()
                        ;
                    },
                ]);



            $show->end();
        $show->end();
    }


}