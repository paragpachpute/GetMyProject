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
    <!-- <link href="css/search.css" rel="stylesheet"> -->
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

    <?php
      function __autoload($Feature){
        require_once "projectClass.php";
      }
    ?>

    <div class="container" style="margin-top:50px; background:#fff">
      <div class="row" style="margin-top:20px">
          <form role="form" action="validateFile.php" name="myForm" onsubmit="return(validate())" method="post" autocomplete="on" enctype="multipart/form-data">

              <div class="col-lg-6">
                  <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                  
                  <div class="form-group">
                      <label for="InputName">Enter Name</label>
                      <div class="input-group">
                          <input type="text" class="form-control" name="proj_name" id="proj_name" placeholder="Name of Project" required>
                          <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                      </div>
                  </div>
                  
                  <div class="form-group">
                      <label for="InputEmail">Enter Branch</label>
                      <div class="input-group">
                          <input list="branch_list" name="branch" class="form-control" id="branch" placeholder="Branch" required>
                          <datalist id="branch_list">
                            <option value="computer">
                            <option value="IT">
                            <option value="electronics">
                          </datalist>
                          <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="InputEmail">Enter Semester No</label>
                      <div class="input-group">
                          <input list="sem_list" name="sem" class="form-control" id="sem"  placeholder="Semester No" required>
                          <datalist id="sem_list">
                            <option value="1">
                            <option value="2">
                            <option value="3">
                            <option value="4">
                            <option value="5">
                            <option value="6">
                            <option value="7">
                            <option value="8">  
                          </datalist>
                          <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="InputName">Enter Subject</label>
                      <div class="input-group">
                          <input list="sub_list" name="subject" class="form-control" id="subject" placeholder="Name of Subject" required>
                          <datalist id="sub_list">
                            <?php
                              $project = new Project;
                              $result = $project -> getSubjects();
                              
                              if($result != null){
                                if($result -> num_rows > 0){
                                  while($row = $result -> fetch_assoc()){
                                    echo "<option value='". $row['subject'] . "'>";
                                  }
                                }
                              }
                            ?>  
                            
                          </datalist>
                          <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="InputName">Enter Features</label>
                      <div class="input-group">
                          <input list="feature_list" name="feature" class="form-control" placeholder="Key features of Project" required>
                          <datalist id="feature_list">
                            <?php
                              $feature = new Feature;
                              $result = $feature -> getFeatures();
                              
                              if($result != null){
                                if($result -> num_rows > 0){
                                  while($row = $result -> fetch_assoc()){
                                    echo "<option value='". $row['type'] . "'>";
                                  }
                                }
                              }
                            ?>
                          </datalist>
                          <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="InputName">Impelemented?</label>
                      <div class="input-group">
                          <div class="radio">
                            <label><input type="radio" name="impl" value="y" id="rYes">Yes</label>
                          </div>
                          <div class="radio">
                            <label><input type="radio" name="impl" value="n" id="rNo"> No</label>
                          </div>
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="InputMessage">Enter Description</label>
                      <div class="input-group">
                          <textarea name="desc" id="desc" class="form-control" rows="5" required></textarea>
                          <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                      </div>
                  </div>

                  <input type="file" class="btn btn-primary" name="f" id="f" required>

                  <div class="form-group" style="height:50px;">
                    <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right" >
                  </div>
              </div>  
              
          </form>
          <div class="col-lg-5 col-md-push-1">
              <div class="col-md-12">
                  <div class="alert alert-success">
                      <strong><span class="glyphicon glyphicon-ok"></span> Success! Message sent.</strong>
                  </div>
                  <div class="alert alert-danger">
                      <span class="glyphicon glyphicon-remove"></span><strong> Error! Please check all page inputs.</strong>
                  </div>
              </div>
          </div>
      </div>
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

     <!-- // <script src="js/search.js"></script> -->
  </body>
</html>
