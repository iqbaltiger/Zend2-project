<?php

namespace Auction\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Auction\Model\Auction;
use Auction\Form\AuctionForm;

class AuctionController extends AbstractActionController
{
    

    public function indexAction()
    {
      $auctionForm = new AuctionForm();
      
      //$auction = new \Auction\Model\AuctionTable();
      $request = $this->getRequest();
        if ($request->isPost()) {
      
       $auctionData = $request->getPost();
           
               
                $this->getAuctionTable()->saveAuction($auctionData);

                // Redirect to list of albums
                return $this->redirect()->toRoute('auction');
           
        }
      
      return array('form'=>$auctionForm);
    }

    public function getAuctionTable()
    {
       
            $sm = $this->getServiceLocator();
            $this->auctionTable = $sm->get('Auction\Model\AuctionTable');
        
        return $this->auctionTable;
    }     
   
    public function testAction()
            {
        
               $form = new \Auction\Form\TestForm();
               
               $form->setAttribute('action',  $this->url('auction/index'));
               
               return array('form'=>$form);
        
        
            }
    
}
