<?php

namespace Seller\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Http\PhpEnvironment\Request;
use Seller\Model\Seller;
use Seller\Form\SellerForm;
use Seller\Form\UploadForm;
use Seller\Form\EmailForm;
use Zend\Mail\Message;
use Zend\Mail\Transport\Sendmail;


class SellerController extends AbstractActionController {

    public function indexAction() {
        $form = new UploadForm('upload-form');

        if ($this->getRequest()->isPost()) {
            // Make certain to merge the files info!
            $post = array_merge_recursive(
                    $this->getRequest()->getPost()->toArray(), $this->getRequest()->getFiles()->toArray()
            );

            $form->setData($post);

            $seller = new Seller();
            //$form->setInputFilter($seller->getInputFilter());


            if ($form->isValid()) {
                $data = $form->getData();

                $property_image = substr(($data['image-file']['tmp_name']), -24);

                $data['property_image'] = $property_image;

                $seller = new Seller();

                $seller->exchangeArray($data);
                $this->getSellerTable()->saveProperty($seller);


                // Form is valid, save the form!
                return $this->redirect()->toRoute('seller');
            }
        }

        return array('form' => $form);
    }

    public function getSellerTable() {
//        if (!$this->sellerTable) {
        $sm = $this->getServiceLocator();
        $this->sellerTable = $sm->get('Seller\Model\SellerTable');
//        }
        return $this->sellerTable;
    }

    /*     * ************************************************* */

    public function uploadFormAction() {
        $form = new UploadForm('upload-form');
        $tempFile = null;

        $prg = $this->fileprg($form);
        if ($prg instanceof \Zend\Http\PhpEnvironment\Response) {
            return $prg; // Return PRG redirect response
        } elseif (is_array($prg)) {
            if ($form->isValid()) {
                $data = $form->getData();
                // Form is valid, save the form!
                return $this->redirect()->toRoute('upload-form/success');
            } else {
                // Form not valid, but file uploads might be valid...
                // Get the temporary file information to show the user in the view
                $fileErrors = $form->get('image-file')->getMessages();
                if (empty($fileErrors)) {
                    $tempFile = $form->get('image-file')->getValue();
                }
            }
        }

        return array(
            'form' => $form,
            'tempFile' => $tempFile,
        );
    }

    public function detailsAction() {
        
        
       $id = (int)$this->params('id');
       
       if($id!=0)
       {
       $property_details = $this->getSellerTable()->getProperty($id);
       }
      
       

        $emailForm = new EmailForm('email-form');

       $request = $this->getRequest();

        if ($this->getRequest()->isPost()) {

           $data = $request->getPost();
           
          $email = $data->user_email;
          
          
            $message = new Message();
            
            $message->addFrom($email)
                    ->addTo("iqbal.wdz@gmail.com")
                    ->setSubject("Sending an email from Property Details Page");
            $message->setBody("This is the message body.");
            
            $transport = new Mail\Transport\Sendmail();
            $transport->send($message);
            
            
            return $this->redirect()->toRoute('application');
            
        }

        return array('form' => $emailForm,'property_details'=>$property_details);
    }

    
    public function propertyAction(){
        
        
        
        
        
    }
    
    
    
    
    
}
