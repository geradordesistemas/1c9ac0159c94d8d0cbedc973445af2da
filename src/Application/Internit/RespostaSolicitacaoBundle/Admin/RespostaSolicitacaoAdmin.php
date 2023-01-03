<?php
namespace App\Application\Internit\RespostaSolicitacaoBundle\Admin;

use App\Application\Internit\RespostaSolicitacaoBundle\Entity\RespostaSolicitacao;
use App\Application\Internit\AndamentoSolicitacaoBundle\Entity\AndamentoSolicitacao;
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
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;

final class RespostaSolicitacaoAdmin extends BaseAdmin
{

    public function toString(object $object): string
    {
        return $object instanceof RespostaSolicitacao ? $object->getId().''
        
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

                $form->add('anexos', ModelListType::class,[
                    'label' => 'Anexos: ',
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


        $list->add('andamentoSolicitacao', null, [
            'label' => 'AndamentoSolicitacao',
            'associated_property' => function (AndamentoSolicitacao $andamentoSolicitacao) {
                return $andamentoSolicitacao->getId()
                .' - '.$andamentoSolicitacao->getAssunto()
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

                $show->add('andamentoSolicitacao', null, [
                    'label' => 'AndamentoSolicitacao',
                    'associated_property' => function (AndamentoSolicitacao $andamentoSolicitacao) {
                        return $andamentoSolicitacao->getId()
                        .' - '.$andamentoSolicitacao->getAssunto()
                        ;
                    },
                ]);



            $show->end();
        $show->end();
    }


}