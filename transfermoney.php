<?php 
session_start();

$name = $_GET['name'];

$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'tsfbank');

$s = "select * from customers where name = '$name'";
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);

$s2 = "select * from customers";
$result2 = mysqli_query($con, $s2);
$num2 = mysqli_num_rows($result2);
?>

<html>
<head>
    <title>Transfer Money | Basic Banking System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header">
    <div class="container">
    <div class="navbar">
            <div class="logo">
                <a href="index.php"><img src="images/bankLogo.png" width="60px"></a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="viewcustomers.php">Customers</a></li>
                    <li><a href="transferhistory.php">Transfers</a></li>
                </ul>
            </nav>
            </div>
    </div>

    <div class="container">
        <div class="row">
        <h2 class="title">Transfer Money</h2>
            <div class="col-lg-6">
            <form action="middletransfer.php" method="POST">
            <?php
            if($num > 0){
                while($row = mysqli_fetch_assoc($result)){ ?>
                <div class="info">
                    <h6 class="small-header">Sender's Information</h6>
                    <p><b>Name  : </b><input type="text" value="<?php echo $row['name']; ?>" name="sendername" readonly="readonly"></p>
                    <p><b>Email  : </b><input type="text" value="<?php echo $row['email']; ?>" name="senderemail" readonly="readonly"></p>
                    <p><b>Account Balance  : </b><input type="text" value="<?php echo $row['amount']; ?>" name="senderbalance" readonly="readonly"></p>
                
                    <h6 class="small-header">Receiver's Information</h6>
                    <p><b>Name  : </b>
                        <select name="receiverid">
                        <option value="0" selected>Open this select menu</option>
                        <?php
                        if ($num2 > 0){
                            while($row2 = mysqli_fetch_assoc($result2)){
                                if($row2['id'] != $row['id']){
                        ?>
                            <option value="<?php echo $row2['id']; ?>"><?php echo $row2['name']; ?></option>
                        <?php
                            }}
                        } ?>
                        </select></p>
                        <p><b>Amount  : </b><input type="text" name="amt" required></p>
                </div>
                <button type="submit" class="btn btn-send">Send</button>
                </form>
                    <?php
                }
            }
            else{
                echo "list is empty";
            }
            ?>
            </div>
            <div class="col-lg-6">
                <img src="images/money.png" class="moneyImg">
            </div>
        </div>
    </div>
    </div>

</body>
</html>
