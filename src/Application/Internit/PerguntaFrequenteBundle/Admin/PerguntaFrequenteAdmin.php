<?php
namespace App\Application\Internit\PerguntaFrequenteBundle\Admin;

use App\Application\Internit\PerguntaFrequenteBundle\Entity\PerguntaFrequente;
use App\Application\Internit\TopicoBundle\Entity\Topico;
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
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;

final class PerguntaFrequenteAdmin extends BaseAdmin
{

    public function toString(object $object): string
    {
        return $object instanceof PerguntaFrequente ? $object->getId().''
        
        : '';
    }



    protected function configureFormFields(FormMapper $form): void
    {
        $form->tab('Geral');
            $form->with('Informações Gerais');


                $form->add('pergunta',  TextareaType::class, [
                    'label' => 'Pergunta',
                    'required' =>  true ,
                    
                ]);

                $form->add('resposta',  TextareaType::class, [
                    'label' => 'Resposta',
                    'required' =>  true ,
                    
                ]);

                $form->add('visivel',  CheckboxType::class, [
                    'label' => 'Visivel',
                    'required' =>  false ,
                    
                ]);

                $form->add('topico', ModelAutocompleteType::class, [
                    'property' => 'id',
                    'placeholder' => 'Escolha o Topico',
                    'help' => 'Filtros para pesquisa: [ id, nome,  ] - Exemplo de utilização: [ filtro=texto_pesquisa ]',
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
                        if (count($valueParts) === 2 && in_array($valueParts[0], [ "id","nome", ]))
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

        $datagrid->add('pergunta', null, [
            'label' => 'Pergunta',
        ]);

        $datagrid->add('resposta', null, [
            'label' => 'Resposta',
        ]);

        $datagrid->add('visivel', null, [
            'label' => 'Visivel',
        ]);

        $datagrid->add('topico', ModelFilter::class, [
            'label' => 'Topico',
            'field_options' => [
                'multiple' => true,
                'choice_label'=> function (Topico $topico) {
                    return $topico->getId()
                    .' - '.$topico->getNome()
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


        $list->addIdentifier('pergunta', null, [
            'label' => 'Pergunta',
                                                            
        ]);


        $list->addIdentifier('resposta', null, [
            'label' => 'Resposta',
                                                            
        ]);


        $list->add('visivel', null, [
            'label' => 'Visivel',
                                                'editable' => true,            'inverse' => false,
        ]);


        $list->add('topico', null, [
            'label' => 'Topico',
            'associated_property' => function (Topico $topico) {
                return $topico->getId()
                .' - '.$topico->getNome()
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

                $show->add('pergunta', null, [
                    'label' => 'Pergunta',
                                                            
                ]);

                $show->add('resposta', null, [
                    'label' => 'Resposta',
                                                            
                ]);

                $show->add('visivel', null, [
                    'label' => 'Visivel',
                                                            
                ]);

                $show->add('topico', null, [
                    'label' => 'Topico',
                    'associated_property' => function (Topico $topico) {
                        return $topico->getId()
                        .' - '.$topico->getNome()
                        ;
                    },
                ]);



            $show->end();
        $show->end();
    }


}