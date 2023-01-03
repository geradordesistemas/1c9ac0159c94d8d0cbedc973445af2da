<?php
namespace App\Application\Internit\ClienteBundle\Admin;

use App\Application\Internit\ClienteBundle\Entity\Cliente;
use App\Application\Internit\UnidadeClienteBundle\Entity\UnidadeCliente;
use App\Application\Internit\DownloadBundle\Entity\Download;
use App\Application\Internit\ComunicadoBundle\Entity\Comunicado;

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

final class ClienteAdmin extends BaseAdmin
{

    public function toString(object $object): string
    {
        return $object instanceof Cliente ? $object->getId().''
        
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

                $form->add('sobrenome',  TextType::class, [
                    'label' => 'Sobrenome',
                    'required' =>  true ,
                    
                ]);

                $form->add('cpf',  TextType::class, [
                    'label' => 'Cpf',
                    'required' =>  true ,
                    
                ]);

                $form->add('telefone',  TextType::class, [
                    'label' => 'Telefone',
                    'required' =>  false ,
                    
                ]);

                $form->add('celular',  TextType::class, [
                    'label' => 'Celular',
                    'required' =>  false ,
                    
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

        $datagrid->add('sobrenome', null, [
            'label' => 'Sobrenome',
        ]);

        $datagrid->add('cpf', null, [
            'label' => 'Cpf',
        ]);

        $datagrid->add('telefone', null, [
            'label' => 'Telefone',
        ]);

        $datagrid->add('celular', null, [
            'label' => 'Celular',
        ]);

    $datagrid->add('unidades', ModelFilter::class, [
        'label' => 'Unidades',
        'field_options' => [
            'multiple' => true,
            'choice_label'=> function (UnidadeCliente $unidades) {
                return $unidades->getId()
                ;
            },
        ],
    ]);

    $datagrid->add('downloads', ModelFilter::class, [
        'label' => 'Downloads',
        'field_options' => [
            'multiple' => true,
            'choice_label'=> function (Download $downloads) {
                return $downloads->getId()
                .' - '.$downloads->getTitulo()
                ;
            },
        ],
    ]);

    $datagrid->add('comunicados', ModelFilter::class, [
        'label' => 'Comunicados',
        'field_options' => [
            'multiple' => true,
            'choice_label'=> function (Comunicado $comunicados) {
                return $comunicados->getId()
                .' - '.$comunicados->getTitulo()
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


        $list->addIdentifier('sobrenome', null, [
            'label' => 'Sobrenome',
                                                            
        ]);


        $list->addIdentifier('cpf', null, [
            'label' => 'Cpf',
                                                            
        ]);


        $list->addIdentifier('telefone', null, [
            'label' => 'Telefone',
                                                            
        ]);


        $list->addIdentifier('celular', null, [
            'label' => 'Celular',
                                                            
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

                $show->add('sobrenome', null, [
                    'label' => 'Sobrenome',
                                                            
                ]);

                $show->add('cpf', null, [
                    'label' => 'Cpf',
                                                            
                ]);

                $show->add('telefone', null, [
                    'label' => 'Telefone',
                                                            
                ]);

                $show->add('celular', null, [
                    'label' => 'Celular',
                                                            
                ]);





            $show->end();
        $show->end();
    }


}