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
    <link href="css/projectDetails.css" rel="stylesheet">
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

    <!--<div class="row">
        <div class="col-lg-2"></div>

         <div class="col-lg-8">
            <div class="card hovercard">
                <div class="card-background">
                    <img class="card-bkimg" alt="" src="images/monorail.jpg">
                </div>
                <div class="useravatar">
                    <img alt="" src="images/monorail.jpg">
                </div>
                <div class="card-info"> <span class="card-title">Pamela Anderson</span>

                </div>
            </div>
        </div>

        <div class="col-lg-2"></div>
    </div> -->

    <?php
        function __autoload($Project){
            require_once "projectClass.php";
          }

          $id = $_GET['id'];

          $proj = new Project;
          $result = $proj -> getResultById($id);

          if($result -> num_rows > 0){
            $row = $result -> fetch_assoc();
            $name =  $row['name'];
            $branch = $row['branch'];
            $sem = $row['sem'];
            $subject = $row['subject'];
            $desc = $row['description'];
            $format = $row['format'];
            $impl = $row['impl'];
            $datetime = $row['datetime'];
            $fname = $row['filename'];
            $dlink = "http://127.0.0.1/files/" . $fname;
          }  

    ?>

    <div class="row">
        <div class="col-lg-1"></div>

        <div class="col-lg-10">
            <div class="card">
                <canvas class="header-bg-top" width="250" height="70" id="header-blur"></canvas>
                <div class="avatar">
                    <img src="" alt="" />
                </div>
                <div class="content" style="padding-top: 50px;">
                    <div class="row">
                        <div class="col-lg-6">
                            <h2 class="center-name">Name : <?php echo $name ?></h2>
                            <h2 class="center-name">Branch : <?php echo $branch ?></h2>
                            <h2 class="center-name">Subject : <?php echo $subject ?></h2>
                            <h2 class="center-name">Implemented : <?php echo $impl ?></h2>
                        </div>
                        <div class="col-lg-6">
                            <h2 class="center-name">Semester : <?php echo $sem ?></h2>
                            <h2 class="center-name">File Format : <?php echo $format ?></h2>
                            <h2 class="center-name">Filename : <?php echo $fname ?></h2>
                            <h2 class="center-name">Date and Time : <?php echo $datetime ?></h2>
                        </div>
                    </div>
                    <h2 class="center-name"><?php echo $desc ?></h2>
                </div>
            </div>
        </div>

        <div class="col-lg-1"></div>
    </div>
    <br>
    <br>

    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
        <div class="col-md-4">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="text-center">FREE Package</h4>
                </div>
                <div class="panel-body text-center">
                    <p class="lead">
                        <strong>$0 / month</strong>
                    </p>
                </div>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item">
                        Personal Use
                        <span class="glyphicon glyphicon-ok pull-right"></span>
                    </li>
                    <li class="list-group-item">
                        Single Commercial License
                        <span class="glyphicon glyphicon-remove pull-right"></span>
                    </li>
                    <li class="list-group-item">
                        Multiple site Commercial license
                        <span class="glyphicon glyphicon-remove pull-right"></span>
                    </li>
                    <li class="list-group-item">
                        Technical Support
                        <span class="glyphicon glyphicon-remove pull-right"></span>
                    </li>
                </ul>
                <div class="panel-footer">
                    <a href=<?php echo "'" .$dlink . "' " ?>class="btn btn-lg btn-block btn-success">Download</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="text-center">Standard commercial package</h4>
                </div>
                <div class="panel-body text-center">
                    <p class="lead">
                        <strong>$10 / month</strong>
                    </p>
                </div>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item">
                        Personal Use
                        <span class="glyphicon glyphicon-ok pull-right"></span>
                    </li>
                    <li class="list-group-item">
                        Single Commercial License
                        <span class="glyphicon glyphicon-ok pull-right"></span>
                    </li>
                    <li class="list-group-item">
                        Multiple site Commercial license
                        <span class="glyphicon glyphicon-remove pull-right"></span>
                    </li>
                    <li class="list-group-item">
                        Technical Support
                        <span class="glyphicon glyphicon-ok pull-right"></span>
                    </li>
                </ul>
                <div class="panel-footer">
                    <a class="btn btn-lg btn-block btn-info">Purchase</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="text-center">Premium commercial package</h4>
                </div>
                <div class="panel-body text-center">
                    <p class="lead">
                        <strong>$20 / month</strong>
                    </p>
                </div>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item">
                        Personal Use
                        <span class="glyphicon glyphicon-ok pull-right"></span>
                    </li>
                    <li class="list-group-item">
                        Single Commercial License
                        <span class="glyphicon glyphicon-ok pull-right"></span>
                    </li>
                    <li class="list-group-item">
                        Multiple site Commercial license
                        <span class="glyphicon glyphicon-ok pull-right"></span>
                    </li>
                    <li class="list-group-item">
                        Technical Support
                        <span class="glyphicon glyphicon-ok pull-right"></span>
                    </li>
                </ul>
                <div class="panel-footer">
                    <a class="btn btn-lg btn-block btn-primary">Purchase</a>
                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="row">
        <br>
        <div class="headline">
            <h1 style="text-align:center">Featured Projects</h1>
        </div>
        <br>
    </div>
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <div class="col-sm-4">
                <div class="card">
                    <canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
                    <div class="avatar">
                        <img src="" alt="" />
                    </div>
                    <div class="content">
                        <p>Web Developer <br>
                           More description here</p>
                        <p><button type="button" class="btn btn-default">Contact</button></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
                    <div class="avatar">
                        <img src="" alt="" />
                    </div>
                    <div class="content">
                        <p>Web Developer <br>
                           More description here</p>
                        <p><button type="button" class="btn btn-default">Contact</button></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
                    <div class="avatar">
                        <img src="" alt="" />
                    </div>
                    <div class="content">
                        <p>Web Developer <br>
                           More description here</p>
                        <p><button type="button" class="btn btn-default">Contact</button></p>
                    </div>
                </div>
            </div>
        </div>    
        <div class="col-lg-1"></div>
    </div>
</div>

<img class="src-image" src="images/monorail.jpg">
<img class="src-image" src="images/kbc_logo.png">
<img class="src-image" src="images/monorail.jpg">
<img class="src-image" src="images/monorail.jpg">
 
    
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

    <script src="js/projectDetails.js"></script>
  </body>
</html>
