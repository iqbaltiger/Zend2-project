<?php

namespace Registration\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;

class RegistrationTable extends AbstractTableGateway
{
    
    protected $table = 'registration';

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new Registration());

        $this->initialize();
    }
    
     public function saveUser(Registration $registration)
    {
        
         $data = array(
            'first_name' => $registration->first_name,
            'last_name'  => $registration->last_name,
            'user_pass'  => md5($registration->user_pass),
            'user_email'  => $registration->user_email,
            'user_country'  => $registration->user_country,
            'user_state'  => $registration->user_state,
            'user_city'  => $registration->user_city,
            'user_zip'  => $registration->user_zip,
            'user_address'  => $registration->user_address
        );

        
        
            $this->insert($data);
            
    }
}

?>