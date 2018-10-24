<?php

$data = $_POST;
$mac_provided = $data['mac'];  // Get the MAC from the POST data
unset($data['mac']);  // Remove the MAC key from the data.

$ver = explode('.', phpversion());
$major = (int) $ver[0];
$minor = (int) $ver[1];

if($major >= 5 and $minor >= 4){
     ksort($data, SORT_STRING | SORT_FLAG_CASE);
}
else{
     uksort($data, 'strcasecmp');
}

include 'src/DBConnection.php';
include 'src/DBFunctions.php';

// You can get the 'salt' from Instamojo's developers page(make sure to log in first): https://www.instamojo.com/developers
// Pass the 'salt' without the <>.
$mac_calculated = hash_hmac("sha1", implode("|", $data), "873c0c167ec24e7abedd20f5ca147fa7");

if($mac_provided == $mac_calculated){
    echo "MAC is fine";
    // Do something here
    if($data['status'] == "Credit"){
       // Payment was successful, mark it as completed in your database

                $to = "nsripada7@gmail.com";
                $subject = 'Website Payment Request ' .$data['buyer_name'].'';
                $message = "<h1>Payment Details</h1>";
                $message .= "<hr>";
                $message .= '<p><b>ID:</b> '.$data['payment_id'].'</p>';
                $message .= '<p><b>Amount:</b> '.$data['amount'].'</p>';
                $message .= "<hr>";
                $message .= '<p><b>Name:</b> '.$data['buyer_name'].'</p>';
                $message .= '<p><b>Email:</b> '.$data['buyer'].'</p>';
                $message .= '<p><b>Phone:</b> '.$data['buyer_phone'].'</p>';

                $message .= '<p><b>status:</b> '.$data['status'].'</p>';
                $message .= "<hr>";


                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                // send email

                mail($to, $subject, $message, $headers);

                echo "Updating";
                $dbFunctions = new DB\DBFunctions();
                $qr = $dbFunctions->updatePayment($data['payment_request_id'], $data['status']);
                if($qr){
                     echo "Updated status to credit";
                } else {
                    die();
                }
    }
    else{
       $dbFunctions = new DB\DBFunctions();
       $qr = $dbFunctions->updatePayment($data['payment_request_id'], "Failed");
       if($qr){
            echo "Updated status to credit";
       } else {
           die();
       }
    }
}
else{
    echo "Invalid MAC passed";
}
?>
