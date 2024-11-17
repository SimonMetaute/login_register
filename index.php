<?php
// if(isset($_SESSION['usuario'])){
//  header("location:principal.php");
//}

$showRegister = isset($_GET['show']) && $_GET['show'] === 'register';
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login_Register</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>

<body>

    <main>

        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para entrar en la página</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Regístrate para que puedas iniciar sesión</p>
                    <button id="btn__registrarse">Regístrarse</button>
                </div>
            </div>

            <!--Formulario de Login y registro-->
            <div class="contenedor__login-register">
                <!--Login-->
                <form action="php/login_usuario_be.php" method="POST" class="formulario__login">
              
                    <h2>Iniciar Sesión</h2>
                    <?php if (isset($_GET['fact-message'])): ?>
                        <div id="fact-message" class="fact-message">
                            <?php echo htmlspecialchars($_GET['fact-message']); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($_GET['error-message'])): ?>
                        <div id="error-message" class="error-message">
                            <?php echo htmlspecialchars($_GET['error-message']); ?>
                        </div>
                    <?php endif; ?>

                    <div id="error-message" style="color: red; display: none;"></div>
                    <input type="text" placeholder="Correo Electronico" name="correo">
                    <input type="password" placeholder="Contraseña" name="contrasena">
                    <button>Entrar</button>
                </form>

                <!--Register-->
                <form action="php/registro_usuario_be.php" method="POST" class="formulario__register">
                    <h2>Regístrarse</h2>
                    <?php if (isset($_GET['erroneo-message'])): ?>
                        <div id="erroneo-message"  class="error-message">
                            <?php echo htmlspecialchars($_GET['erroneo-message']);?>
                        </div>
                        <?php endif;?>
                    <?php if (isset($_GET['Error-message'])): ?>
                        <div id="Error-message"  class="error-message">
                            <?php echo htmlspecialchars($_GET['Error-message']); ?>
                        </div>
                    <?php endif; ?>
                    <input type="text" placeholder="Nombre completo" name="nombre_completo">
                    <input type="text" placeholder="Correo Electronico " name="correo">
                    
                    <input type="text" placeholder="Usuario" name="usuario">
                    <input type="password" placeholder="Contraseña" name="contrasena">
                    <button>Regístrarse</button>
                </form>
            </div>
        </div>

    </main>

    <script src="assets/js/script.js"></script>
    <script>
    // Comprobación de parámetros de URL para mostrar el registro si es necesario
    var showRegister = <?php echo json_encode($showRegister); ?>;
    if (showRegister) {
        register();
    }

    if (<?php echo json_encode($showRegister); ?>) {
    register(); // Llama a la función de registro si el parámetro está presente
}

</script>
<script>
    // Oculta el mensaje después de 3 segundos
    setTimeout(function() {
        var messageDiv = document.getElementById("fact-message");
        if (messageDiv) {
            messageDiv.style.display = "none";
        }
    }, 3000); // 3000 ms = 3 segundos
</script>


</body>

</html>