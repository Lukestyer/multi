<?php

namespace Peninsula\Model;

class Registration
{
    public $firstName;
    public $lastName;
    public $email;
    public $phone;
    public $studID;
    
    //approach is to have model classes represent each entity in our application
    // and then use mapper objects that load and save entities to the database
    
    public function exchangeArray($data)
     {
         $this->firstName     = (!empty($data['firstName'])) ? $data['firstName'] : null;
         $this->lastName = (!empty($data['lastName'])) ? $data['lastName'] : null;
         $this->email  = (!empty($data['email'])) ? $data['email'] : null;
         $this->phone     = (!empty($data['phone'])) ? $data['phone'] : null;
     }
}


