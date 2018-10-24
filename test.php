<?php

try {

    //database connection
    $con=mysqli_connect("ammasite.cjnoc2scvonj.us-east-1.rds.amazonaws.com:3306", "root", "Smile127!", "ammasitedb");
    if($con){
        echo "Database Host Connected
    ";
    }
    else{
        echo mysql_error();
        die();
    }
    echo "Inserting";
    $sql = "INSERT INTO payment (id, phone , email, name, amount, purpose, status) VALUES ('test','test','test','test','test','test','test')";
    $qr=mysqli_query($con, $sql);
    if($qr){
        echo "Inserted Payment record";
    } else {
        echo "Failed to insert payment record";
    }

  //  header("Location: $pay_ulr");
    exit();

}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}
  ?>
