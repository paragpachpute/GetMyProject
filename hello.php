<?php
   if(isset($_FILES['f'])){
      $errors= array();
      $file_name = $_FILES['f']['name'];
      $file_size =$_FILES['f']['size'];
      $file_tmp =$_FILES['f']['tmp_name'];
      $file_type=$_FILES['f']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['f']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,'C:\xampp\htdocs\files\\'.$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>