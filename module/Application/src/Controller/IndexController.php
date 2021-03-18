<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Db\Adapter\Adapter;


class IndexController extends AbstractActionController
{
    // private $table;
    // public function  __construct($table)
    // { 
    //     $this->table = $table;
    // }

    public function indexAction()
    {
        // $city = $this->table->fetchAll();
        // var_dump($city);
        echo "__DIR__ . '/../view',";
        return new ViewModel();
    }
    
    public function AdapterDB(){
        $adapter = new Adapter([
            'driver'=>'Pdo_Mysql',
            'database' => 'zend_db',
            'username' => 'root',
            'password' => 'example',
            'hostname' => '127.0.0.1',
            'charset' => 'utf8',
            'port' => '3306'
        ]);
        return $adapter;
    }

    public function editAction()
    {
        $database =  $this->AdapterDB();
        $sql = "SELECT * FROM db_city";
        $statement =  $database->query($sql);
        $result= $statement->execute();
        // echo '<pre>';
        // var_dump($result);
        // echo '</pre>';

        foreach($result as $row){
            echo '<pre>';
            var_dump($row);
            echo '</pre>';
        }
        return new ViewModel();
    }
}
