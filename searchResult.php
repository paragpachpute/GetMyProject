<!DOCTYPE html>
<html>
  <head>
    <title>search result</title>
    <link rel="stylesheet" href="mycss.css">
    <style type="text/css">

    </style>
    <script type="text/javascript">

    </script>

  </head>
  <body>
      <div class="header">
        <h1 id="header_site_name">GetMyProject</h1>
      </div>

      <div class="content">
        <!--
        <h2>project name : KBC</h2>
        <h2>branch : CS</h2>
        <h2>Sem : 3</h2>
        <h2>Subject : Java Programming</h2>
        <h2>Desription : Computer based game of popular TV show</h2>
        <h2>format : jar</h2>
      </div>
        -->
      <?php
        function __autoload($Project){
          require_once "projectClass.php";
        }

        $name = $_GET['proj_name'];
        $branch = $_GET['branch'];
        $sem = $_GET['sem'];
        $subject = $_GET['subject'];
        $desc = $_GET['desc'];

        if($name == null)
          $name="";
        if($branch == null)
          $branch="";
        if($sem == null)
          $sem="0 or true";
        if($subject == null)
          $subject="";
        if($desc == null)
          $desc="";

        $proj = new Project;
        $result = $proj -> getResult($name, $branch, $sem, $subject, $desc);

        if($result -> num_rows > 0){
          while($row = $result -> fetch_assoc()){
            echo "<h2>project name : " . $row['name'] . "</h2>";
            echo "<h2>branch : " . $row['branch'] . "</h2>";
            echo "<h2>Sem : " . $row['sem'] . "</h2>";
            echo "<h2>Subject : " . $row['subject'] . "</h2>";
            echo "<h2>Desription : " . $row['description'] . "</h2>";
            echo "<h2>format : " . $row['format'] . "</h2>";
            echo "<h2>Download Link : <a href='http://127.0.0.1/files/" . $row['filename'] . "'>" . $row['name'] . "</a></h2>"; 
            
            $id = $row['id'];
            $hasF = new hasFeature;
            $resultHasF = $hasF -> getFeatureByProjId($id);
            if($resultHasF != null){
              echo "<h2>Features :";
              while($rowHasF = $resultHasF->fetch_assoc()){
                echo $hasF->getFeatureNameById($rowHasF['featureId']) . ", ";
              }
              echo "</h2>";
            }
            echo "<br><hr><br>";
          }
        }

      ?>
      
      <h2>'</h2>

      <div class="footer">
        <p>Parag Pachpute</p>
      </div>

  </body>
</html>
