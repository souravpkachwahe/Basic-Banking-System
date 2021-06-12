<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>basic banking system</title>
    <link rel="stylesheet" href="css/transfer.css">
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
<body>
    <section class="banner">
        <nav>
            <a href="index.html"><img src="img/logo.png"></a>
            <div class="nav-links" id="navlinks">
                <i class="fa fa-times" onclick="hidemenu()"></i>
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="banking.php">BANKING</a></li>
                    <li><a href="transferhistory.php">TRANSFER HISTORY</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showmenu()"></i>
        </nav>
        <div class="text-box">
            <h1>OUR CUSTOMERS</h1>
        </div>
    </section>
    <div class="container">
            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                    <table class="table table-hover table-sm table-striped table-condensed table-bordered">
                            <tr>
                            <th scope="col" class="text-center py-2">Id</th>
                            <th scope="col" class="text-center py-2">Full Nmae</th>
                            <th scope="col" class="text-center py-2">Last Name</th>
                            <th scope="col" class="text-center py-2">Email</th>
                            <th scope="col" class="text-center py-2">Balance</th>
                            <th scope="col" class="text-center py-2">Operation</th>
                            </tr>

                <?php 
                    include 'config.php';
                    $sql = "SELECT * FROM users";
                    $result = mysqli_query($conn,$sql);
                    while($rows=mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <td class="py-2"><?php echo $rows['Id'] ?></td>
                        <td class="py-2"><?php echo $rows['First Name']?></td>
                        <td class="py-2"><?php echo $rows['Last Name']?></td>
                        <td class="py-2"><?php echo $rows['Email']?></td>
                        <td class="py-2"><?php echo $rows['Balance']?></td>
                        <td><a href="selectcustomer.php?id= <?php echo $rows['Id'] ;?>"> <button type="button" class="btn">Transact</button></a></td> 
                    </tr>
                <?php
                    }
                ?>
                    </table>
                    </div>
                </div>
            </div> 
         </div>
         <script>
        var navlinks= document.getElementById("navlinks");
        function showmenu(){
            navlinks.style.right = "0";
        }
        function hidemenu(){
            navlinks.style.right="-205px";
        }
    </script>

         <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 
</body>
</html>