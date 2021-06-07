<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
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
                    <a href="Tmoney.php">Transfer Money</a>&nbsp;&nbsp;&nbsp;&nbsp;
                </li>
            </ul>
        </nav>
        <div class="container">
            <h2 class="head" >Transaction History</h2>
            
            <br>
            <div>
                <table class="table" style="witdh:500px">
                    <thead style="color : black;">
                        <tr>
                            <th>S.No.</th>
                            <th>Sender</th>
                            <th>Receiver</th>
                            <th>Amount</th>
                            <th>Date & Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

            include 'Mysql.php';

            $sql = "select * from transactionhistory";

            $query = mysqli_query($conn, $sql);

            while ($rows = mysqli_fetch_assoc($query)) {
                ?>

            <tr style="color : black;">
                <td class="py-2"><?php echo $rows['S.no.']; ?></td>
                <td class="py-2"><?php echo $rows['sender']; ?></td>
                <td class="py-2"><?php echo $rows['receiver']; ?></td>
                <td class="py-2"><?php echo $rows['money']; ?> </td>
                <td class="py-2"><?php echo $rows['D & t']; ?> </td>
                
                <?php
                }
                                
                 ?>
                </tbody>
            </table>
                        
            </div>
        </div>
    </center>
</body>

</html>
