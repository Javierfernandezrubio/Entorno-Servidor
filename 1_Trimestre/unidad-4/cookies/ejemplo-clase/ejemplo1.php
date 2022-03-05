<?php
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
/*
if (isset($_COOKIE['contador'])) {
    setcookie('contador', $_COOKIE['contador'] + 1, time() + 3600);
} else {
    setcookie('contador', 1, time() + 3600);
}

echo $_COOKIE['contador'];*/

// Declaracion de variables
$nombre = $contraseña =  "";
$nombreErr = $contraseñaErr = "";

// Bandera para controlar el submit
$procesaFormulario = false;
$lerror = false;

if ($_Server['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['nombre'])) {
        $nombreErr = "El nombre es obligatorio";
        $lerror = true;
    } else {
        $nombre = test_input($_POST['nombre']);
    }

    if (empty($_POST['contraseña'])) {
        $contraseñaErr = "La contraseña es obligatoria";
        $lerror = true;
    } else {
        $contraseña = test_input($_POST['contraseña']);
    }
}

if ($lerror) {
    $procesaFormulario = true;
}

if (!$procesaFormulario) { ?>
    <h2>Acesso a tu cuenta:</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        Nombre: <input type="text" name="nombre" value="<?php echo $nombre ?>">
        <span class="error">*<?php echo $nombreErr ?></span>
        Contraseña: <input type="password" name="contraseña" value="<?php echo $contraseña ?>">
        <span class="error">*<?php echo $contraseñaErr ?></span>
        <input type="submit" name="submit" value="Submit">
    </form>
<?php
} else {
    if ($nombre == "usuario" && $contraseña == "admin") {
        echo "Bienvenido " . $nombre . "!";
    } else {
        echo "Usuario o contraseña incorrectos";
    }
}
