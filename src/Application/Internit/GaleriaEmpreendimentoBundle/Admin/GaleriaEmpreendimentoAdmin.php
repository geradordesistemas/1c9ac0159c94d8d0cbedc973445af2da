<?php
namespace App\Application\Internit\GaleriaEmpreendimentoBundle\Admin;

use App\Application\Internit\GaleriaEmpreendimentoBundle\Entity\GaleriaEmpreendimento;
use App\Application\Internit\EmpreendimentoBundle\Entity\Empreendimento;
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
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;

final class GaleriaEmpreendimentoAdmin extends BaseAdmin
{

    public function toString(object $object): string
    {
        return $object instanceof GaleriaEmpreendimento ? $object->getId().''
        
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

                $form->add('galeria', ModelListType::class,[
                    'label' => 'Galeria: ',
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


    }

    protected function configureListFields(ListMapper $list): void
    {

        $list->addIdentifier('id', null, [
            'label' => 'Id',
                                                            
        ]);


        $list->addIdentifier('nome', null, [
            'label' => 'Nome',
                                                            
        ]);


        $list->add('empreendimento', null, [
            'label' => 'Empreendimento',
            'associated_property' => function (Empreendimento $empreendimento) {
                return $empreendimento->getId()
                .' - '.$empreendimento->getNome()
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

                $show->add('empreendimento', null, [
                    'label' => 'Empreendimento',
                    'associated_property' => function (Empreendimento $empreendimento) {
                        return $empreendimento->getId()
                        .' - '.$empreendimento->getNome()
                        ;
                    },
                ]);



            $show->end();
        $show->end();
    }


}