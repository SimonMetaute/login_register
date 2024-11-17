<?php

session_start();

include 'conexion_be.php';




$correo = $_POST['correo'];
$contrasena = $_POST ['contrasena'];

if (empty($correo) || empty($contrasena)) {

    header("location: ../index.php?error=Por favor, inicie sesión");


exit;
}


$contrasena = hash('sha512', $contrasena);

$validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo' and contrasena='$contrasena'");

if(mysqli_num_rows($validar_login) > 0){
    $_SESSION['usuario'] = $correo;
    header("location: ../act/index.html");
exit;
} else {
    echo '
        <script> 
        alert ("Usuario no existe");
        window.location = "../index.php";
        </script>
    ';
    exit;
}




?>