<?php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Admin\Form\UserEditForm;

use Admin\Model\AdminTable;

class AdminController extends AbstractActionController
{
     protected $adminTable;

    public function indexAction()
    {
        
    

     
 
        
        
       return new ViewModel(array(
            'users' => $this->getAdminTable()->fetchAll(),
        ));
       
      
      
    }

    
    
    public function editAction() {
        
        
        
        
        $id = (int)$this->params('id');
        if (!$id) {
            return $this->redirect()->toRoute('admin', array('action'=>'index'));
        }
        $user = $this->getAdminTable()->getUser($id);
        
        

        $form = new UserEditForm();
        $form->bind($user);
        $form->get('submit')->setAttribute('value', 'Edit');
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->getAdminTable()->saveuser($user);

                // Redirect to list of albums
                return $this->redirect()->toRoute('admin');
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
        );
        
    }
    
    
    
    public function getAdminTable()
    {
        if (!$this->adminTable) {
            $sm = $this->getServiceLocator();
            $this->adminTable = $sm->get('Admin\Model\AdminTable');
        }
        return $this->adminTable;
    }  
    
    
    
    
    public function deleteAction()
    {
        $id = (int)$this->params('id');
        if (!$id) {
            return $this->redirect()->toRoute('admin');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost()->get('del', 'No');
            if ($del == 'Yes') {
                echo $id = (int)$request->getPost()->get('id');
                $this->getAdminTable()->deleteUser($id);
            }

            // Redirect to list of albums
            return $this->redirect()->toRoute('admin');
        }

        return array(
            'id' => $id,
            'user' => $this->getAdminTable()->getUser($id)
        );
    }
    
    
    
}
