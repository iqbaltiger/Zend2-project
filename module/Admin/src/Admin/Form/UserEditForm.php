<?php
namespace Admin\Form;

use Zend\Form\Element;
use Zend\Form\Form;

class UserEditForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('album');

        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'user_id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));

        $this->add(array(
            'name' => 'username',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'User Name',
            ),
        ));

        $this->add(array(
            'name' => 'email',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Email',
            ),
        ));
        
        
        $this->add(array(
             'type' => 'Zend\Form\Element\Checkbox',
             'name' => 'checkbox',
             'options' => array(
                     'label' => 'Change State',
                     
                     'checked_value' =>1,
                     'unchecked_value' =>0
             )
     ));
        
        
        
        

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));

    }
}
