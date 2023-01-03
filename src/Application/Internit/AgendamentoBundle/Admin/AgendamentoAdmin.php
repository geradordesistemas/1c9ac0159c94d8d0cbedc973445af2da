<?php
namespace App\Application\Internit\AgendamentoBundle\Admin;

use App\Application\Internit\AgendamentoBundle\Entity\Agendamento;
use App\Application\Internit\PeriodoAgendamentoBundle\Entity\PeriodoAgendamento;
use App\Application\Internit\AndamentoSolicitacaoBundle\Entity\AndamentoSolicitacao;
use App\Application\Internit\ProfissionalBundle\Entity\Profissional;

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
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;

final class AgendamentoAdmin extends BaseAdmin
{

    public function toString(object $object): string
    {
        return $object instanceof Agendamento ? $object->getId().''
        
        : '';
    }



    protected function configureFormFields(FormMapper $form): void
    {
        $form->tab('Geral');
            $form->with('Informações Gerais');


                $form->add('data',  DateType::class, [
                    'label' => 'Data',
                    'required' =>  true ,
                    'widget' => 'single_text',
                ]);

                $form->add('observacoes',  TextareaType::class, [
                    'label' => 'Observacoes',
                    'required' =>  true ,
                    
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

                $form->add('andamentoSolicitacao', ModelAutocompleteType::class, [
                    'property' => 'id',
                    'placeholder' => 'Escolha o AndamentoSolicitacao',
                    'help' => 'Filtros para pesquisa: [ id, assunto, mensagem, visivel,  ] - Exemplo de utilização: [ filtro=texto_pesquisa ]',
                    'minimum_input_length' => 0,
                    'items_per_page' => 10,
                    'quiet_millis' => 100,
                    'multiple' =>  false ,
                    'required' =>  false ,
                    'to_string_callback' => function($entity, $property) {
                        return $entity->getId() .' - '.$entity->getAssunto();
                    },
                    'callback' => static function (AdminInterface $admin, string $property, string $value): void {
                        $property = strtolower($property);
                        $value = strtolower($value);
                        $datagrid = $admin->getDatagrid();
                        $valueParts = explode('=', $value);
                        if (count($valueParts) === 2 && in_array($valueParts[0], [ "id","assunto","mensagem","visivel", ]))
                        [$property, $value] = $valueParts;

                        $datagrid->setValue($datagrid->getFilter($property)->getFormName(), null, $value);
                    },
                ]);

                $form->add('profissionais', ModelAutocompleteType::class, [
                    'property' => 'id',
                    'placeholder' => 'Escolha o Profissionais',
                    'help' => 'Filtros para pesquisa: [ id, nomeCompleto, email, telefone1, telefone2,  ] - Exemplo de utilização: [ filtro=texto_pesquisa ]',
                    'minimum_input_length' => 0,
                    'items_per_page' => 10,
                    'quiet_millis' => 100,
                    'multiple' =>  true ,
                    'required' =>  false ,
                    'to_string_callback' => function($entity, $property) {
                        return $entity->getId() .' - '.$entity->getNomeCompleto();
                    },
                    'callback' => static function (AdminInterface $admin, string $property, string $value): void {
                        $property = strtolower($property);
                        $value = strtolower($value);
                        $datagrid = $admin->getDatagrid();
                        $valueParts = explode('=', $value);
                        if (count($valueParts) === 2 && in_array($valueParts[0], [ "id","nomeCompleto","email","telefone1","telefone2", ]))
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

        $datagrid->add('data', null, [
            'label' => 'Data',
            'field_options' => [
                'widget' => 'single_text',
            ],
        ]);

        $datagrid->add('observacoes', null, [
            'label' => 'Observacoes',
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

        $datagrid->add('andamentoSolicitacao', ModelFilter::class, [
            'label' => 'AndamentoSolicitacao',
            'field_options' => [
                'multiple' => true,
                'choice_label'=> function (AndamentoSolicitacao $andamentoSolicitacao) {
                    return $andamentoSolicitacao->getId()
                    .' - '.$andamentoSolicitacao->getAssunto()
                    ;
                },
            ],
        ]);

        $datagrid->add('profissionais', ModelFilter::class, [
            'label' => 'Profissionais',
            'field_options' => [
                'multiple' => true,
                'choice_label'=> function (Profissional $profissionais) {
                    return $profissionais->getId()
                    .' - '.$profissionais->getNomeCompleto()
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


        $list->addIdentifier('data', null, [
            'label' => 'Data',
            'format'=> 'd/m/Y',                                                
        ]);


        $list->addIdentifier('observacoes', null, [
            'label' => 'Observacoes',
                                                            
        ]);


        $list->add('periodoAgendamento', null, [
            'label' => 'PeriodoAgendamento',
            'associated_property' => function (PeriodoAgendamento $periodoAgendamento) {
                return $periodoAgendamento->getId()
                .' - '.$periodoAgendamento->getPeriodo()
                ;
            },
        ]);


        $list->add('andamentoSolicitacao', null, [
            'label' => 'AndamentoSolicitacao',
            'associated_property' => function (AndamentoSolicitacao $andamentoSolicitacao) {
                return $andamentoSolicitacao->getId()
                .' - '.$andamentoSolicitacao->getAssunto()
                ;
            },
        ]);


        $list->add('profissionais', null, [
            'label' => 'Profissionais',
            'associated_property' => function (Profissional $profissionais) {
                return $profissionais->getId()
                .' - '.$profissionais->getNomeCompleto()
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

                $show->add('data', null, [
                    'label' => 'Data',
                    'format'=> 'd/m/Y',                                        
                ]);

                $show->add('observacoes', null, [
                    'label' => 'Observacoes',
                                                            
                ]);

                $show->add('periodoAgendamento', null, [
                    'label' => 'PeriodoAgendamento',
                    'associated_property' => function (PeriodoAgendamento $periodoAgendamento) {
                        return $periodoAgendamento->getId()
                        .' - '.$periodoAgendamento->getPeriodo()
                        ;
                    },
                ]);

                $show->add('andamentoSolicitacao', null, [
                    'label' => 'AndamentoSolicitacao',
                    'associated_property' => function (AndamentoSolicitacao $andamentoSolicitacao) {
                        return $andamentoSolicitacao->getId()
                        .' - '.$andamentoSolicitacao->getAssunto()
                        ;
                    },
                ]);

                $show->add('profissionais', null, [
                    'label' => 'Profissionais',
                    'associated_property' => function (Profissional $profissionais) {
                        return $profissionais->getId()
                        .' - '.$profissionais->getNomeCompleto()
                        ;
                    },
                ]);


            $show->end();
        $show->end();
    }


}