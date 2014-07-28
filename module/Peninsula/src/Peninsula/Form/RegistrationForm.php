<?php
namespace Peninsula\Form;

 use Zend\Form\Form;

 class RegistrationForm extends Form
 {
     public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('peninsula');

         $this->add(array(
             'name' => 'studID',
             'type' => 'Hidden',
         ));
         $this->add(array(
             'name' => 'firstName',
             'type' => 'Text',
             'options' => array(
                 'label' => 'First Name',
             ),
         ));
         $this->add(array(
             'name' => 'lastName',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Surname',
             ),
         ));
         $this->add(array(
             'name' => 'email',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Email Address',
             ),
         ));
         $this->add(array(
             'name' => 'phone',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Telephone',
             ),
         ));
         $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Go',
                 'id' => 'submitbutton',
             ),
         ));
     }
 }

