<?php
namespace DB;

Class PaymentInfo {

  protected $id  = null;
  protected $phone = null;
  protected $email = null;
  protected $name = null;
  protected $amount = null;
  protected $purpose = null;
  protected $status = null;
  protected $created_dt = null;
  protected $modified_dt = null;
  protected $message = null;

  public function __construct($id, $phone, $email, $name, $amount, $purpose, $message, $status, $created_dt, $modified_dt)
  {
      $this->id = (string) $id;
      $this->phone = (string) $phone;
      $this->email = (string) $email;
      $this->name = (string) $name;
      $this->amount = (string) $amount;
      $this->purpose = (string) $purpose;
      $this->message = (string) $message;
      $this->status = (string) $status;
      $this->created_dt = (string) $created_dt;
      $this->modified_dt = (string) $modified_dt;
  }

  function get_id() {
    return $this->id;
  }
  function get_phone() {
    return $this->phone;
  }
  function get_email() {
			return   $this->email;
	}
  function get_name() {
  			return $this->name;
  }
  function get_amount() {
			return $this->amount;
	}
  function get_purpose() {
  			return $this->purpose;
  }
  function get_message() {
  			return $this->message;
  }

  function get_status() {
			return $this->status;
	}

  function get_created_dt() {
  			return $this->created_dt;
  }
  function get_modified_dt() {
			return $this->modified_dt;
	}

}
?>
