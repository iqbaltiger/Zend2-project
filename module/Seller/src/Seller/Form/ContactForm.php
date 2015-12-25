<?php

namespace Seller\Form;
use Zend\InputFilter;
use Zend\Form\Element;
use Zend\Form\Form;


Class ContactForm extends Form{
    
    public function __construct($name = null) {
        parent::__construct('contact');
         $this->addInputFilter();
         $this->addElements();
        
         
        $this->setAttribute('method','post');
    }
         public function addElements() {
       
     /*****All Registration Form Filed Declaration ***/
        
        $user_name  = new Element\Text('user_name');
        $user_name->setAttribute('required','true');
        
        
        
         $user_email = new Element\Email('user_email');
         
         $user_email->setAttribute('required','true');
         
         $user_phone = new Element\Text('user_phone');
          $user_phone->setAttribute('required','true');
         
         $user_message = new Element\Textarea('user_message');
          $user_message->setAttribute('cols', '40')
           ->setAttribute('rows', '8');
         
        $user_message->setAttribute('required','true'); 
        
        
         
        
         
        
        $submit = new Element('submit');
      /****Individual Registration Form Details ****/  
       
        
        $common_attrib = array(
        'type'  => 'text',
        'size'  => '20',
        'style'=>'color:black',   
        
    );
       
       $user_name->setAttributes($common_attrib);
       $user_email->setAttributes($common_attrib);
       $user_phone->setAttributes($common_attrib);
       //$user_message->setAttributes($common_attrib);
      
       /********************/
       
       
        $user_name->setAttribute('placeholder','Name:');
        $user_email->setAttribute('placeholder','E-mail:');
        $user_phone->setAttribute('placeholder','Phone:');
        $user_message->setAttribute('placeholder','Message:');
        
       
       /*******************/
       
       //$email->setAttribute('placeholder','Please Enter Your Mail');
     
       
       
       
    

    $submit->setAttributes(array(
        'type'  => 'submit',
        'size'  => '35',
         'value'=>'Send'
    ));
        
       /**********All Registration Form addition with the form*********/ 
        $this->add($user_name)   
                
             ->add($user_email)
             ->add($user_phone)
             ->add($user_message)
             ->add($submit);   
               
           
    }
    
    
    
    public function  addInputFilter(){
        
        $inputFilter = new InputFilter\InputFilter();
        
        $user_name = new InputFilter\Input('user_name');
        $user_name->setRequired(true);
        $inputFilter->add($user_name);
          $this->setInputFilter($inputFilter);
        
    }
    
    
    
}
