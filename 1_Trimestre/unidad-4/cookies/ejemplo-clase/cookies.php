<?php 

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

    // Creamos variables
    $usuario = "";
    $contraseña = "";
    // Variables de error
    $errUsuario = "";
    $errContraseña = "";

    if (isset($_COOKIE['usuario'])) {
        $usuario = $_COOKIE['usuario'];
        $contraseña = $_COOKIE['contraseña'];
    } 
    else {
        $usuario = "";
        $contraseña = "";
    }
    
$lprocesaFormulario = false;
$lerror = false;

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $lprocesaFormulario = true;

    if (empty($_POST["usuario"])) {
        $errUsuario = "El nombre de usuario es necesario.";
        $lerror = true;
    } else {
        $usuario = test_input($_POST["usuario"]);
    }

    if (empty($_POST["contraseña"])) {
        $errContraseña = "La contraseña es necesario.";
        $lerror = true;
    } else {
        $contraseña = test_input($_POST["contraseña"]);
    }

    if($lerror){
        $lprocesaFormulario = false;
    }

}

?>
<?php
if (!$lprocesaFormulario) { ?>
    <h1>Validación formulario. PHP</h1>
    <p><span class="error">* Campos requeridos..</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        Usuario:<input type="text" name="usuario" value="<?php echo $usuario;?>">
                <span class="error">*<?php echo $errUsuario;?></span><br/><br/>
        Contraseña: <input type="password" name="contraseña" value="<?php echo $contraseña;?>">
                    <span class="error">*<?php echo $errContraseña;?></span><br/><br/> 
        <input type="submit" name="submit" value="Submit"><br/><br/>
  </form>
<?php
}
else {

    // Usuarios y contraseña correcta
    $correctUsuario = "iesgc";
    $correctContraseña = "1234";

    if ($usuario == $correctUsuario && $contraseña == $correctContraseña) {
        setcookie('usuario', $usuario, time()+36000 );
        setcookie('contraseña', $contraseña, time()+36000 );
        echo "<p>Todo Ok</p>";
    } else {
        echo "<p>Acceso denegado</p>";
    }
}