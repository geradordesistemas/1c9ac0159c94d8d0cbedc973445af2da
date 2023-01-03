<?php
namespace App\Application\Internit\PeriodoDisponivelAgendamentoBundle\Admin;

use App\Application\Internit\PeriodoDisponivelAgendamentoBundle\Entity\PeriodoDisponivelAgendamento;
use App\Application\Internit\DiaSemanaBundle\Entity\DiaSemana;
use App\Application\Internit\PeriodoAgendamentoBundle\Entity\PeriodoAgendamento;

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

final class PeriodoDisponivelAgendamentoAdmin extends BaseAdmin
{

    public function toString(object $object): string
    {
        return $object instanceof PeriodoDisponivelAgendamento ? $object->getId().''
        
        : '';
    }



    protected function configureFormFields(FormMapper $form): void
    {
        $form->tab('Geral');
            $form->with('Informações Gerais');


                $form->add('quatidadeAgendamentos',  IntegerType::class, [
                    'label' => 'Quatidadeagendamentos',
                    'required' =>  true ,
                    
                ]);

                $form->add('disponivel',  CheckboxType::class, [
                    'label' => 'Disponivel',
                    'required' =>  false ,
                    
                ]);

                $form->add('diaSemana', ModelAutocompleteType::class, [
                    'property' => 'id',
                    'placeholder' => 'Escolha o DiaSemana',
                    'help' => 'Filtros para pesquisa: [ id, dia, diaSemana,  ] - Exemplo de utilização: [ filtro=texto_pesquisa ]',
                    'minimum_input_length' => 0,
                    'items_per_page' => 10,
                    'quiet_millis' => 100,
                    'multiple' =>  false ,
                    'required' =>  false ,
                    'to_string_callback' => function($entity, $property) {
                        return $entity->getId() .' - '.$entity->getDiaSemana();
                    },
                    'callback' => static function (AdminInterface $admin, string $property, string $value): void {
                        $property = strtolower($property);
                        $value = strtolower($value);
                        $datagrid = $admin->getDatagrid();
                        $valueParts = explode('=', $value);
                        if (count($valueParts) === 2 && in_array($valueParts[0], [ "id","dia","diaSemana", ]))
                        [$property, $value] = $valueParts;

                        $datagrid->setValue($datagrid->getFilter($property)->getFormName(), null, $value);
                    },
                ]);

                $form->add('periodoAgendamento', ModelAutocompleteType::class, [
                    'property' => 'id',
                    'placeholder' => 'Escolha o PeriodoAgendamento',
                    'help' => 'Filtros para pesquisa: [ id, periodo, visivel,  ] - Exemplo de utilização: [ filtro=texto_pesquisa ]',
                    'minimum_input_length' => 0,
                    'items_per_page' => 10,
                    'quiet_millis' => 100,
                    'multiple' =>  false ,
                    'required' =>  false ,
                    'to_string_callback' => function($entity, $property) {
                        return $entity->getId() .' - '.$entity->getPeriodo();
                    },
                    'callback' => static function (AdminInterface $admin, string $property, string $value): void {
                        $property = strtolower($property);
                        $value = strtolower($value);
                        $datagrid = $admin->getDatagrid();
                        $valueParts = explode('=', $value);
                        if (count($valueParts) === 2 && in_array($valueParts[0], [ "id","periodo","visivel", ]))
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

        $datagrid->add('quatidadeAgendamentos', null, [
            'label' => 'Quatidadeagendamentos',
        ]);

        $datagrid->add('disponivel', null, [
            'label' => 'Disponivel',
        ]);

        $datagrid->add('diaSemana', ModelFilter::class, [
            'label' => 'DiaSemana',
            'field_options' => [
                'multiple' => true,
                'choice_label'=> function (DiaSemana $diaSemana) {
                    return $diaSemana->getId()
                    .' - '.$diaSemana->getDiaSemana()
                    ;
                },
            ],
        ]);

        $datagrid->add('periodoAgendamento', ModelFilter::class, [
            'label' => 'PeriodoAgendamento',
            'field_options' => [
                'multiple' => true,
                'choice_label'=> function (PeriodoAgendamento $periodoAgendamento) {
                    return $periodoAgendamento->getId()
                    .' - '.$periodoAgendamento->getPeriodo()
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


        $list->addIdentifier('quatidadeAgendamentos', null, [
            'label' => 'Quatidadeagendamentos',
                                                            
        ]);


        $list->add('disponivel', null, [
            'label' => 'Disponivel',
                                                'editable' => true,            'inverse' => false,
        ]);


        $list->add('diaSemana', null, [
            'label' => 'DiaSemana',
            'associated_property' => function (DiaSemana $diaSemana) {
                return $diaSemana->getId()
                .' - '.$diaSemana->getDiaSemana()
                ;
            },
        ]);


        $list->add('periodoAgendamento', null, [
            'label' => 'PeriodoAgendamento',
            'associated_property' => function (PeriodoAgendamento $periodoAgendamento) {
                return $periodoAgendamento->getId()
                .' - '.$periodoAgendamento->getPeriodo()
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

                $show->add('quatidadeAgendamentos', null, [
                    'label' => 'Quatidadeagendamentos',
                                                            
                ]);

                $show->add('disponivel', null, [
                    'label' => 'Disponivel',
                                                            
                ]);

                $show->add('diaSemana', null, [
                    'label' => 'DiaSemana',
                    'associated_property' => function (DiaSemana $diaSemana) {
                        return $diaSemana->getId()
                        .' - '.$diaSemana->getDiaSemana()
                        ;
                    },
                ]);

                $show->add('periodoAgendamento', null, [
                    'label' => 'PeriodoAgendamento',
                    'associated_property' => function (PeriodoAgendamento $periodoAgendamento) {
                        return $periodoAgendamento->getId()
                        .' - '.$periodoAgendamento->getPeriodo()
                        ;
                    },
                ]);


            $show->end();
        $show->end();
    }


}