<?php

namespace Seller\Form;
use Zend\InputFilter;
use Zend\Form\Element;
use Zend\Form\Form;


Class EmailForm extends Form{
    
    public function __construct($name = null) {
        parent::__construct('email');
        
        $this->setAttribute('method','post');
       
     /*****All Registration Form Filed Declaration ***/
        
       
        
         $email = new Element\Email('user_email');
         $email->setAttribute('id', 'user_email');
        
        $submit = new Element('submit');
      /****Individual Registration Form Details ****/  
       
       $email->setAttributes(array(
        'type'  => 'text',
        'size'  => '35',
         'placeholder'=>'Please Enter Your Email Address'
    ));
     
       
       
       
    

    $submit->setAttributes(array(
        'type'  => 'submit',
        'size'  => '35',
         'value'=>'Send'
    ));
        
       /**********All Registration Form addition with the form*********/ 
        $this->add($email)
             
             ->add($submit);   
               
           
    }
    
    
    
      
    
    
    
}
