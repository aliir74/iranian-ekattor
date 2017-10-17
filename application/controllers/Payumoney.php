<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*  
 *  @author   : Creativeitem
 *  date    : 14 september, 2017
 *  Ekattor School Management System Pro
 *  http://codecanyon.net/user/Creativeitem
 *  http://support.creativeitem.com
 */

class Payumoney extends CI_Controller
{
  function payment(){

  }

  function on_success(){
    $status=$_POST["status"];
    $firstname=$_POST["firstname"];
    $amount=$_POST["amount"];
    $txnid=$_POST["txnid"];
    $posted_hash=$_POST["hash"];
    $key=$_POST["key"];
    $productinfo=$_POST["productinfo"];
    $email=$_POST["email"];
    $salt = $this->db->get_where('settings' , array('type' =>'payumoney_salt_id'))->row()->description;
    $student_id = $_POST['student_id'];
    $invoice_id = $_POST['invoice_id'];
    If (isset($_POST["additionalCharges"])) {
           $additionalCharges=$_POST["additionalCharges"];
            $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
          }
    	else {

            $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

             }
    		 $hash = hash("sha512", $retHashSeq);

           if ($hash != $posted_hash) {
    	       $this->session->set_flashdata('error_message', get_phrase('invalid_transaction'));
    		   }
    	   else {
             $data['payment_details']   = "";
             $data['payment_timestamp'] = strtotime(date("m/d/Y"));
             $data['payment_method']    = 'payumoney';
             $data['status']            = 'paid';
             $this->db->where('invoice_id', $invoice_id);
             $this->db->update('invoice', $data);
             $this->session->set_flashdata('flash_message', get_phrase('payment_successfully_completed'));
              // echo "<h3>Thank You. Your order status is ". $status .".</h3>";
              // echo "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>";
              // echo "<h4>We have received a payment of Rs. " . $amount . ".</h4>";
    		   }
    redirect(base_url() . 'index.php?parents/invoice/'.$student_id, 'refresh');
  }
  function on_failure(){
    $status=$_POST["status"];
    $firstname=$_POST["firstname"];
    $amount=$_POST["amount"];
    $txnid=$_POST["txnid"];

    $posted_hash=$_POST["hash"];
    $key=$_POST["key"];
    $productinfo=$_POST["productinfo"];
    $email=$_POST["email"];
    $salt="GQs7yium";
    $student_id = $_POST['student_id'];
    If (isset($_POST["additionalCharges"])) {
           $additionalCharges=$_POST["additionalCharges"];
            $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

                      }
    	else {

            $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

             }
    		 $hash = hash("sha512", $retHashSeq);

           if ($hash != $posted_hash) {
    	       $this->session->set_flashdata('error_message', get_phrase('invalid_transaction'));
    		   }
    	   else {
             echo "<h3>Your order status is ". $status .".</h3>";
             echo "<h4>Your transaction id for this transaction is ".$txnid.". You may try making the payment by clicking the link below.</h4>";

    		 }
         redirect(base_url() . 'index.php?parents/invoice/'.$student_id, 'refresh');
  }
}
