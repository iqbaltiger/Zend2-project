<?php

namespace Seller\Form;

use Zend\Http\PhpEnvironment\Request;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter;
use Zend\Form\Element;
use Zend\Form\Form;

class UploadForm extends Form {

    public function __construct($name = null, $options = array()) {
        parent::__construct($name, $options);
        $this->addElements();
        $this->addInputFilter();
    }

    public function addElements() {
        // File Input
        $file = new Element\File('image-file');
        $file->setLabel('Avatar Image Upload')
                ->setAttribute('id', 'image-file');
        $property_title = new Element('property_title');
        $property_description = new Element('property_description');
        $property_price = new Element('property_price');

        $bathroom_number = new Element('bathroom_number');

        $bedroom_number = new Element('bedroom_number');
        $city = new Element('city');
        $state = new Element('state');
        $zip = new Element('zip');
        $country = new Element('country');

        $this->add($file)
                ->add($property_title)
                ->add($property_description)
                ->add($bathroom_number)
                ->add($bedroom_number)
                ->add($property_price)
                ->add($city)
                ->add($state)
                ->add($zip)
                ->add($country);
                 
    }

    public function addInputFilter() {
        $inputFilter = new InputFilter\InputFilter();
       
            $factory = new InputFactory();
         $inputFilter->add($factory->createInput(array(
                        'name' => 'property_title',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'StringLength',
                                'options' => array(
                                    'encoding' => 'UTF-8',
                                    'min' => 1,
                                    'max' => 100,
                                ),
                            ),
                        ),
            )));
         
         
         $inputFilter->add($factory->createInput(array(
                        'name' => 'property_description',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'StringLength',
                                'options' => array(
                                    'encoding' => 'UTF-8',
                                    'min' => 1,
                                    'max' => 100,
                                ),
                            ),
                        ),
            )));
         
         
         $inputFilter->add($factory->createInput(array(
                        'name' => 'property_price',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'StringLength',
                                'options' => array(
                                    'encoding' => 'UTF-8',
                                    'min' => 1,
                                    'max' => 100,
                                ),
                            ),
                        ),
            )));

        
         $inputFilter->add($factory->createInput(array(
                        'name' => 'bathroom_number',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'StringLength',
                                'options' => array(
                                    'encoding' => 'UTF-8',
                                    'min' => 1,
                                    'max' => 100,
                                ),
                            ),
                        ),
            )));
         
          $inputFilter->add($factory->createInput(array(
                        'name' => 'bedroom_number',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'StringLength',
                                'options' => array(
                                    'encoding' => 'UTF-8',
                                    'min' => 1,
                                    'max' => 100,
                                ),
                            ),
                        ),
            )));
         
         
          
           $inputFilter->add($factory->createInput(array(
                        'name' => 'state',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'StringLength',
                                'options' => array(
                                    'encoding' => 'UTF-8',
                                    'min' => 1,
                                    'max' => 100,
                                ),
                            ),
                        ),
            )));
          
         
           
            $inputFilter->add($factory->createInput(array(
                        'name' => 'city',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'StringLength',
                                'options' => array(
                                    'encoding' => 'UTF-8',
                                    'min' => 1,
                                    'max' => 100,
                                ),
                            ),
                        ),
            )));
           
           
            
             $inputFilter->add($factory->createInput(array(
                        'name' => 'zip',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'StringLength',
                                'options' => array(
                                    'encoding' => 'UTF-8',
                                    'min' => 1,
                                    'max' => 100,
                                ),
                            ),
                        ),
            )));

             
             $inputFilter->add($factory->createInput(array(
                        'name' => 'country',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'StringLength',
                                'options' => array(
                                    'encoding' => 'UTF-8',
                                    'min' => 1,
                                    'max' => 100,
                                ),
                            ),
                        ),
            )));
             

        // File Input
        $fileInput = new InputFilter\FileInput('image-file');
        $fileInput->setRequired(true);






        $fileInput->getFilterChain()->attachByName(
                'filerenameupload', array(
            'target' => './public/tmpuploads/avatar.png',
            'randomize' => true,
                )
        );
        $inputFilter->add($fileInput);

        $this->setInputFilter($inputFilter);
    }

}

?>
