<!DOCTYPE html>
<html>
  <head>
    <title>upload file</title>
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
      	<form action="validateFile.php" method="post" enctype="multipart/form-data">
		    Select image to upload:<br>
		    <input type="file" name="f" id="f">
		    <input type="submit" value="Upload File" name="submit">

        <?php foreach( $_POST as $key => $val ): ?>
                <input type="hidden" name="<?= htmlspecialchars($key, ENT_COMPAT, 'UTF-8') ?>" value="<?= htmlspecialchars($val, ENT_COMPAT, 'UTF-8') ?>">
        <?php endforeach; ?>
		</form>
      </div>


      <div class="footer">
        <p>Parag Pachpute</p>
      </div>

  </body>
</html>


