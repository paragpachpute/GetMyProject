<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Carousel Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/search.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet"> -->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--<script src="../../assets/js/ie-emulation-modes-warning.js"></script> -->
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
<!-- NAVBAR
================================================== -->
  <body>

    
    <?php
      function __autoload($Project){
        require_once "projectClass.php";
      }

      $project = new Project;
      $result = $project -> getTop3();

      $row = $result -> fetch_assoc();
      $img1 = $row['s1'];
      $name1 = $row['name'];
      $desc1 = $row['description'];
      // echo $desc1;

      $row = $result -> fetch_assoc();
      $img2 = $row['s1'];
      $name2 = $row['name'];
      $desc2 = $row['description'];
      // echo $desc2;

      $row = $result -> fetch_assoc();
      $img3 = $row['s1'];
      $name3 = $row['name'];
      $desc3 = $row['description'];
      // echo $desc3;

      // $_SESSION['state'] = "no";

      if(isset($_POST['uname'])){
        $email =  $_POST['email'];
        $pass =  $_POST['pass'];
        $uname =  $_POST['uname'];
        $status =  $_POST['status'];

        $user = new User;
        $result = $user -> register($uname, $status, $email, $pass);
        if($result != FALSE){
          echo "<script>alert('Registration Successfull')</script>";
          $state = "Hi " . $uname;
          $_SESSION['state'] = "yes";
          $_SESSION['name'] = $uname;
          $_SESSION['id'] = $user -> getIdFromEmail($email);
        }else{
          echo "<script>alert('Registration Not successfull')</script>";
        }
      }  
      else if(isset($_POST['email'])){
        $email =  $_POST['email'];
        $pass =  $_POST['pass'];

        $user = new User;
        $result = $user -> validate($email, $pass);
        if($result == TRUE){
          $_SESSION['state'] = "yes";
          $_SESSION['name'] = $user -> getNameFromEmail($email);
          $_SESSION['id'] = $user -> getIdFromEmail($email);
        }else{
          echo "<script>alert('invalid credentials')</script>";
          $state = "Log In";
        }
      }

      $user = new User;
      $result = $user -> getTop3();
      
      $row = $result -> fetch_assoc();
      $uname1 = $row['name'];
      $status1 = $row['status'];

      $row = $result -> fetch_assoc();
      $uname2 = $row['name'];
      $status2 = $row['status'];

      $row = $result -> fetch_assoc();
      $uname3 = $row['name'];
      $status3 = $row['status'];



    ?>

    <nav class="navbar navbar-inverse">
          <div class="container" style="min-height:auto">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">GetMyProject</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="uiUploadProject.php">Upload Project</a></li>
                <?php
                  if(isset($_SESSION['state'])){
                    if($_SESSION['state'] == 'no' or $_SESSION['state'] == ''){
                      echo '<li><a href="register.php">Sign Up</a></li>';
                      echo '<li><a href="login.php">Log In</a></li>';
                    }else{
                      echo '<li><a href="register.php">Hi ' . $_SESSION['name'] . '</a></li>';
                      echo '<li><a href="destroy.php">Log Out</a></li>';
                    }
                  }else{
                    echo '<li><a href="register.php">Sign Up</a></li>';
                    echo '<li><a href="login.php">Log In</a></li>';
                  }
                  
                ?>
                <!-- <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li> -->
              </ul>
            </div>
          </div>
        </nav>


    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <!-- <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol> -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="images/hero1.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <!-- <h1>Example headline.</h1> -->
              <p>Want to develope project but don't know how to start? College has given assignment but don't know the approach? Well we have solution for you...</p>
              <!-- <p>
                <a class="btn btn-lg btn-primary" id="searchbtn" href="#search" role="button">
                  Serach Now
                </a>
              </p> -->
              <form action="uiSearchResult.php" class="search-form">
                <div class="form-group has-feedback">
                <!-- <label for="search" class="sr-only">Search</label> -->
                <input type="text" class="form-control" name="search" id="search" placeholder="search">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                <input type="submit" 
                   style="position: absolute; left: -9999px; width: 1px; height: 1px;">
              </div>
            </form>
            </div>
          </div>
        </div>
        <!-- <div class="item">
          <img class="second-slide" src="images/hero2.png" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              
              <p>Want to develope project but don't know how to start? College has given 
                assignment but don't know the approach? Well we have solution for you...</p>
              <p><a class="btn btn-lg btn-primary" href="#search" role="button">Serach Now</a></p>
            </div>
          </div>
        </div>

        <div class="item">
          <img class="third-slide" src="images/hero1.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Upload Project</a></p>
            </div>
          </div>
        </div>
      </div> -->

      <!-- <div id="search">
            <button type="button" class="close">×</button>
            <form action="ui_search_result.php" method="get">
                <input type="search" name="val" placeholder="type keyword(s) here"></input>
                <input type="submit" class="btn btn-primary" value="Search">
            </form>
        </div> -->

      <!-- <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a> -->
    </div><!-- /.carousel -->


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing" style="margin-top:50px;">
      <h1 style="text-align:center;">Developers of the week</h1>  <br><br><br>  

      <!-- Three columns of text below the carousel -->

      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="images/profilepic2.jpg" width="140" height="140">
          <h2><?php echo $uname1 ?></h2>
          <p><?php echo $status1 ?></p>
          <!-- <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> -->
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="images/profilepic3.jpg" width="140" height="140">
          <h2><?php echo $uname2 ?></h2>
          <p><?php echo $status2 ?></p>
          <!-- <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> -->
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="images/profilepic4.jpg" width="140" height="140">
          <h2><?php echo $uname3 ?></h2>
          <p><?php echo $status3 ?></p>
          <!-- <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> -->
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->

      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">
      <h1 style="text-align:center;">Top Projects</h1>  <br> 

      
      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading"><span class="text-muted"><?php echo $name1 ?></span></h2>
          <br>
          <p class="lead"><?php echo $desc1 ?></p>
        </div>
        <div class="col-md-5">
          <a href="uiProjectDetails.php?id=1">
            <img class="featurette-image img-responsive center-block" src="images/<?php echo $img1 ?>" alt="Generic placeholder image" >
          </a>
        </div>
      </div>
      

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7 col-md-push-5">
          <h2 class="featurette-heading"><span class="text-muted"><?php echo $name2 ?></span></h2>
          <br>
          <p class="lead"><?php echo $desc2 ?></p>
        </div>
        <div class="col-md-5 col-md-pull-7">
          <a href="uiProjectDetails.php?id=4">
            <img class="featurette-image img-responsive center-block" src="images/<?php echo $img2 ?>" alt="Generic placeholder image">
          </a>  
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading"><span class="text-muted"><?php echo $name3 ?></span></h2><br>
          <p class="lead"><?php echo $desc3 ?></p>
        </div>
        <div class="col-md-5">
          <a href="uiProjectDetails.php?id=9">
           <img class="featurette-image img-responsive center-block" src="images/<?php echo $img3 ?>" alt="Generic placeholder image">
          </a> 
        </div>
      </div>

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->

    <div class="text-center" style="background:#FFF">
    <hr />
      <div class="row">
        <div class="col-lg-12">
          <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked">
              <li><a href="#">About us</a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked">
              <li><a href="http://paragpachpute.blogspot.com">Blog</a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked">
              <li><a href="#">Contact Us</a></li>          
            </ul>
          </div>
          <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked">
              <li><a href="#">Developer API</a></li>
            </ul>
          </div>  
        </div>
      </div>
      <hr>
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="/">© 2016 getmyproject.com.</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy</a></li>
                </ul>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! 
    <script src="../../assets/js/vendor/holder.min.js"></script> -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug 
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->

    <script src="js/search.js"></script>
  </body>
</html>
