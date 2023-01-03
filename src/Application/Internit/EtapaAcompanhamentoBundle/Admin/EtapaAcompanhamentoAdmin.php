<?php
namespace App\Application\Internit\EtapaAcompanhamentoBundle\Admin;

use App\Application\Internit\EtapaAcompanhamentoBundle\Entity\EtapaAcompanhamento;
use App\Application\Internit\EtapaBundle\Entity\Etapa;
use App\Application\Internit\AcompanhamentoBundle\Entity\Acompanhamento;

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
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;

final class EtapaAcompanhamentoAdmin extends BaseAdmin
{

    public function toString(object $object): string
    {
        return $object instanceof EtapaAcompanhamento ? $object->getId().''
        
        : '';
    }



    protected function configureFormFields(FormMapper $form): void
    {
        $form->tab('Geral');
            $form->with('Informações Gerais');


                $form->add('porcentagem',  IntegerType::class, [
                    'label' => 'Porcentagem',
                    'required' =>  true ,
                    
                ]);

                $form->add('visivel',  CheckboxType::class, [
                    'label' => 'Visivel',
                    'required' =>  false ,
                    
                ]);

                $form->add('etapa', ModelAutocompleteType::class, [
                    'property' => 'id',
                    'placeholder' => 'Escolha o Etapa',
                    'help' => 'Filtros para pesquisa: [ id, etapa,  ] - Exemplo de utilização: [ filtro=texto_pesquisa ]',
                    'minimum_input_length' => 0,
                    'items_per_page' => 10,
                    'quiet_millis' => 100,
                    'multiple' =>  false ,
                    'required' =>  false ,
                    'to_string_callback' => function($entity, $property) {
                        return $entity->getId() .' - '.$entity->getEtapa();
                    },
                    'callback' => static function (AdminInterface $admin, string $property, string $value): void {
                        $property = strtolower($property);
                        $value = strtolower($value);
                        $datagrid = $admin->getDatagrid();
                        $valueParts = explode('=', $value);
                        if (count($valueParts) === 2 && in_array($valueParts[0], [ "id","etapa", ]))
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

        $datagrid->add('porcentagem', null, [
            'label' => 'Porcentagem',
        ]);

        $datagrid->add('visivel', null, [
            'label' => 'Visivel',
        ]);

        $datagrid->add('etapa', ModelFilter::class, [
            'label' => 'Etapa',
            'field_options' => [
                'multiple' => true,
                'choice_label'=> function (Etapa $etapa) {
                    return $etapa->getId()
                    .' - '.$etapa->getEtapa()
                    ;
                },
            ],
        ]);

    $datagrid->add('acompanhamentos', ModelFilter::class, [
        'label' => 'Acompanhamentos',
        'field_options' => [
            'multiple' => true,
            'choice_label'=> function (Acompanhamento $acompanhamentos) {
                return $acompanhamentos->getId()
                .' - '.$acompanhamentos->getNome()
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


        $list->addIdentifier('porcentagem', null, [
            'label' => 'Porcentagem',
                                                            
        ]);


        $list->add('visivel', null, [
            'label' => 'Visivel',
                                                'editable' => true,            'inverse' => false,
        ]);


        $list->add('etapa', null, [
            'label' => 'Etapa',
            'associated_property' => function (Etapa $etapa) {
                return $etapa->getId()
                .' - '.$etapa->getEtapa()
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

                $show->add('porcentagem', null, [
                    'label' => 'Porcentagem',
                                                            
                ]);

                $show->add('visivel', null, [
                    'label' => 'Visivel',
                                                            
                ]);

                $show->add('etapa', null, [
                    'label' => 'Etapa',
                    'associated_property' => function (Etapa $etapa) {
                        return $etapa->getId()
                        .' - '.$etapa->getEtapa()
                        ;
                    },
                ]);



            $show->end();
        $show->end();
    }


}