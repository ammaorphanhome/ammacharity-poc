<?php
$amount = $_POST["amount"];
$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$message = $_POST["message"];
$purpose = $_POST["purpose"];

include 'src/instamojo.php';

$api = new Instamojo\Instamojo('test_5f4292c874a5f602a115c0aa965', 'test_7aac381962a51a81aae0776e7c7','https://test.instamojo.com/api/1.1/');


try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => $purpose,
        "amount" => $amount,
        "buyer_name" => $name,
        "phone" => $phone,
        "send_email" => true,
        "send_sms" => true,
        "email" => $email,
        'allow_repeated_payments' => false,
        "redirect_url" => "http://www.nsripada.com/ammacharity/thankyou.php",
        "webhook" => "http://www.nsripada.com/ammacharity/webhook.php"
        ));
    print_r($response);

    $pay_ulr = $response['longurl'];

    //Redirect($response['longurl'],302); //Go to Payment page

    //database connection

    $payment=json_decode($response,true);
    if($payment['success']==true){
        echo "success";
        //Payment Data
        $response=$payment['payment_request'];

        $con=mysqli_connect("ammasite.cjnoc2scvonj.us-east-1.rds.amazonaws.com:3306", "root", "Smile127!", "ammasitedb");
        if($con){
            echo "Database Host Connected ";
        }
        else{
            echo mysql_error();
            die();
        }
        echo "Inserting";
        $sql = "INSERT INTO `payment`(`id`, `phone`, `email`, `name`, `amount`, `purpose`, `status`)
                VALUES ('".$response['id']."','".$response['phone']."','".$response['email']."','".$response['buyer_name']."','".$response['amount']."','".$response['purpose']."','".$response['status']."')";
        $qr=mysqli_query($con, $sql);
        if($qr){
             echo "Inserted Payment record";
        } else {
            echo mysql_error();
            die();
        }
    }

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

    header("Location: $pay_ulr");
    exit();

}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}
  ?>
