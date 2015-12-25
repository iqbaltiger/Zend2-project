<?php

namespace Registration\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Registration\Model\Registration;
use Registration\Form\RegistrationForm;

class RegistrationController extends AbstractActionController
{
    

    public function indexAction()
    {
       $form = new RegistrationForm();
         
         
        $request = $this->getRequest();
        if ($request->isPost()) {
            $registration = new Registration();
            $form->setInputFilter($registration->getInputFilter());
             
            
           $form->setData($request->getPost());
          
          
            if ($form->isValid()) {
               
              
                $registration->exchangeArray($form->getData());
                $this->getRegistrationTable()->saveUser($registration);
                
                // Redirect to list of registrations
                return $this->redirect()->toRoute('registration');
            }
            
            
            
        }
       
       
       
       
       
       return array('form'=>$form);
      
    }
    
    
    public function loginAction(){
        
        $loginForm = new RegistrationForm();
        
       
      return array('form'=>$loginForm);
        
    }
    
    
    
    public function getRegistrationTable()
    {
        if (!$this->registrationTable) {
            $sm = $this->getServiceLocator();
            $this->registrationTable = $sm->get('Registration\Model\RegistrationTable');
        }
        return $this->registrationTable;
    }   
    
    public function serviceAction(){
        
     
    
    }
}
