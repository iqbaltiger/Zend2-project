<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Seller\Model\Seller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel(array(
            'sellers' => $this->getSellerTable()->fetchAll(),
        ));
    }
    
    
    public function getSellerTable()
    {
//        if (!$this->sellerTable) {
            $sm = $this->getServiceLocator();
            $this->sellerTable = $sm->get('Seller\Model\SellerTable');
//        }
        return $this->sellerTable;
    }  
    
    
}
