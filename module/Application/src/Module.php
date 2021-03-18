<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module
{
    const VERSION = '3.1.3';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return [
            'factories'=>[
                Model\CityTable::class=>function($container)
                {
                    $tableGateway = $container->get(Model\CityTable::class);
                    return new Model\CityTable($tableGateway);
                },
                Model\CityTableGateway::class=>function($container)
                {
                    $adapter=$container->get(AdapterInterface::class);
                    $resultSetPrototype=new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\City);
                    return new TableGateway('db_city', $adapter, null, $resultSetPrototype);
                }
            ]
        ];
    }
}
