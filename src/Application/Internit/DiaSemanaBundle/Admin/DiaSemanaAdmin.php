<?php
namespace App\Application\Internit\DiaSemanaBundle\Admin;

use App\Application\Internit\DiaSemanaBundle\Entity\DiaSemana;

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

final class DiaSemanaAdmin extends BaseAdmin
{

    public function toString(object $object): string
    {
        return $object instanceof DiaSemana ? $object->getId().''
        
        : '';
    }



    protected function configureFormFields(FormMapper $form): void
    {
        $form->tab('Geral');
            $form->with('Informações Gerais');


                $form->add('dia',  IntegerType::class, [
                    'label' => 'Dia',
                    'required' =>  true ,
                    
                ]);

                $form->add('diaSemana',  TextType::class, [
                    'label' => 'Diasemana',
                    'required' =>  true ,
                    
                ]);

            $form->end();
        $form->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagrid): void
    {
        $datagrid->add('id', null, [
            'label' => 'Id',
        ]);

        $datagrid->add('dia', null, [
            'label' => 'Dia',
        ]);

        $datagrid->add('diaSemana', null, [
            'label' => 'Diasemana',
        ]);

    }

    protected function configureListFields(ListMapper $list): void
    {

        $list->addIdentifier('id', null, [
            'label' => 'Id',
                                                            
        ]);


        $list->addIdentifier('dia', null, [
            'label' => 'Dia',
                                                            
        ]);


        $list->addIdentifier('diaSemana', null, [
            'label' => 'Diasemana',
                                                            
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

                $show->add('dia', null, [
                    'label' => 'Dia',
                                                            
                ]);

                $show->add('diaSemana', null, [
                    'label' => 'Diasemana',
                                                            
                ]);


            $show->end();
        $show->end();
    }


}