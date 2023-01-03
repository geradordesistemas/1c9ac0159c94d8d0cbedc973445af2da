<?php
namespace App\Application\Internit\DiaIndisponivelAgendamentoBundle\Admin;

use App\Application\Internit\DiaIndisponivelAgendamentoBundle\Entity\DiaIndisponivelAgendamento;

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
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

final class DiaIndisponivelAgendamentoAdmin extends BaseAdmin
{

    public function toString(object $object): string
    {
        return $object instanceof DiaIndisponivelAgendamento ? $object->getId().''
        
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

                $form->add('descricao',  TextType::class, [
                    'label' => 'Descricao',
                    'required' =>  false ,
                    
                ]);

                $form->add('feriado',  CheckboxType::class, [
                    'label' => 'Feriado',
                    'required' =>  false ,
                    
                ]);

                $form->add('indisponivel',  CheckboxType::class, [
                    'label' => 'Indisponivel',
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

        $datagrid->add('data', null, [
            'label' => 'Data',
            'field_options' => [
                'widget' => 'single_text',
            ],
        ]);

        $datagrid->add('descricao', null, [
            'label' => 'Descricao',
        ]);

        $datagrid->add('feriado', null, [
            'label' => 'Feriado',
        ]);

        $datagrid->add('indisponivel', null, [
            'label' => 'Indisponivel',
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


        $list->addIdentifier('descricao', null, [
            'label' => 'Descricao',
                                                            
        ]);


        $list->add('feriado', null, [
            'label' => 'Feriado',
                                                'editable' => true,            'inverse' => false,
        ]);


        $list->add('indisponivel', null, [
            'label' => 'Indisponivel',
                                                'editable' => true,            'inverse' => false,
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

                $show->add('descricao', null, [
                    'label' => 'Descricao',
                                                            
                ]);

                $show->add('feriado', null, [
                    'label' => 'Feriado',
                                                            
                ]);

                $show->add('indisponivel', null, [
                    'label' => 'Indisponivel',
                                                            
                ]);


            $show->end();
        $show->end();
    }


}