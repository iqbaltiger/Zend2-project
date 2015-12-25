<?php

namespace Auction\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;

class AuctionTable extends AbstractTableGateway
{
    
     protected $table = 'auction';

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        //$this->resultSetPrototype = new ResultSet();
        //$this->resultSetPrototype->setArrayObjectPrototype(new Album());

        $this->initialize();
    }
    
    
   public function saveAuction($auctionData)
    {
     
       
       $data = array(
            'artist' => $auctionData['artist'],
            'title'  => $auctionData['title'],
        );

        
            $this->insert($data);
        
    }
    
}?>