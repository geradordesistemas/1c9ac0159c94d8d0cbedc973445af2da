<?php
namespace App\Application\Internit\AndamentoSolicitacaoBundle\Admin;

use App\Application\Internit\AndamentoSolicitacaoBundle\Entity\AndamentoSolicitacao;
use App\Application\Internit\StatusSolicitacaoBundle\Entity\StatusSolicitacao;
use App\Application\Internit\SolicitacaoBundle\Entity\Solicitacao;
use App\Application\Internit\AgendamentoBundle\Entity\Agendamento;
use App\Application\Internit\RespostaSolicitacaoBundle\Entity\RespostaSolicitacao;

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

final class AndamentoSolicitacaoAdmin extends BaseAdmin
{

    public function toString(object $object): string
    {
        return $object instanceof AndamentoSolicitacao ? $object->getId().''
        
        : '';
    }



    protected function configureFormFields(FormMapper $form): void
    {
        $form->tab('Geral');
            $form->with('Informações Gerais');


                $form->add('assunto',  TextType::class, [
                    'label' => 'Assunto',
                    'required' =>  true ,
                    
                ]);

                $form->add('mensagem',  TextareaType::class, [
                    'label' => 'Mensagem',
                    'required' =>  true ,
                    
                ]);

                $form->add('visivel',  CheckboxType::class, [
                    'label' => 'Visivel',
                    'required' =>  false ,
                    
                ]);

                $form->add('statusSolicitacao', ModelAutocompleteType::class, [
                    'property' => 'id',
                    'placeholder' => 'Escolha o StatusSolicitacao',
                    'help' => 'Filtros para pesquisa: [ id, status,  ] - Exemplo de utilização: [ filtro=texto_pesquisa ]',
                    'minimum_input_length' => 0,
                    'items_per_page' => 10,
                    'quiet_millis' => 100,
                    'multiple' =>  false ,
                    'required' =>  false ,
                    'to_string_callback' => function($entity, $property) {
                        return $entity->getId() .' - '.$entity->getStatus();
                    },
                    'callback' => static function (AdminInterface $admin, string $property, string $value): void {
                        $property = strtolower($property);
                        $value = strtolower($value);
                        $datagrid = $admin->getDatagrid();
                        $valueParts = explode('=', $value);
                        if (count($valueParts) === 2 && in_array($valueParts[0], [ "id","status", ]))
                        [$property, $value] = $valueParts;

                        $datagrid->setValue($datagrid->getFilter($property)->getFormName(), null, $value);
                    },
                ]);

                $form->add('solicitacao', ModelAutocompleteType::class, [
                    'property' => 'id',
                    'placeholder' => 'Escolha o Solicitacao',
                    'help' => 'Filtros para pesquisa: [ id, assunto, mensagem, data,  ] - Exemplo de utilização: [ filtro=texto_pesquisa ]',
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
                        if (count($valueParts) === 2 && in_array($valueParts[0], [ "id","assunto","mensagem","data", ]))
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

        $datagrid->add('assunto', null, [
            'label' => 'Assunto',
        ]);

        $datagrid->add('mensagem', null, [
            'label' => 'Mensagem',
        ]);

        $datagrid->add('visivel', null, [
            'label' => 'Visivel',
        ]);

        $datagrid->add('statusSolicitacao', ModelFilter::class, [
            'label' => 'StatusSolicitacao',
            'field_options' => [
                'multiple' => true,
                'choice_label'=> function (StatusSolicitacao $statusSolicitacao) {
                    return $statusSolicitacao->getId()
                    .' - '.$statusSolicitacao->getStatus()
                    ;
                },
            ],
        ]);

        $datagrid->add('solicitacao', ModelFilter::class, [
            'label' => 'Solicitacao',
            'field_options' => [
                'multiple' => true,
                'choice_label'=> function (Solicitacao $solicitacao) {
                    return $solicitacao->getId()
                    .' - '.$solicitacao->getAssunto()
                    ;
                },
            ],
        ]);

    $datagrid->add('agendamentos', ModelFilter::class, [
        'label' => 'Agendamentos',
        'field_options' => [
            'multiple' => true,
            'choice_label'=> function (Agendamento $agendamentos) {
                return $agendamentos->getId()
                .' - '.$agendamentos->getData()
                ;
            },
        ],
    ]);

    $datagrid->add('respostasSolicitacao', ModelFilter::class, [
        'label' => 'RespostasSolicitacao',
        'field_options' => [
            'multiple' => true,
            'choice_label'=> function (RespostaSolicitacao $respostasSolicitacao) {
                return $respostasSolicitacao->getId()
                .' - '.$respostasSolicitacao->getAssunto()
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


        $list->add('visivel', null, [
            'label' => 'Visivel',
                                                'editable' => true,            'inverse' => false,
        ]);


        $list->add('statusSolicitacao', null, [
            'label' => 'StatusSolicitacao',
            'associated_property' => function (StatusSolicitacao $statusSolicitacao) {
                return $statusSolicitacao->getId()
                .' - '.$statusSolicitacao->getStatus()
                ;
            },
        ]);


        $list->add('solicitacao', null, [
            'label' => 'Solicitacao',
            'associated_property' => function (Solicitacao $solicitacao) {
                return $solicitacao->getId()
                .' - '.$solicitacao->getAssunto()
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

                $show->add('visivel', null, [
                    'label' => 'Visivel',
                                                            
                ]);

                $show->add('statusSolicitacao', null, [
                    'label' => 'StatusSolicitacao',
                    'associated_property' => function (StatusSolicitacao $statusSolicitacao) {
                        return $statusSolicitacao->getId()
                        .' - '.$statusSolicitacao->getStatus()
                        ;
                    },
                ]);

                $show->add('solicitacao', null, [
                    'label' => 'Solicitacao',
                    'associated_property' => function (Solicitacao $solicitacao) {
                        return $solicitacao->getId()
                        .' - '.$solicitacao->getAssunto()
                        ;
                    },
                ]);




            $show->end();
        $show->end();
    }


}