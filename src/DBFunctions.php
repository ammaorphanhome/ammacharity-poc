<?php
namespace DB;
require_once('DBConnection.php');

Class DBFunctions {

  function insertPayment(PaymentInfo $paymentInfo) {
      $Dbobj = new DBConnection();
      $id  = $paymentInfo->get_id();
      $phone = $paymentInfo->get_phone();
      $email = $paymentInfo->get_email();
      $name = $paymentInfo->get_name();
      $amount = $paymentInfo->get_amount();
      $purpose = $paymentInfo->get_purpose();
      $message = $paymentInfo->get_message();
      $status = $paymentInfo->get_status();
      $created_dt = $paymentInfo->get_created_dt();
      $modified_dt = $paymentInfo->get_modified_dt();

      $sql = "INSERT INTO `payment`(`id`, `phone`, `email`, `name`, `amount`, `purpose`, `message`, `status`, `created_dt`, `modified_dt`)
              VALUES ('".$id."','".$phone."','".$email."','".$name."','".$amount."', '".$purpose."', '".$message."', '".$status."', '".$created_dt."' , '".$modified_dt."')";

      $qr=mysqli_query($Dbobj->getdbconnect(), $sql);
      //echo "Insert executed Connected ".$qr;
      return $qr;
  }

  function updatePayment($id, $status) {
      $Dbobj = new DBConnection();

      $sql = "UPDATE `payment` SET `status`='".$status."' WHERE id='".$id."'";
      $qr=mysqli_query($Dbobj->getdbconnect(), $sql);

      return $qr;
  }

  function getLatestPayments() {
      $Dbobj = new DBConnection();
      $query = mysqli_query($Dbobj->getdbconnect(), "SELECT * FROM payment where status='Credit' order by modified_dt desc limit 4 ");
      return $query;
  }

  function getPayments() {
      $Dbobj = new DBConnection();
      $query = mysqli_query($Dbobj->getdbconnect(), "SELECT * FROM payment where status='Credit' order by modified_dt desc limit 50");
      return $query;
  }

}
?>
