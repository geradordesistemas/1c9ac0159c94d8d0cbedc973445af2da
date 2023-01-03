<?php
namespace App\Application\Internit\ProfissionalBundle\Admin;

use App\Application\Internit\ProfissionalBundle\Entity\Profissional;
use App\Application\Internit\ProfissaoBundle\Entity\Profissao;
use App\Application\Internit\AgendamentoBundle\Entity\Agendamento;

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

final class ProfissionalAdmin extends BaseAdmin
{

    public function toString(object $object): string
    {
        return $object instanceof Profissional ? $object->getId().''
        
        : '';
    }



    protected function configureFormFields(FormMapper $form): void
    {
        $form->tab('Geral');
            $form->with('Informações Gerais');


                $form->add('nomeCompleto',  TextType::class, [
                    'label' => 'Nomecompleto',
                    'required' =>  true ,
                    
                ]);

                $form->add('email',  TextType::class, [
                    'label' => 'Email',
                    'required' =>  true ,
                    
                ]);

                $form->add('telefone1',  TextType::class, [
                    'label' => 'Telefone1',
                    'required' =>  true ,
                    
                ]);

                $form->add('telefone2',  TextType::class, [
                    'label' => 'Telefone2',
                    'required' =>  false ,
                    
                ]);

                $form->add('profissoes', ModelAutocompleteType::class, [
                    'property' => 'id',
                    'placeholder' => 'Escolha o Profissoes',
                    'help' => 'Filtros para pesquisa: [ id, profissao, descricao,  ] - Exemplo de utilização: [ filtro=texto_pesquisa ]',
                    'minimum_input_length' => 0,
                    'items_per_page' => 10,
                    'quiet_millis' => 100,
                    'multiple' =>  true ,
                    'required' =>  false ,
                    'to_string_callback' => function($entity, $property) {
                        return $entity->getId() .' - '.$entity->getProfissao();
                    },
                    'callback' => static function (AdminInterface $admin, string $property, string $value): void {
                        $property = strtolower($property);
                        $value = strtolower($value);
                        $datagrid = $admin->getDatagrid();
                        $valueParts = explode('=', $value);
                        if (count($valueParts) === 2 && in_array($valueParts[0], [ "id","profissao","descricao", ]))
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

        $datagrid->add('nomeCompleto', null, [
            'label' => 'Nomecompleto',
        ]);

        $datagrid->add('email', null, [
            'label' => 'Email',
        ]);

        $datagrid->add('telefone1', null, [
            'label' => 'Telefone1',
        ]);

        $datagrid->add('telefone2', null, [
            'label' => 'Telefone2',
        ]);

        $datagrid->add('profissoes', ModelFilter::class, [
            'label' => 'Profissoes',
            'field_options' => [
                'multiple' => true,
                'choice_label'=> function (Profissao $profissoes) {
                    return $profissoes->getId()
                    .' - '.$profissoes->getProfissao()
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

    }

    protected function configureListFields(ListMapper $list): void
    {

        $list->addIdentifier('id', null, [
            'label' => 'Id',
                                                            
        ]);


        $list->addIdentifier('nomeCompleto', null, [
            'label' => 'Nomecompleto',
                                                            
        ]);


        $list->addIdentifier('email', null, [
            'label' => 'Email',
                                                            
        ]);


        $list->addIdentifier('telefone1', null, [
            'label' => 'Telefone1',
                                                            
        ]);


        $list->addIdentifier('telefone2', null, [
            'label' => 'Telefone2',
                                                            
        ]);


        $list->add('profissoes', null, [
            'label' => 'Profissoes',
            'associated_property' => function (Profissao $profissoes) {
                return $profissoes->getId()
                .' - '.$profissoes->getProfissao()
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

                $show->add('nomeCompleto', null, [
                    'label' => 'Nomecompleto',
                                                            
                ]);

                $show->add('email', null, [
                    'label' => 'Email',
                                                            
                ]);

                $show->add('telefone1', null, [
                    'label' => 'Telefone1',
                                                            
                ]);

                $show->add('telefone2', null, [
                    'label' => 'Telefone2',
                                                            
                ]);

                $show->add('profissoes', null, [
                    'label' => 'Profissoes',
                    'associated_property' => function (Profissao $profissoes) {
                        return $profissoes->getId()
                        .' - '.$profissoes->getProfissao()
                        ;
                    },
                ]);



            $show->end();
        $show->end();
    }


}