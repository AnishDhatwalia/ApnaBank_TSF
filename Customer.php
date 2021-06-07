<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .bg{
                background-image: url("Web\ Bg.jpg");
        }
        table {
            width: 80%;   
            margin-left:80px;     
            font-family: arial, sans-serif;
            border-collapse: collapse;
            }
        th, td {
            padding: 8px;
            color: lavender;
            text-align: left;
            border-top: 1px solid #dee2e6;
            border-bottom:5px solid #deedf4;
            }
        tr:hover{
            background-color: #04708b;
            }
            nav li{
                margin-left: 60%; 
                font-size: larger;
                list-style: none;
            }
            nav li a{
                text-decoration:none;
                color: rgb(156, 195, 247);
            }
            nav li a:hover{
                color: lavenderblush;
            }
            .bt{
                background-color:#201261;;
                border: 0px solid transparent;
            }
            .bt:hover{
                transform: scale(1.1);
                background-color:#2d0db8;
            }
            .Tran{
                padding:5px;
                text-decoration:none;
                font-size:large;
                color:#deedf4;
            }
    </style>
</head>
<body class="bg">
        <div class="">
            <div>
                <img src="Logo.png" alt="" width="500" style="margin-left: 28%;">
            </div>
            <nav class="nav">
            <ul>
                <li>
                    <a href="index.html">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="http://localhost\banking\display.php">View All Customers</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="http://localhost/banking/TransactionHistory.php">Transaction History</a>&nbsp;&nbsp;&nbsp;&nbsp;
                </li>
            </ul>
            </nav>
            <center>
                <h1 style="color: lavender;">Customer Details</h1>
                <?php
                    ?>
                    <div class="container">
                    <form action="" method="POST">
                    <input type="text" name ="ID" placeholder="Enter The ID of the customer" autofocus style="width:180px">&nbsp;&nbsp; 
                    <input type="submit" name="search" class="bt" required style="color:Lavender;font-size:15px">
                    </form>

                    <table>
                    <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email Id</th>
                    <th>Balance</th>
                    </tr> <br>
                    <?php
                    include 'Mysql.php';
                    if(isset($_POST['search']))
                    {
                        $ID=$_POST['ID'];
                        $query="SELECT * FROM customers where ID='$ID'";
                        $query_run=mysqli_query($conn,$query);
                        while($row = mysqli_fetch_array($query_run))
                        {
                            ?>
                            <tr>
                            <td><?php echo $row['ID']?></td>
                            <td><?php echo $row['Name']?></td>
                            <td><?php echo $row['Email Id']?></td>
                            <td><?php echo $row['Balance']?></td>
                            <?php session_start();
                            $_SESSION['ID']=$row['ID'];
                            $_SESSION['Name']=$row['Name'];
                            $_SESSION['Email Id']=$row['Email Id'];
                            $_SESSION['Balance']=$row['Balance'];?>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                    </table> <br><br><br>
                    <?php
                    if(isset($_SESSION['ID'])){
                         ?>  <button class="bt"><a href="transaction.php" class="Tran">Transfer</a></button><?php
                    }
                    else{
                        ?> <button class="bt"><a href="http://localhost/banking/Tmoney.php" class="Tran">Transfer</a></button><?php
                    }?>
                    </div>       
                    </center>
                    </div>
</body>
</html>