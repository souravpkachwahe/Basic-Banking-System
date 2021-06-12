<?php
include 'config.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['Amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }


  
    // constraint to check insufficient balance.
    else if($amount > $sql1['Balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    


    // constraint to check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        
                // deducting amount from sender's account
                $newbalance = $sql1['Balance'] - $amount;
                $sql = "UPDATE users set Balance=$newbalance where id=$from";
                mysqli_query($conn,$sql);
             

                // adding amount to reciever's account
                $newbalance = $sql2['Balance'] + $amount;
                $sql = "UPDATE users set Balance=$newbalance where id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['First Name'];
                $receiver = $sql2['First Name'];
                $sql = "INSERT INTO transaction(`Sender`, `Receiver`, `Balance`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transfer Successful');
                                     window.location='transferhistory.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>basic banking system</title>
    <link rel="stylesheet" href="css/selectcustomer.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body{
        min-height:100vh;
        width: 100%;
        background-image: url(img/banner.png);
        background-position: center;
        background-size: cover;
        position: relative;
        }
    </style>
</head>
</head>
<body>
    <section class="banner">
        <nav>
            <a href="index.html"><img src="img/logo.png"></a>
            <div class="nav-links" id="navlinks">
                <i class="fa fa-times" onclick="hidemenu()"></i>
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="transfer.php">OUR CUSTOMERS</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showmenu()"></i>
        </nav>
        <div class="text-box">
            <h1>TRANSFER MONEY</h1>
        </div>
    </section>

<body>

	<div class="container">
        <?php
            include 'config.php';
            $sid=$_GET['id'];
            $sql = "SELECT * FROM  users where id=$sid";
            $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
            $rows=mysqli_fetch_assoc($result);
        ?>
        <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <table class="table table-striped table-condensed table-bordered">
                <tr>
                    <th scope="col" class="text-center py-2">Id</th>
                    <th scope="col" class="text-center py-2">First Name</th>
                    <th scope="col" class="text-center py-2">Last Name</th>
                    <th scope="col" class="text-center py-2">Email</th>
                    <th scope="col" class="text-center py-2">Balance</th>
                </tr>
                <tr>
                    <td class="py-2"><?php echo $rows['Id'] ?></td>
                    <td class="py-2"><?php echo $rows['First Name'] ?></td>
                    <td class="py-2"><?php echo $rows['Last Name'] ?></td>
                    <td class="py-2"><?php echo $rows['Email'] ?></td>
                    <td class="py-2"><?php echo $rows['Balance'] ?></td>
                </tr>
            </table>
        </div>
        <br><br><br><br>
            <div class="textspk">
                <div class="selectbox">
                <label>Transfer To:</label>
                <select name="to" class="form-control" required>
                    <option value="" disabled selected>Choose</option>
                    <?php
                       include 'config.php';
                       $sid=$_GET['id'];
                       $sql = "SELECT * FROM users where id!=$sid";
                       $result=mysqli_query($conn,$sql);
                       if(!$result)
                       {
                            echo "Error ".$sql."<br>".mysqli_error($conn);
                       }
                       while($rows = mysqli_fetch_assoc($result)) {
                    ?>
                    <option class="table" value="<?php echo $rows['Id'];?>">
                                                 <?php echo $rows['First Name'] ;?>
                                                 <?php echo $rows['Last Name'] ;?> (Balance: 
                                                 <?php echo $rows['Balance'] ;?> ) 
                    </option>
                    <?php 
                       } 
                    ?>
                    <div>
                </select>
                </div>
            <br><br>
            <div class="inputbox">
            <label>Amount:</label>
            <input type="number" class="form-control" name="Amount" required>   
            </div>
            <br><br>
                <div class="text-center" >
                   <button class="btn mt-3" name="submit" type="submit" id="myBtn">Transfer</button>
                </div>
            </div>
        </form>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>