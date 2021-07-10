<?php session_start(); 

$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'tsfbank');

$sendername = $_POST['sendername'];
$senderemail = $_POST['senderemail'];
$senderbalance = $_POST['senderbalance'];
$receiverid = $_POST['receiverid'];
$amtToSend = $_POST['amt'];

$receiverquery = "select * from customers where id = '$receiverid'";
$result2 = mysqli_query($con, $receiverquery);
$num2 = mysqli_num_rows($result2);

if ($num2 > 0){
    while($row = mysqli_fetch_assoc($result2)){
        $receiverbalance = $row['amount'];
        $receivername = $row['name'];
    }
}

if($amtToSend > $senderbalance){
    $_SESSION['status'] = '<div class="alert alert-danger">
        <strong>Transaction failed !</strong> Balance was insufficient to complete recent transaction.
        </div>';
        header('location:viewcustomers.php');
}
elseif($amtToSend <= 0){
    $_SESSION['status'] = '<div class="alert alert-danger">
        <strong>Transaction failed !</strong> Please enter valid amount to transfer.
        </div>';
        header('location:viewcustomers.php');
}
else{
if($receiverid === '0') {
    $_SESSION['status'] = '<div class="alert alert-warning">
        <strong>Attention !</strong> Please select receiver name from dropdown.
        </div>';
        header('location:viewcustomers.php');
}
else{
    $amtAtSender = $senderbalance - $amtToSend;
    $amtAtReceiver = $receiverbalance + $amtToSend;

    $s2 = "update customers set amount = '$amtAtSender' where name = '$sendername'";
    mysqli_query($con, $s2);

    $s3 = "update customers set amount = '$amtAtReceiver' where name = '$receivername'";
    mysqli_query($con, $s3);

    $s4 = "insert into transfers(Sender, Receiver, Amount) values('$sendername','$receivername','$amtToSend')";
    mysqli_query($con, $s4);

    $_SESSION['status'] = '<div class="alert alert-success">
        <strong>Congratulations !</strong> Transaction successful.
        </div>';
    header('location:transferhistory.php');
}
}

?>