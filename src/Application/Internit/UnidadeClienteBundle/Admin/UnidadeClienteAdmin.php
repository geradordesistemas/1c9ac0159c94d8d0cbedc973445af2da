<?php
namespace App\Application\Internit\UnidadeClienteBundle\Admin;

use App\Application\Internit\UnidadeClienteBundle\Entity\UnidadeCliente;
use App\Application\Internit\TipoClienteBundle\Entity\TipoCliente;
use App\Application\Internit\ClienteBundle\Entity\Cliente;
use App\Application\Internit\UnidadeBundle\Entity\Unidade;

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
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;

final class UnidadeClienteAdmin extends BaseAdmin
{

    public function toString(object $object): string
    {
        return $object instanceof UnidadeCliente ? $object->getId().''
        
        : '';
    }



    protected function configureFormFields(FormMapper $form): void
    {
        $form->tab('Geral');
            $form->with('Informações Gerais');


                $form->add('tipoCliente', ModelAutocompleteType::class, [
                    'property' => 'id',
                    'placeholder' => 'Escolha o TipoCliente',
                    'help' => 'Filtros para pesquisa: [ id, tipo, descricao,  ] - Exemplo de utilização: [ filtro=texto_pesquisa ]',
                    'minimum_input_length' => 0,
                    'items_per_page' => 10,
                    'quiet_millis' => 100,
                    'multiple' =>  false ,
                    'required' =>  false ,
                    'to_string_callback' => function($entity, $property) {
                        return $entity->getId() .' - '.$entity->getTipo();
                    },
                    'callback' => static function (AdminInterface $admin, string $property, string $value): void {
                        $property = strtolower($property);
                        $value = strtolower($value);
                        $datagrid = $admin->getDatagrid();
                        $valueParts = explode('=', $value);
                        if (count($valueParts) === 2 && in_array($valueParts[0], [ "id","tipo","descricao", ]))
                        [$property, $value] = $valueParts;

                        $datagrid->setValue($datagrid->getFilter($property)->getFormName(), null, $value);
                    },
                ]);

                $form->add('cliente', ModelAutocompleteType::class, [
                    'property' => 'id',
                    'placeholder' => 'Escolha o Cliente',
                    'help' => 'Filtros para pesquisa: [ id, nome, sobrenome, cpf, telefone, celular,  ] - Exemplo de utilização: [ filtro=texto_pesquisa ]',
                    'minimum_input_length' => 0,
                    'items_per_page' => 10,
                    'quiet_millis' => 100,
                    'multiple' =>  false ,
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

                $form->add('unidade', ModelAutocompleteType::class, [
                    'property' => 'id',
                    'placeholder' => 'Escolha o Unidade',
                    'help' => 'Filtros para pesquisa: [ id, unidade, descricao, visivel,  ] - Exemplo de utilização: [ filtro=texto_pesquisa ]',
                    'minimum_input_length' => 0,
                    'items_per_page' => 10,
                    'quiet_millis' => 100,
                    'multiple' =>  false ,
                    'required' =>  false ,
                    'to_string_callback' => function($entity, $property) {
                        return $entity->getId() .' - '.$entity->getUnidade();
                    },
                    'callback' => static function (AdminInterface $admin, string $property, string $value): void {
                        $property = strtolower($property);
                        $value = strtolower($value);
                        $datagrid = $admin->getDatagrid();
                        $valueParts = explode('=', $value);
                        if (count($valueParts) === 2 && in_array($valueParts[0], [ "id","unidade","descricao","visivel", ]))
                        [$property, $value] = $valueParts;

                        $datagrid->setValue($datagrid->getFilter($property)->getFormName(), null, $value);
                    },
                ]);

            $form->end();
        $form->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagrid): void
    {
        $datagrid->add('id', null, [
            'label' => 'Id',
        ]);

        $datagrid->add('tipoCliente', ModelFilter::class, [
            'label' => 'TipoCliente',
            'field_options' => [
                'multiple' => true,
                'choice_label'=> function (TipoCliente $tipoCliente) {
                    return $tipoCliente->getId()
                    .' - '.$tipoCliente->getTipo()
                    ;
                },
            ],
        ]);

        $datagrid->add('cliente', ModelFilter::class, [
            'label' => 'Cliente',
            'field_options' => [
                'multiple' => true,
                'choice_label'=> function (Cliente $cliente) {
                    return $cliente->getId()
                    .' - '.$cliente->getNome()
                    .' - '.$cliente->getSobrenome()
                    ;
                },
            ],
        ]);

        $datagrid->add('unidade', ModelFilter::class, [
            'label' => 'Unidade',
            'field_options' => [
                'multiple' => true,
                'choice_label'=> function (Unidade $unidade) {
                    return $unidade->getId()
                    .' - '.$unidade->getUnidade()
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


        $list->add('tipoCliente', null, [
            'label' => 'TipoCliente',
            'associated_property' => function (TipoCliente $tipoCliente) {
                return $tipoCliente->getId()
                .' - '.$tipoCliente->getTipo()
                ;
            },
        ]);


        $list->add('cliente', null, [
            'label' => 'Cliente',
            'associated_property' => function (Cliente $cliente) {
                return $cliente->getId()
                .' - '.$cliente->getNome()
                .' - '.$cliente->getSobrenome()
                ;
            },
        ]);


        $list->add('unidade', null, [
            'label' => 'Unidade',
            'associated_property' => function (Unidade $unidade) {
                return $unidade->getId()
                .' - '.$unidade->getUnidade()
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

                $show->add('tipoCliente', null, [
                    'label' => 'TipoCliente',
                    'associated_property' => function (TipoCliente $tipoCliente) {
                        return $tipoCliente->getId()
                        .' - '.$tipoCliente->getTipo()
                        ;
                    },
                ]);

                $show->add('cliente', null, [
                    'label' => 'Cliente',
                    'associated_property' => function (Cliente $cliente) {
                        return $cliente->getId()
                        .' - '.$cliente->getNome()
                        .' - '.$cliente->getSobrenome()
                        ;
                    },
                ]);

                $show->add('unidade', null, [
                    'label' => 'Unidade',
                    'associated_property' => function (Unidade $unidade) {
                        return $unidade->getId()
                        .' - '.$unidade->getUnidade()
                        ;
                    },
                ]);


            $show->end();
        $show->end();
    }


}