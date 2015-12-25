<?php

namespace Registration\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Registration implements InputFilterAwareInterface {

    public $id;
    public $first_name;
    public $last_name;
    public $user_pass;
    public $user_email;
    public $user_country;
    public $user_state;
    public $user_city;
    public $user_zip;
    public $user_address;
    protected $inputFilter;

    /**
     * Used by ResultSet to pass each database row to the entity
     */
    public function exchangeArray($data) {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->first_name = (isset($data['first_name'])) ? $data['first_name'] : null;
        $this->last_name = (isset($data['last_name'])) ? $data['last_name'] : null;
        $this->user_pass = (isset($data['user_pass'])) ? $data['user_pass'] : null;
        $this->user_email = (isset($data['user_email'])) ? $data['user_email'] : null;
        $this->user_country = (isset($data['user_email'])) ? $data['user_country'] : null;
        $this->user_state = (isset($data['user_state'])) ? $data['user_state'] : null;
        $this->user_city = (isset($data['user_city'])) ? $data['user_city'] : null;
        $this->user_zip = (isset($data['user_zip'])) ? $data['user_zip'] : null;
        $this->user_address = (isset($data['user_address'])) ? $data['user_address'] : null;
    }

    public function getArrayCopy() {
        return get_object_vars($this);
    }

    public function setInputFilter(InputFilterInterface $inputFilter) {
        throw new \Exception("Not used");
    }

    public function getInputFilter() {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();

            $factory = new InputFactory();

//            $inputFilter->add($factory->createInput(array(
//                        'name' => 'id',
//                        'required' => true,
//                        'filters' => array(
//                            array('name' => 'Int'),
//                        ),
//            )));

            $inputFilter->add($factory->createInput(array(
                        'name' => 'first_name',
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
                        'name' => 'last_name',
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
                        'name' => 'user_pass',
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
                        'name' => 'user_email',
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
                        'name' => 'user_country',
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
                        'name' => 'user_state',
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
                        'name' => 'user_zip',
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
                        'name' => 'user_address',
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

            
            
            
            
            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }

}
