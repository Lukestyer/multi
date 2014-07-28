<?php

/* 
 *contains functions that are used to manipulate the registration table 
 */

namespace Peninsula\Model;

use Zend\Db\TableGateway\TableGateway;

 class RegistrationTable
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }

     public function getStud($studID)
     {
         $studID  = (int) $studID;
         $rowset = $this->tableGateway->select(array('studID' => $studID));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $studID");
         }
         return $row;
     }

     public function saveStud(Registration $stud)
     {
         $data = array(
             'firstName' => $stud->firstName,
             'lastName'  => $stud->lastName,
             'email'  => $stud->email,
             'phone'  => $stud->phone,
             
         );

         $studID = (int) $stud->studID;
         if ($studID == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getStud($studID)) {
                 $this->tableGateway->update($data, array('studID' => $studID));
             } else {
                 throw new \Exception('Student id does not exist');
             }
         }
     }

     public function deleteAlbum($studID)
     {
         $this->tableGateway->delete(array('studID' => (int) $studID));
     }
 }

