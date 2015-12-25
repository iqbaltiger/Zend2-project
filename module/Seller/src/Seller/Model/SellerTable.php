<?php

namespace Seller\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql;

class SellerTable extends AbstractTableGateway {

    protected $table = 'seller';
   // protected $adapter ;

    public function __construct(Adapter $adapter) {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new Seller());

        $this->initialize();
    }

    public function saveProperty(Seller $seller) {

     $adapter = $this->adapter;
       $sql = new Sql($adapter);
    //$select = $sql->select();
        $select = new Select();
    $select->from('user');
// $select->join('user', 'tbl_post_category.pc_post_id=tbl_post.post_id', array(), 'left');
 $select->where(array('user_id' =>$seller->user_id ));
 //$select->group('tbl_post.post_id');
   
    //$select->limit($limit);

    $selectString = $sql->getSqlStringForSqlObject($select);
    $results = $adapter->query($selectString, $adapter::QUERY_MODE_EXECUTE);
    $test =  $results->toArray();
    
    var_dump($test);
    exit;
       
      


        $data = array(
            'property_title' => $seller->property_title,
            'property_description' => $seller->property_description,
            'property_price' => $seller->property_price,
            'property_image' => $seller->property_image,
            'bedroom_number' => $seller->bedroom_number,
            'bathroom_number' => $seller->bathroom_number,
            'state' => $seller->state,
            'city' => $seller->city,
            'zip' => $seller->zip,
            'country' => $seller->country,
            'user_id' => $seller->user_id,
        );



        $this->insert($data);
    }

    public function fetchAll() {
        $resultSet = $this->select();
        return $resultSet;
    }

    public function fetchAllProperty(Select $select = null) {
        if (null === $select)
            $select = new Select();
        $select->from($this->table);
        
        $resultSet = $this->selectWith($select);
        $resultSet->buffer();
        return $resultSet;
    }

    public function getProperty($id) {
        $id = (int) $id;
        $rowset = $this->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

}

?>