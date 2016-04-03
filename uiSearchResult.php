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
    <link href="css/font-awesome.css" rel="stylesheet">

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
  <body >
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

    <div class="row" style="margin-left:25px; margin-right:25px;">
      <div class="col-lg-0"></div>
      <div class="col-lg-12" >

        <?php
          function __autoload($Project){
            require_once "projectClass.php";
          }

          $val = $_GET['search'];

          $proj = new Project;
          $result = $proj -> getResultByVal($val);

          if($result -> num_rows > 0){
            while($row = $result -> fetch_assoc()){
              echo "<h2><a href='uiProjectDetails.php?id=" . $row['id'] . "'>
                " .$row['name'] . "</a></h2>"; 
              echo "<p class='lead'><i class='fa fa-user'></i> by <a href=''>Super User</a></p>";
              // echo "<br>";
              echo "<p><i class='fa fa-calendar'></i> Posted on " . $row['datetime'] . "</p>";
              
              $id = $row['id'];
              $hasF = new hasFeature;
              $resultHasF = $hasF -> getFeatureByProjId($id);
              if($resultHasF != null){
                echo "<p><i class='fa fa-tags'></i> Tags: ";
                while($rowHasF = $resultHasF->fetch_assoc()){
                  echo "<a href=''><span class='badge badge-info'>" .
                    $hasF->getFeatureNameById($rowHasF['featureId']) . "</span></a> ";
                }
                echo "</p>";
              }

              echo "<p data-toggle='collapse' 
                data-target='#desc" . $row['id'] . "'><i class='fa fa-file-text'></i> Description:";
              echo "<div id='desc" . $row['id'] . "' class='collapse'>" . $row['description'] . "</div>";
              echo "</p>";

              echo "<hr>";
          //     echo "<h2>branch : " . $row['branch'] . "</h2>";
          //     echo "<h2>Sem : " . $row['sem'] . "</h2>";
          //     echo "<h2>Subject : " . $row['subject'] . "</h2>";
          //     echo "<h2>Desription : " . $row['description'] . "</h2>";
          //     echo "<h2>format : " . $row['format'] . "</h2>";
          //     echo "<h2>Download Link : <a href='http://127.0.0.1/files/" . $row['filename'] . "'>" . $row['name'] . "</a></h2>"; 
            
            //   $id = $row['id'];
            //   $hasF = new hasFeature;
            //   $resultHasF = $hasF -> getFeatureByProjId($id);
            //   if($resultHasF != null){
            //     echo "<h2>Features :";
            //     while($rowHasF = $resultHasF->fetch_assoc()){
            //       echo $hasF->getFeatureNameById($rowHasF['featureId']) . ", ";
            //     }
            //     echo "</h2>";
            //   }
            //   echo "<br><hr><br>";
            }
          }

        ?>

        <!-- <h2><a href="">Blog Post Template for Bootstrap</a></h2>
        <p class="lead"><i class="fa fa-user"></i> by <a href="">Super User</a></p>
        <br>
        <p><i class="fa fa-calendar"></i> Posted on August 24, 2014 at 9:00 PM</p>
        <p><i class="fa fa-tags"></i> Tags: <a href=""><span class="badge badge-info">Bootstrap</span></a> <a href=""><span class="badge badge-info">Web</span></a> <a href=""><span class="badge badge-info">CSS</span></a> <a href=""><span class="badge badge-info">HTML</span></a></p>
        <p data-toggle="collapse" data-target="#desc"><i class="fa fa-file-text"></i> Description:
          <div id="desc" class="collapse">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit,
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          </div>
        <hr>  -->
      </div>
      <div class="col-lg-0"></div>
    </div>  
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
