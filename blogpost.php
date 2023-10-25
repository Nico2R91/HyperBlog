<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El nuevo HyperBlog</title>
    <link rel="stylesheet" href="estilos/estilos.css">
</head>
<body>
    <div id="container">
        <div id="cabecera">
            HyperBlog <span id="tagline">Tu Blog de HyperNoticias</span>
        </div>
        <div id="post">
            <h1>Este Blogpost esta dedicado al mundo de las noticias tecnologicas</h1>
            <p>Este es el primer parrafo del blogpost que estoy haciendo para explicar el funcionamiento de las ramas en Git
            </p>
            <p>
                Segundo parrafo, ramas de git 
            </p>
            <p>
                Suscribete y dale like
            </p>
            <h2>
                Este es un Subtitulo de el Html para el curso de platzi de git
            </h2>
            <p>
                Tercer parrafo para mostrar que lo manejo al push en git
            </p>
            <h3>
                Agrego este H3 para hacer commit en git
            </h3>
            <h4>
                Este es un parrafo final, se elimino el h5 para subir el cambio a github
            </h4>
            
        </div>
    </div>
    <div id="contenedor">
            <h1>Aqui encontraras todas las noticias del mundo de la tecnologia</h1>
            <p>
                Este parrafo es para demostrar que se puede usar el github desktop
            </p>
    </div>
    </div>
</body>
</html>
    <div>
        <?php
$conexion = mysqli_connect("localhost", "root","","lindavista");

session_start();

$message = ''; 
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload')
{
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
  {
    // Aca van los detalles del archivo cargado
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // se limpia el nombre del archivo
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

    // busca si el archivo tiene alguna de las siguentes extensiones
    $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');

    if (in_array($fileExtension, $allowedfileExtensions))
    {
      // carpeta donde se guarda el archivo
      $uploadFileDir = './uploaded_files/';
      $dest_path = $uploadFileDir . $newFileName;

      if(move_uploaded_file($fileTmpPath, $dest_path)) 
      {
        $message ='Se subio correctamente el archivo.';
      }
      else 
      {
        $message = 'Se produjo algún error al mover el archivo al directorio de carga. Asegúrese de que el servidor web pueda escribir en el directorio de carga.';
      }
    }
    else
    {
      $message = 'Subida fallida. Tipos de archivo permitidos: ' . implode(',', $allowedfileExtensions);
    }
  }
  else
  {
    $message = 'Hay algún error en la carga del archivo. Por favor verifique el siguiente error.<br>';
    $message .= 'Error:' . $_FILES['uploadedFile']['error'];
  }
}
$_SESSION['message'] = $message;
header("Location: index.php");
    