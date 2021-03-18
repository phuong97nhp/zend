<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace City;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return array(
    'controllers' => array(
        'invokables' => array(
            Controller\CityController::class => InvokableFactory::class,
            Controller\WardController::class => InvokableFactory::class,
        ),
    ),

    'router' => array(
        'routes' => array(
            'city' => array(
                'type'    => Segment::class,
                'options' => array(
                    'route'    => '/city[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => Controller\CityController::class,
                        'action'     => 'index',
                    ),
                ),
            ),
            'ward' => array(
                'type'    => Segment::class,
                'options' => array(
                    'route'    => '/ward[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => Controller\WardController::class,
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'city' => __DIR__ . '/../view',
        ),
    ),
);