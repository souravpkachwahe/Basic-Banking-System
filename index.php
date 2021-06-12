<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>basic banking system</title>
    <link rel="stylesheet" href="css/banking.css">
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
                    <li><a href="transfer.php">OUR CUSTOMERS</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showmenu()"></i>
        </nav>
        <div class="text-box">
            <h1>LLOYD PAYMENT BANK</h1>
            <P>Easy Online Currency Transfer From Your Account</P>
            <a href ="banking.php" class="hero-btn">Get Started"</a>
        </div>
    </section>

    <!--------JavaScript for Toggle Menu-------->
    <script>
        var navlinks= document.getElementById("navlinks");
        function showmenu(){
            navlinks.style.right = "0";
        }
        function hidemenu(){
            navlinks.style.right="-205px";
        }
    </script>

</body>
</html>