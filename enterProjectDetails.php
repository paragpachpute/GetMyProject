<!DOCTYPE html>
<html>
  <head>
    <title>enter project details</title>
    <link rel="stylesheet" href="mycss.css">
    <style type="text/css">

    </style>
    <script type="text/javascript">
      function validate(){
        var subject = document.myForm.subject.value;
        var feature = document.myForm.feature.value;
        var desc = document.myForm.desc.value;
        var impl = document.myForm.impl.value;

        if(subject == ""){
          document.myForm.subject.focus();
          document.myForm.subject.placeholder = 'please enter subject';
          return false;
        }
        if(feature == ""){
          document.myForm.feature.focus();
          document.myForm.feature.placeholder = 'please enter feature';
          return false;
        }
        if(desc == ""){
          document.myForm.desc.focus();
          document.myForm.desc.placeholder = 'please enter description';
          return false;
        }

        if(document.getElementById('rYes').checked == false && document.getElementById('rNo').checked == false){
          alert('please enter did you implemented it?');
          return false;
        }

        return true;
      }
    </script>

  </head>
  <body>
    <div class="header">
      <h1 id="header_site_name">GetMyProject</h1>
    </div>

    <?php
      function __autoload($Feature){
        require_once "projectClass.php";
      }

      $branch = $_POST['branch'];
      $sem = $_POST['sem'];
      $proj_name = $_POST['proj_name'];
      $format = $_POST['format'];
    ?>

    <form action="uploadFile.php" onsubmit="return(validate())" name="myForm" autocomplete="on" method="post" id="detail_from">
      <input type="hidden" name="branch" value="<?php echo $branch ?> ">
      <input type="hidden" name="sem" value="<?php echo $sem ?> ">
      <input type="hidden" name="proj_name" value="<?php echo $proj_name ?> ">
      <input type="hidden" name="format" value="<?php echo $format ?> ">

      <div>
        <div class="form_element">
          <h1>subject name</h1>
        </div>
        <div class="form_element">
          <input list="sub_list" name="subject">
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
        </div>
      </div>

      <div>
        <div class="form_element">
          <h1>key feature</h1>
        </div>
        <div class="form_element">
          <input list="feature_list" name="feature">
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
        </div>
      </div>

      <div>
        <div class="form_element">
          <h1>project description</h1>
        </div>
        <div class="form_element">
          <textarea rows="5" cols="40" name="desc"></textarea>
        </div>
      </div>

      <div>
        <div class="form_element">
          <h1>implemented?</h1>
        </div>
        <div class="form_element">
          <input type="radio" name="impl" value="y" id="rYes"> Yes<br>
          <input type="radio" name="impl" value="n" id="rNo"> No<br>
        </div>
      </div>

      <input type="submit" value="submit">
    </form>
    <div class="footer">
      <p>Parag Pachpute</p>
    </div>
  </body>
</html>
