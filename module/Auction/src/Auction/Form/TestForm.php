<?php
namespace Auction\Form;
use Zend\Captcha;
use Zend\Form\Element;
use Zend\Form\Form;

class TestForm extends Form
{
    public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('album');

         $username = new Element('username');

    $username->setLabel('Username');
     $username->setAttributes(array(
        'type'  => 'text',
        'class' => 'username',
        'size'  => '30',
         'placeholder'=>'Please Enter Your Username',
         'background-color'=>'red',
    ));
     
     $username->setAttribute('background-color','red');
    $color = new Element\Color('color');
$color->setLabel('Background color');
     
$checkbox = new Element\Checkbox('checkbox');
$checkbox->setLabel('A checkbox');
$checkbox->setUseHiddenElement(true);
$checkbox->setCheckedValue("good");
$checkbox->setUncheckedValue("bad");
     $captcha = new Element\Captcha('captcha');
$captcha
    ->setCaptcha(new Captcha\Dumb())
    ->setLabel('Please verify you are human');
     
$date = new Element\Date('appointment-date');
$date
    ->setLabel('Appointment Date')
    ->setAttributes(array(
        'min'  => '2012-01-01',
        'max'  => '2020-01-01',
        'step' => '1', // days; default step interval is 1 day
    )); 

$month = new Element\Month('month');
$month
    ->setLabel('Month')
    ->setAttributes(array(
        'min'  => '2012-01',
        'max'  => '2020-01',
        'step' => '1', // months; default step interval is 1 month
    ));

$submit = new Element\Button('submit');
$submit->setLabel('submit');
 
    $this->add($username);    
    $this->add($captcha); 
    $this->add($checkbox);
    $this->add($color);
    $this->add($date);
   
    
    $this->add($month);
        $this->add($submit);
     }
}
