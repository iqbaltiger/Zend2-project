<?php

namespace Seller\Form;
use Zend\InputFilter;
use Zend\Form\Element;
use Zend\Form\Form;


Class SellerForm extends Form{
    
    public function __construct($name = null) {
        parent::__construct('seller');
        
        $this->setAttribute('method','post');
         $this->addElements();
        $this->addInputFilter();
     /*****All Registration Form Filed Declaration ***/
        
        $property_title = new Element('property_title');
        
         $file = new Element\File('property_image');
        $file->setAttribute('id', 'property_image');
        
        $submit = new Element('submit');
      /****Individual Registration Form Details ****/  
       
       $property_title->setAttributes(array(
        'type'  => 'text',
        'size'  => '35',
         'placeholder'=>'Please Enter Property Title'
    ));
     
       
       
       
    

    $submit->setAttributes(array(
        'type'  => 'submit',
        'size'  => '35',
         'value'=>'Send'
    ));
        
       /**********All Registration Form addition with the form*********/ 
        $this->add($property_title)
             ->add($file)
             ->add($submit);   
               
           
    }
    
    
    
      public function addElements() {
        // File Input
        $file = new Element\File('image-file');
        $file->setLabel('Avatar Image Upload')
                ->setAttribute('id', 'image-file');
        $this->add($file);
    }

    public function addInputFilter() {
        $inputFilter = new InputFilter\InputFilter();

        // File Input
        $fileInput = new InputFilter\FileInput('image-file');
        $fileInput->setRequired(true);
        $fileInput->getFilterChain()->attachByName(
                'filerenameupload', array(
            'target' => './data/tmpuploads/avatar.png',
            'randomize' => true,
                )
        );
        $inputFilter->add($fileInput);

        $this->setInputFilter($inputFilter);
    }  
    
    
    
}
