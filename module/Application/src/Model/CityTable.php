<?php 

namespace Model;

 use Zend\Db\TableGateway\TableGateway;

 class CityTable
 {
     protected $tableGateway;

     public function __construct($tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }

     public function getCity($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function saveCity($City)
     {
         $data = array(
             'artist' => $City->artist,
             'title'  => $City->title,
         );

         $id = (int) $City->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getCity($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('City id does not exist');
             }
         }
     }

     public function deleteCity($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
 }