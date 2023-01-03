<?php
namespace App\Application\Internit\AcompanhamentoBundle\Admin;

use App\Application\Internit\AcompanhamentoBundle\Entity\Acompanhamento;
use App\Application\Internit\EmpreendimentoBundle\Entity\Empreendimento;
use App\Application\Internit\EtapaAcompanhamentoBundle\Entity\EtapaAcompanhamento;

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

final class AcompanhamentoAdmin extends BaseAdmin
{

    public function toString(object $object): string
    {
        return $object instanceof Acompanhamento ? $object->getId().''
        
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

                $form->add('descricao',  TextareaType::class, [
                    'label' => 'Descricao',
                    'required' =>  false ,
                    
                ]);

                $form->add('visivel',  CheckboxType::class, [
                    'label' => 'Visivel',
                    'required' =>  false ,
                    
                ]);

                $form->add('empreendimento', ModelAutocompleteType::class, [
                    'property' => 'id',
                    'placeholder' => 'Escolha o Empreendimento',
                    'help' => 'Filtros para pesquisa: [ id, nome, descricao, visivel,  ] - Exemplo de utilização: [ filtro=texto_pesquisa ]',
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
                        if (count($valueParts) === 2 && in_array($valueParts[0], [ "id","nome","descricao","visivel", ]))
                        [$property, $value] = $valueParts;

                        $datagrid->setValue($datagrid->getFilter($property)->getFormName(), null, $value);
                    },
                ]);

                $form->add('etapaAcompanhamento', ModelAutocompleteType::class, [
                    'property' => 'id',
                    'placeholder' => 'Escolha o EtapaAcompanhamento',
                    'help' => 'Filtros para pesquisa: [ id, porcentagem, visivel,  ] - Exemplo de utilização: [ filtro=texto_pesquisa ]',
                    'minimum_input_length' => 0,
                    'items_per_page' => 10,
                    'quiet_millis' => 100,
                    'multiple' =>  false ,
                    'required' =>  false ,
                    'to_string_callback' => function($entity, $property) {
                        return $entity->getId() ;
                    },
                    'callback' => static function (AdminInterface $admin, string $property, string $value): void {
                        $property = strtolower($property);
                        $value = strtolower($value);
                        $datagrid = $admin->getDatagrid();
                        $valueParts = explode('=', $value);
                        if (count($valueParts) === 2 && in_array($valueParts[0], [ "id","porcentagem","visivel", ]))
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

        $datagrid->add('nome', null, [
            'label' => 'Nome',
        ]);

        $datagrid->add('descricao', null, [
            'label' => 'Descricao',
        ]);

        $datagrid->add('visivel', null, [
            'label' => 'Visivel',
        ]);

        $datagrid->add('empreendimento', ModelFilter::class, [
            'label' => 'Empreendimento',
            'field_options' => [
                'multiple' => true,
                'choice_label'=> function (Empreendimento $empreendimento) {
                    return $empreendimento->getId()
                    .' - '.$empreendimento->getNome()
                    ;
                },
            ],
        ]);

        $datagrid->add('etapaAcompanhamento', ModelFilter::class, [
            'label' => 'EtapaAcompanhamento',
            'field_options' => [
                'multiple' => true,
                'choice_label'=> function (EtapaAcompanhamento $etapaAcompanhamento) {
                    return $etapaAcompanhamento->getId()
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


        $list->addIdentifier('nome', null, [
            'label' => 'Nome',
                                                            
        ]);


        $list->addIdentifier('descricao', null, [
            'label' => 'Descricao',
                                                            
        ]);


        $list->add('visivel', null, [
            'label' => 'Visivel',
                                                'editable' => true,            'inverse' => false,
        ]);


        $list->add('empreendimento', null, [
            'label' => 'Empreendimento',
            'associated_property' => function (Empreendimento $empreendimento) {
                return $empreendimento->getId()
                .' - '.$empreendimento->getNome()
                ;
            },
        ]);


        $list->add('etapaAcompanhamento', null, [
            'label' => 'EtapaAcompanhamento',
            'associated_property' => function (EtapaAcompanhamento $etapaAcompanhamento) {
                return $etapaAcompanhamento->getId()
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

                $show->add('nome', null, [
                    'label' => 'Nome',
                                                            
                ]);

                $show->add('descricao', null, [
                    'label' => 'Descricao',
                                                            
                ]);

                $show->add('visivel', null, [
                    'label' => 'Visivel',
                                                            
                ]);

                $show->add('empreendimento', null, [
                    'label' => 'Empreendimento',
                    'associated_property' => function (Empreendimento $empreendimento) {
                        return $empreendimento->getId()
                        .' - '.$empreendimento->getNome()
                        ;
                    },
                ]);

                $show->add('etapaAcompanhamento', null, [
                    'label' => 'EtapaAcompanhamento',
                    'associated_property' => function (EtapaAcompanhamento $etapaAcompanhamento) {
                        return $etapaAcompanhamento->getId()
                        ;
                    },
                ]);


            $show->end();
        $show->end();
    }


}