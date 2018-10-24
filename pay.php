<?php
$amount = $_POST["amount"];
$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$message = $_POST["message"];
$purpose = $_POST["purpose"];
$message = $_POST["message"];

include 'src/instamojo.php';
include 'src/DBConnection.php';
include 'src/DBFunctions.php';
include 'src/PaymentInfo.php';

$api = new Instamojo\Instamojo('test_5f4292c874a5f602a115c0aa965', 'test_7aac381962a51a81aae0776e7c7','https://test.instamojo.com/api/1.1/');


try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => $purpose,
        "amount" => $amount,
        "buyer_name" => $name,
        "phone" => $phone,
        "message" => $message,
        "send_email" => true,
        "send_sms" => true,
        "email" => $email,
        'allow_repeated_payments' => false,
        "redirect_url" => "https://www.nsripada.com/thankyou.php",
        "webhook" => "https://www.nsripada.com/webhook.php"
        ));
    print_r($response);

    $pay_ulr = $response['longurl'];

    //insert a record in database
    if($response['status']=='Pending'){
        echo "Pending";
        //Payment Data
        $dbFunctions = new DB\DBFunctions();
        $paymentDetails = new DB\PaymentInfo($response['id'], $response['phone'], $response['email'], $response['buyer_name'], $response['amount'],
                        $response['purpose'], $message, $response['status'], $response['created_at'], $response['modified_at']);
        $qr = $dbFunctions->insertPayment($paymentDetails);

        if($qr){
             echo "Inserted Pending Payment record";
        } else {
            die();
        }
    }

    //Redirect($response['longurl'],302); //Go to Payment page

    header("Location: $pay_ulr");
    exit();

}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}
  ?>
