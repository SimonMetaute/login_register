<?php

include  'conexion_be.php';

$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

if (empty ($nombre_completo) || empty ($correo) || empty ($usuario) || empty ($contrasena) ) {

header ("location: ../index.php?erroneo-message=Ingresa todos los datos&show=register");
exit;

}

//Encriptar de contraseña
$contrasena = hash('sha512', $contrasena);

$query = "INSERT INTO usuarios (nombre_completo, correo ,usuario, contrasena)
          VALUES ('$nombre_completo','$correo','$usuario', '$contrasena' )";

//Verificar que el correo no se repita
$verificar_correo = mysqli_query ($conexion, "SELECT * FROM usuarios where correo ='$correo'");

if(mysqli_num_rows($verificar_correo) > 0){

    header("location: ../index.php?Error-message=Alguno de los datos ya existen, verifique&show=register");


    exit();
}
//Verificar que el usuario no se repita
$verificar_usuario = mysqli_query ($conexion, "SELECT * FROM usuarios where usuario ='$usuario'");

if(mysqli_num_rows($verificar_usuario) > 0){

    header("location: ../index.php?Error-message=Alguno de los datos ya existen, verifique&show=register");


  
    exit();
}


$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
  
          header("location: ../index.php?fact-message=Guardado exitosamente");

 
}
else {
    echo '
    <script>
     alert ("Error, intentalo de nuevo");
     window.location = "../index.php";
    </script>
    ';
}

mysqli_close($conexion);
?>
