<?php
include 'Mysql.php';
session_start();
if (isset($_POST['submit'])) {        
    $from = $_SESSION['ID'];
    $to = $_POST['to'];
    $amount = $_POST['Balance'];

    $sql = "select * from customers where ID=$from";
    $query = mysqli_query($conn, $sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from customers where ID=$to";
    $query = mysqli_query($conn, $sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount) < 0) {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }



    // constraint to check insufficient balance.
    else if ($amount > $sql1['Balance']) {

        echo '<script type="text/javascript">';
        echo ' alert("Sorry, Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }


    // constraint to check zero values
    else if ($amount == 0) {

        echo "<script type='text/javascript'>";
        echo "alert('Oops! Zero value cannot be transferred')";
        echo "</script>";
    } else {

        // deducting amount from sender's account
        $newbalance = $sql1['Balance'] - $amount;
        $sql = "UPDATE customers set Balance=$newbalance where ID=$from";
        mysqli_query($conn, $sql);


        // adding amount to reciever's account
        $newbalance = $sql2['Balance'] + $amount;
        $sql = "UPDATE customers set Balance=$newbalance where ID=$to";
        mysqli_query($conn, $sql);

        $sender = $sql1['Name'];
        $receiver = $sql2['Name'];
        $sql = "INSERT INTO transactionhistory(`sender`, `receiver`, `money`) VALUES ('$sender','$receiver','$amount')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "<script> alert('Transaction Successful');
                                     window.location='TransactionHistory.php';
                           </script>";
        }

        $newbalance = 0;
        $amount = 0;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Transaction.css">
</head>
<body class="bg">
        <center>
        <div>
            <img src="Logo.png" alt="" width="500" >
        </div>
        <nav class="nav">
            <ul>
                <li>
                    <a href="index.html">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="display.php">View All Customer</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="TransactionHistory.php">Transaction History</a>&nbsp;&nbsp;&nbsp;&nbsp;
                </li>
            </ul>
        </nav>
            <h1 class="head">Transaction</h1>   
            <h4 style="color:lavender;margin-right:290px">Transfer From:-</h4>
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email Id</th>
                    <th>Balance</th>
                </tr> <br>
                <tr>
                    <td><?php echo $_SESSION['ID']?></td>
                    <td><?php echo  $_SESSION['Name']?></td>
                    <td><?php echo $_SESSION['Email Id']?></td>
                    <td><?php echo  $_SESSION['Balance']?></td> 
                </tr>
            </table>
        </div><form method="post" name="Transfer" class="tabletext"><br>
        <?php $sid = $_SESSION['ID'];?>
        <label style="color : black;"><b style="color:lavender;">Transfer To:</b></label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'Mysql.php';
                $sql = "select * from customers where ID!=$sid";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    echo "Error " . $sql . "<br>" . mysqli_error($conn);
                }
                while ($rows = mysqli_fetch_array($result)) {
                    ?>
                    <option class="table" value="<?php echo $rows['ID']; ?>">
                        
                        <?php echo $rows['Name']; ?> , Balance:-
                        <?php echo $rows['Balance']; ?> 
                        
                    </option><?php
                }
                ?>
                </select>
                <br><br>
                <label style="color : black;"><b style="color:lavender;font-size:large" >Enter Amount to be transferred:</b></label>&nbsp;&nbsp;
                <input type="number" class="form-control" name="Balance" required style="margin-left:0px;width:150px">
            <br><br><br><br><br>
            <div class="text-center">
                <button class="btn mt-3" name="submit" type="submit" id="myBtn"><b style="color:lavender;">Transfer Money</b></button>
                </div>
            </form>
        </center>
        
<body>
</html>
