<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Peninsula\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Peninsula\Model\Registration;          // <-- Add this import
use Peninsula\Form\RegistrationForm;

class PeninsulaController extends AbstractActionController
{
    private $registrationTable;
    
    public function getRegistrationTable()
     {
         if (!$this->registrationTable) {
             $sm = $this->getServiceLocator();
             $this->registrationTable = $sm->get('Peninsula\Model\RegistrationTable');
         }
         return $this->registrationTable;
     }
     
    public function indexAction()
    {
        return new ViewModel(array(
             'students' => $this->getRegistrationTable()->fetchAll(),
         ));
    }
    
    public function aboutAction()
    {
        return new ViewModel(array(
            'message' => 'We are in the about action'
        ));
    }
    
    public function coursesAction()
    {
        return new ViewModel(array(
            'message' => 'We are in the courses action'
        ));
    }
    
    public function registerAction()
    {
        $form = new RegistrationForm();
         $form->get('submit')->setValue('Register');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $stud = new Registration();
             //$form->setInputFilter($album->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) //validation is enforced. 
             {
                 $stud->exchangeArray($form->getData());
                 $this->getRegistrationTable()->saveStud($stud);
             }

                 // Redirect to list of albums
                 return $this->redirect()->toRoute('peninsula');
             
         }
         return array('form' => $form);
    }
    
    
}

