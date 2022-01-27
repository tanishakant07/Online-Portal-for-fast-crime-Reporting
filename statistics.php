<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Statistics</title>

    <link rel="stylesheet" href="assets/stylesheet/main.css">

  </head>

  <style>
    /* Slideshow container */
    .slideshow-container {
      max-width: 1000px;
      position: relative;
      margin: auto;
    }
    
    /* Caption text */
    .text {
      color: #f2f2f2;
      font-size: 15px;
      padding: 8px 12px;
      position: absolute;
      bottom: 8px;
      width: 100%;
      text-align: center;
    }
    
    /* Number text (1/3 etc) */
    .numbertext {
      color: #f2f2f2;
      font-size: 12px;
      padding: 8px 12px;
      position: absolute;
      top: 0;
    }
    
    /* The dots/bullets/indicators */
    .dot {
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbb;
      border-radius: 50%;
      display: inline-block;
      transition: background-color 0.6s ease;
    }
    
    .active {
      background-color: #717171;
    }
    
    /* Fading animation */
    .fade {
      -webkit-animation-name: fade;
      -webkit-animation-duration: 1.5s;
      animation-name: fade;
      animation-duration: 1.5s;
    }
    
    @-webkit-keyframes fade {
      from {opacity: .4} 
      to {opacity: 1}
    }
    
    @keyframes fade {
      from {opacity: .4} 
      to {opacity: 1}
    }
    
    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
      .text {font-size: 11px}
    }
    </style>

  <body>

   <!--HEADER-->
   <div class="group2">
    <header class="container group">
        <div id="logo">
            <a href="home.php">
                <img src="mlp.jpg"/>
            </a>
        </div>
<br>
        <div class="heading">
            <h1>MEGHALAYA POLICE,</h1>
            <h1>Online Crime Reporting Portal</h1>
            <h3 class="tagline">Your Safety, Our Responsibility!</h3>
        </div>

        <nav class="nav primary-nav">
            <a href="home.php"><i class="fa fa-home"></i>Home </a>
            <a href="helpline.php" >Helpline </a>  
            <a class="active" href="statistics.php">Statistics </a>
            <a href="contact.php">Contact Us</a>
            <a href="guide.php">User Guide</a>
            <a href="prevention.php">Prevention</a>
            <a href="signin.php">Log In</a>
            <a href="signup.php">Sign Up</a>
            <a href="mquickreport.php" style="color: red;" class="glow">Quick Report</a>
        </nav>

    </header>
    </div>

     <div class="container2">
        <center>
            <div id="slide" class="w3-content w3-section" style="max-width:800px">
                <img class="mySlides w3-animate-fading" src="stat0.jpg" style="width:100%">
                <img class="mySlides w3-animate-fading" src="stat1.jpg" style="width:100%">
                <img class="mySlides w3-animate-fading" src="stat2.jpg" style="width:100%">
                <img class="mySlides w3-animate-fading" src="stat3.jpg" style="width:100%">
                <img class="mySlides w3-animate-fading" src="stat4.jpg" style="width:100%">
                <img class="mySlides w3-animate-fading" src="stat5.jpg" style="width:100%">
                <img class="mySlides w3-animate-fading" src="stat6.jpg" style="width:100%">
                <img class="mySlides w3-animate-fading" src="stat7.jpg" style="width:100%">
            </div>
            </center>
            <br>
        
    </div>



    <script>
        // animation
        var myIndex = 0;
        carousel();
    
        function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}    
        x[myIndex-1].style.display = "block";  
        setTimeout(carousel, 3000);    
        }
      </script>

</body>


  
 