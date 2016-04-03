<?php

   function __autoload($Project){
      require_once "projectClass.php";
   }

   if(isset($_FILES['f'])){
      $errors= array();
      $file_name = $_FILES['f']['name'];
      $file_size =$_FILES['f']['size'];
      $file_tmp =$_FILES['f']['tmp_name'];
      $file_type=$_FILES['f']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['f']['name'])));
      
      $expensions= array("jpeg","jpg","png","pdf");
      
      if($file_size > 1024*1024*100){
         $errors[]='File size must be excately 100 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,'C:\xampp\htdocs\files\\'.$file_name);
         echo "<h1>Success file upload</h1><br>";

         $branch = $_POST['branch'];
         $sem = $_POST['sem'];
         $proj_name = $_POST['proj_name'];
         $format = $_POST['format'];
         $feature = $_POST['feature'];
         $subject = $_POST['subject'];
         $desc = $_POST['desc'];
         $impl = $_POST['impl'];

         $featureObj = new Feature;
         $featureObj -> setFeature($feature);
         $fid = $featureObj -> insertIntoDB();

         $project = new Project;
         $result = $project -> insertIntoDB($proj_name, $subject, $sem, $branch, $file_ext, $desc,
            $file_name, $impl);
         // result is project id

         if($result > 0){
            echo "insert into db successfull " . $result . "<br>";
            if($fid > 0){
               $hasF = new hasFeature;
               $hasF -> insertIntoDB($result, $fid);
            }
         }else{
            echo "insert into db unsuccessfull, project might exist <br>";
         }

      }else{
         print_r($errors);
      }
   }
?>