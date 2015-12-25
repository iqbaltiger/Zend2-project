<?php

namespace Seller\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Seller implements InputFilterAwareInterface {

    public $id;
    public $property_title;
    public $property_description;
    public $property_price;
    public $property_image;
    public $bathroom_number;
    public $bedroom_number;
    public $state;
    public $city;
    public $zip;
    public $country;
    public $user_id;
//    public $property_country;
//    public $property_state;
//    public $property_city
//    public $property_zip;
//    public $property_address;

    protected $inputFilter;

    /**
     * Used by ResultSet to pass each database row to the entity
     */
    public function exchangeArray($data) {



        //$property_image = substr(($data['image-file']['tmp_name']),-24);

        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->property_title = (isset($data['property_title'])) ? $data['property_title'] : null;
        $this->property_description = (isset($data['property_description'])) ? $data['property_description'] : null;
        $this->property_price = (isset($data['property_price'])) ? $data['property_price'] : null;
        //$this->property_image = $property_image;
        $this->property_image = (isset($data['property_image'])) ? $data['property_image'] : null;

        $this->bedroom_number = (isset($data['bedroom_number'])) ? $data['bedroom_number'] : null;
        $this->bathroom_number = (isset($data['bathroom_number'])) ? $data['bathroom_number'] : null;
        $this->state = (isset($data['state'])) ? $data['state'] : null;
        $this->city = (isset($data['city'])) ? $data['city'] : null;
        $this->zip = (isset($data['zip'])) ? $data['zip'] : null;
        $this->country = (isset($data['country'])) ? $data['country'] : null;
        $this->user_id = (isset($data['user_id'])) ? $data['user_id'] : null;
        
//        $this->property_image = (isset($data['property_image'])) ? $data['property_image'] : null;
//        $this->property_country = (isset($data['property_country'])) ? $data['property_country'] : null;
//        $this->property_state = (isset($data['property_state'])) ? $data['property_state'] : null;
//        $this->property_city = (isset($data['property_city'])) ? $data['property_city'] : null;
//        $this->property_zip = (isset($data['property_zip'])) ? $data['property_zip'] : null;
//        $this->property_address = (isset($data['property_address'])) ? $data['property_address'] : null;
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



            $inputFilter->add(
                    $factory->createInput(array(
                        'name' => 'property_image',
                        'required' => true,
                    ))
            );







            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }

}
