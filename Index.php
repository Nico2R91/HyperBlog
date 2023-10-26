<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
  <title>PHP Subir Archivo</title>
</head>
<body>
  <?php
    if (isset($_SESSION['message']) && $_SESSION['message'])
    {
      printf('<b>%s</b>', $_SESSION['message']);
      unset($_SESSION['message']);
    }
  ?>

  <form method="POST" action="upload.php" enctype="multipart/form-data">
    <div>
      <span>Subir un Archivo:</span>
      <input type="file" name="uploadedFile" />
    </div>

    <input type="submit" name="uploadBtn" value="Cargar" />
  </form>
  <textarea name="comentario" rows="4" cols="50" placeholder="Deja tu comentario aqui"></textarea>
</body>
</html>