<?php

namespace Admin\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;

class AdminTable extends AbstractTableGateway
{
    protected $table = 'user';

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
//        $this->resultSetPrototype->setArrayObjectPrototype(new Album());

        $this->initialize();
    }

    public function fetchAll()
    {
        $resultSet = $this->select();
        return $resultSet;
    }

    
     public function getUser($id)
    {
        $id  = (int) $id;
        $rowset = $this->select(array('user_id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }
    
    public function saveuser($user)
    {
        $data = array(
            'username' => $user->username,
            'email'  => $user->email,
            'state' =>$user->checkbox
        );
        
      

        $id = (int)$user->user_id;
        if ($id == 0) {
            $this->insert($data);
        } else {
            if ($this->getUser($id)) {
                $this->update($data, array('user_id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }
    
     public function deleteUser($id)
    {
         echo $id;
         
        
         $this->delete(array('user_id' => $id));
    }
   

}
