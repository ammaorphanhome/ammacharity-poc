<?php
namespace DB;

class DBConnection {

  function getdbconnect(){
      // $con=mysqli_connect("ammasite.cjnoc2scvonj.us-east-1.rds.amazonaws.com:3306", "root", "Smile127!", "ammasitedb");
      $con=mysqli_connect("localhost:3306", "root", "root", "ammasitedb");
      if($con){
          //print("Database Host Connected");
      } else{
          echo mysql_error();
          die();
      }
      return $con;
  }
}
?>
