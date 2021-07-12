<?php session_start(); 

$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'tsfbank');

$s = "select * from customers";
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);

?>

<html>
<head>
    <title>All customers | Basic Banking System</title>
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
            <?php
            if(isset($_SESSION['status'])){ 
                echo $_SESSION['status'];
                unset($_SESSION['status']);
            }
            ?>
        <h2 class="title">All Customers</h2>
        <table class="table-box">
            <tr class="table-row ">
                <th class="table-cell table-head first-cell">Id</th>
                <th class="table-cell table-head">Name</th>
                <th class="table-cell table-head">Email</th>
                <th class="table-cell table-head">Balance</th>
                <th class="table-cell table-head">Action</th>
            </tr>

            <?php
            if($num > 0){
                while($row = mysqli_fetch_assoc($result)){ ?>
                    <tr class='table-row'>
                        <td class='table-cell first-cell'><?php echo $row['id']; ?></td>
                        <td class='table-cell'><?php echo $row['name']; ?></td>
                        <td class='table-cell'><?php echo $row['email']; ?></td>
                        <td class='table-cell last-cell'><?php echo $row['amount']; ?></td>
                        <td class='table-cell'><a href='transfermoney.php?name=<?php echo $row['name'];?>' class='btn'>Transfer &#8377;</a> 
                        </td>
                    </tr>
                    <?php
                }
            }
            else{
                echo "list is empty";
            }
            ?>
        </table>
    </div>
    </div>

</body>
</html>
