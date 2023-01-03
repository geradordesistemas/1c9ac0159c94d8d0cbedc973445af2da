<?php
namespace App\Application\Internit\SacBundle\Admin;

use App\Application\Internit\SacBundle\Entity\Sac;
use App\Application\Internit\DepartamentoBundle\Entity\Departamento;
use App\Application\Internit\UnidadeBundle\Entity\Unidade;
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
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;

final class SacAdmin extends BaseAdmin
{

    public function toString(object $object): string
    {
        return $object instanceof Sac ? $object->getId().''
        
        : '';
    }



    protected function configureFormFields(FormMapper $form): void
    {
        $form->tab('Geral');
            $form->with('Informações Gerais');


                $form->add('assunto',  TextareaType::class, [
                    'label' => 'Assunto',
                    'required' =>  true ,
                    
                ]);

                $form->add('mensagem',  TextareaType::class, [
                    'label' => 'Mensagem',
                    'required' =>  true ,
                    
                ]);

                $form->add('departamento', ModelAutocompleteType::class, [
                    'property' => 'id',
                    'placeholder' => 'Escolha o Departamento',
                    'help' => 'Filtros para pesquisa: [ id, nome, email, visivel,  ] - Exemplo de utilização: [ filtro=texto_pesquisa ]',
                    'minimum_input_length' => 0,
                    'items_per_page' => 10,
                    'quiet_millis' => 100,
                    'multiple' =>  false ,
                    'required' =>  false ,
                    'to_string_callback' => function($entity, $property) {
                        return $entity->getId() .' - '.$entity->getNome();
                    },
                    'callback' => static function (AdminInterface $admin, string $property, string $value): void {
                        $property = strtolower($property);
                        $value = strtolower($value);
                        $datagrid = $admin->getDatagrid();
                        $valueParts = explode('=', $value);
                        if (count($valueParts) === 2 && in_array($valueParts[0], [ "id","nome","email","visivel", ]))
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

                $form->add('anexo', ModelListType::class,[
                    'label' => 'Anexo: ',
                ]);

            $form->end();
        $form->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagrid): void
    {
        $datagrid->add('id', null, [
            'label' => 'Id',
        ]);

        $datagrid->add('assunto', null, [
            'label' => 'Assunto',
        ]);

        $datagrid->add('mensagem', null, [
            'label' => 'Mensagem',
        ]);

        $datagrid->add('departamento', ModelFilter::class, [
            'label' => 'Departamento',
            'field_options' => [
                'multiple' => true,
                'choice_label'=> function (Departamento $departamento) {
                    return $departamento->getId()
                    .' - '.$departamento->getNome()
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


    }

    protected function configureListFields(ListMapper $list): void
    {

        $list->addIdentifier('id', null, [
            'label' => 'Id',
                                                            
        ]);


        $list->addIdentifier('assunto', null, [
            'label' => 'Assunto',
                                                            
        ]);


        $list->addIdentifier('mensagem', null, [
            'label' => 'Mensagem',
                                                            
        ]);


        $list->add('departamento', null, [
            'label' => 'Departamento',
            'associated_property' => function (Departamento $departamento) {
                return $departamento->getId()
                .' - '.$departamento->getNome()
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


        $list->add('cliente', null, [
            'label' => 'Cliente',
            'associated_property' => function (Cliente $cliente) {
                return $cliente->getId()
                .' - '.$cliente->getNome()
                .' - '.$cliente->getSobrenome()
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

                $show->add('assunto', null, [
                    'label' => 'Assunto',
                                                            
                ]);

                $show->add('mensagem', null, [
                    'label' => 'Mensagem',
                                                            
                ]);

                $show->add('departamento', null, [
                    'label' => 'Departamento',
                    'associated_property' => function (Departamento $departamento) {
                        return $departamento->getId()
                        .' - '.$departamento->getNome()
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

                $show->add('cliente', null, [
                    'label' => 'Cliente',
                    'associated_property' => function (Cliente $cliente) {
                        return $cliente->getId()
                        .' - '.$cliente->getNome()
                        .' - '.$cliente->getSobrenome()
                        ;
                    },
                ]);



            $show->end();
        $show->end();
    }


}