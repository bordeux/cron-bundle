<?php

namespace Bordeux\Bundle\CronBundle\Admin\Cron;

use Bordeux\Bundle\CronBundle\Command\CronCommand;
use Knp\Menu\ItemInterface as MenuItemInterface;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;


/**
 * Class LogAdmin
 * @author Chris Bednarczyk <chris@tourradar.com>
 * @package Bordeux\Bundle\CronBundle\Admin\Cron
 */
class LogAdmin extends AbstractAdmin
{

    /**
     * Default values to the datagrid.
     *
     * @var array
     */
    protected $datagridValues = [
        '_page' => 1,
        '_sort_order' => 'DESC',
        '_per_page' => 32,
    ];



    /**
     * @var string
     */
    protected $classnameLabel = "Log";

    /**
     * @var string
     */
    protected $baseRouteName = "cron/log";


    protected function configureRoutes(RouteCollection $collection)
    {
        parent::configureRoutes($collection); // TODO: Change the autogenerated stub

        $collection->remove('create');
        $collection->remove('edit');
    }

    /**
     *
    background: #000;
    color: #CCC;
    font-family: "Lucida Console", Monaco, monospace;
     */



    /**
     * @return string
     * @author Chris Bednarczyk <chris@tourradar.com>
     */
    public function getParentAssociationMapping()
    {
        return "cron";
    }

    protected function configureShowFields(ShowMapper $show)
    {
        $show
            ->add("id")
            ->add("startDate")
            ->add("endDate")
            ->add("duration")
            ->add("success")
            ->add("responseCode")
            ->add("output");
    }


    public static function getConsoleFilePath($kernelDir)
    {

    }


    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {

        $datagridMapper
            ->add("id")
            ->add("startDate")
            ->add("endDate")
            ->add("duration")
            ->add("success")
            ->add("responseCode")
            ->add("output");
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier("id")
            ->add("startDate")
            ->add("endDate")
            ->add("duration")
            ->add("success")
            ->add("responseCode")
            ->add('_action', 'actions', [
                'actions' => [
                    'show' => [],
                    'delete' => [],
                ]
            ]);
    }


}
