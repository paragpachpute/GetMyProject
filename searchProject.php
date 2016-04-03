<!DOCTYPE html>
<html>
  <head>
    <title>search project</title>
    <link rel="stylesheet" href="mycss.css">
    <style type="text/css">

    </style>
    <script type="text/javascript">
      function validate(){
        var proj_name = document.myForm.proj_name.value;
        var branch = document.myForm.branch.value;
        var sem = document.myForm.sem.value;
        var subject = document.myForm.subject.value;
        var desc = document.myForm.desc.value;

        // if(proj_name == "" && branch == "" && sem == "" && subject == "" && desc == "" ){
        //   alert('please enter either project name or project details...');
        //   return false;
        // }

        return true;
      }
    </script>

  </head>
  <body>
      <div class="header">
        <h1 id="header_site_name">GetMyProject</h1>
      </div>

      <div class="content">
        <form action="searchResult.php" method="get" name="myForm" onsubmit="return(validate())" autocomplete="on">
          <div>
            <div class="form_element">
              <h1>Enter Name of Project </h1>
            </div>

            <div class="form_element">
              <input type="text" name="proj_name">
            </div>
          </div>

          <hr>

          <div>
            <h1>Search By : </h1>
          </div>

          <div>
            <div class="form_element">
              <h1>Branch</h1>
            </div>

            <div class="form_element">
              <input list="branch_list" name="branch">
              <datalist id="branch_list">
                <option value="computer">
                <option value="IT">
                <option value="electronics">
              </datalist>
            </div>
          </div>

          <div>
            <div class="form_element">
              <h1>Semester</h1>
            </div>

            <div class="form_element">
              <input list="sem_list" name="sem">
              <datalist id="sem_list">
                <option value="1">
                <option value="2">
                <option value="3">
              </datalist>
            </div>
          </div>

          <div>
            <div class="form_element">
              <h1>Subject</h1>
            </div>

            <div class="form_element">
              <input list="sub_list" name="subject">
              <datalist id="sub_list">
                <option value="Software Engineering">
                <option value="Web Technology">
                <option value="Computer Programming - java">
              </datalist>
            </div>
          </div>

          <div>
            <div class="form_element">
              <h1>Description</h1>
            </div>
            <div class="form_element">
              <input type="text" name="desc">
            </div>
          </div>

          <input type="submit" value="Search">
        </form>

        <h1> @</h1>

      </div>


      <div class="footer">
        <p>Parag Pachpute</p>
      </div>

  </body>
</html>
