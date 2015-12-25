<?php

namespace Registration\Form;
use Zend\Form\Element;
use Zend\Form\Form;

Class RegistrationForm extends Form{
    
    public function __construct($name = null) {
        parent::__construct('registration');
        
        $this->setAttribute('method','post');
        
     /*****All Registration Form Filed Declaration ***/
        
        $first_name = new Element('first_name');
        $last_name = new Element('last_name');
        $user_pass = new Element('user_pass');
        $conf_pass = new Element('conf_pass');
        $user_email = new Element('user_email');
        $user_country =  new Element('user_country');
        $user_state = new Element('user_state');
        $user_city = new Element('user_city');
        $user_zip = new Element('user_zip');
        $user_address = new Element('user_address');
        
        $submit = new Element('submit');
      /****Individual Registration Form Details ****/  
       
       $first_name->setAttributes(array(
        'type'  => 'text',
        'size'  => '35',
         'placeholder'=>'Please Enter Your First Name'
    ));
               
     $last_name->setAttributes(array(
        'type'  => 'text',
        'size'  => '35',
         'placeholder'=>'Please Enter Your Last Name'
    ));          
                
                
     $user_pass->setAttributes(array(
        'type'  => 'password',
        'size'  => '35',
         'placeholder'=>'Please Enter Your Password'
    ));    
        
     $conf_pass->setAttributes(array(
        'type'  => 'password',
        'size'  => '35',
        'placeholder'=>'Please Retype Password'
    ));   
        
     $user_email->setAttributes(array(
        'type'  => 'email',
        'size'  => '35',
         'placeholder'=>'Please Enter Your Email Address'
    ));
     
      $user_country->setAttributes(array(
        'type'  => 'user_country',
        'size'  => '35',
         'placeholder'=>'Please Enter Your Country Name'
    ));
     
    $user_state->setAttributes(array(
        'type'  => 'text',
        'size'  => '35',
         'placeholder'=>'Please Enter Your State'
    )); 
    
    
    $user_city->setAttributes(array(
        'type'  => 'text',
        'size'  => '35',
         'placeholder'=>'Please Enter Your City Name'
    ));
    
    $user_zip->setAttributes(array(
        'type'  => 'text',
        'size'  => '35',
         'placeholder'=>'Please Enter Your Zip Name'
    ));
    
    $user_address->setAttributes(array(
        'type'  => 'text',
        'size'  => '35',
         'placeholder'=>'Please Enter Your Address Name'
    ));
    
    $submit->setAttributes(array(
        'type'  => 'submit',
        'size'  => '35',
         'value'=>'Send'
    ));
        
       /**********All Registration Form addition with the form*********/ 
        $this->add($first_name)
             ->add($last_name)
             ->add($user_pass)
             ->add($conf_pass)
             ->add($user_email)   
             ->add($user_country)
             ->add($user_state) 
             ->add($user_city)
             ->add($user_zip)
             ->add($user_address)
             ->add($submit);   
               
           
    }
    
    
    
    
    
    
    
}
