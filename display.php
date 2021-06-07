<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total customers</title>
    <link rel="stylesheet" href="display.css">
</head>
<body class="bg">
    <div>
        <div>
            <img src="Logo.png" alt="" width="500" style="margin-left: 28%;">
        </div>
        <nav class="nav">
            <ul>
                <li>
                    <a href="index.html">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="Customer.php">View Customer</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="TransactionHistory.php">Transaction History</a>&nbsp;&nbsp;&nbsp;&nbsp;
                </li>
            </ul>
        </nav>
        <div class="header">
            <h1>List of Customers</h1>
        </div>
            <table>
                <thead>
                    <tr>
                    <th>Sr.no.</th>
                    <th>Name</th>
                    <th>Email.Id</th>
                    <th>Balance</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include 'Mysql.php';
                    $selectquery="select * from customers";
                    $query = mysqli_query($conn,$selectquery);
                    $num =mysqli_num_rows($query);
                    while($res = mysqli_fetch_array($query)){
                    ?>
                        <tr>
                            <td><?php echo $res['ID'];?></a></td>
                            <td><?php echo $res['Name'];?></td>
                            <td><?php echo $res['Email Id'];?></td>
                            <td><?php echo $res['Balance'];?></td>
                    <?php    
                    }
                ?>
                </tbody>
            </table>
    </div>        
</body>
</html>
