<?php

/**
 * funcion para limpiar datos de entrada
 */
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$name = $email = $gender = $comentario = $website = "";
$nameErr = $emailErr  = $websiteErr = "";
$agender = array("Ketchup", "Mayonesa", "Otro");
$genderErr = "";
$aFutbol = array("Atletico de Madrid", "Barcelona", "Real Madrid");
$aFutbolSeleccionados = array();
$aOpciones = array(
    array(
        "valor" => 1,
        "literal" => "Opcion 1"
    ),
    array(
        "valor" => 2,
        "literal" => "Opcion2"
    ),
    array(
        "valor" => 3,
        "literal" => "Opcion 3"
    ),
    array(
        "valor" => 4,
        "literal" => "Opcion 4"
    ),
);
$opcionSeleccionada = 1;
$cars = array("Renault", "Mercedes", "Seat", "Opel Corsa");
$carsSeleccionados = array();
$lprocesaFormulario = false;
$lerror = false;
//detectamos error en la validacion de los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lprocesaFormulario = true;
    //Validacion del nombre
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $lerror = true;
    } else {
        $name = test_input($_POST["name"]);
    }
    //validacion email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $lerror = true;
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Formato de correo incorrecto";
            $lerror = true;
        }
    }
    if ($_POST["website"]) {
        $website = test_input($_POST["website"]);
        if (!filter_var($website, FILTER_VALIDATE_URL)) {
            $websiteErr = "Formato de website incorrecto";
            $lerror = true;
        }
    }
    //validacion comentario
    $comment = test_input($_POST["comment"]);

    //validacion gender
    if (empty($_POST["gender"])) {
    } else {
        $gender = test_input($_POST["gender"]);
    }
    if (isset($_POST['vehicle'])) {
        $aFutbolSeleccionados = $_POST['vehicle'];
    }
    if (isset($_POST['combo'])) {
        $opcionSeleccionada = $_POST['combo'];
    }
    if (isset($_POST['cars'])) {
        $carsSeleccionados = $_POST['cars'];
    }
    if ($lerror) {
        $lprocesaFormulario = false;
    }
}
?>
<?php
if (!$lprocesaFormulario) { ?>
    <h1>Validación formulario. PHP</h1>
    <p><span class="error">* Campos requeridos..</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Nombre:<input type="text" name="name" value="<?php echo $name; ?>">
        <span class="error">*<?php echo $nameErr; ?></span><br /><br />
        email: <input type="text" name="email" value="<?php echo $email; ?>">
        <span class="error">* <?php echo $emailErr; ?></span><br /><br />
        URL: <input type="text" name="website" value="<?php echo $website; ?>">
        <span class="error"><?php echo $websiteErr; ?></span><br /><br />
        Commentario:<br />
        <textarea name="comment" rows="5" cols="40"><?php echo $comentario; ?></textarea><br /><br />
        Salsas:
        <?php
        foreach ($agender as $clave => $valor) {
            $check = "";
            if ($gender == $valor) {
                $check = "checked";
            }
            echo "<input type=\"radio\" name=\"gender\" value = \"$valor\" $check>$valor";
        }
        echo "<span class=\"error\">* $genderErr</span><br/><br/>";
        ?>
        Futbol:<br />
        <?php
        foreach ($aFutbol as $valor) {
            $selected = (in_array($valor, $aFutbolSeleccionados)) ? 'checked' : '';
            echo "<input type =\"checkbox\" name=\"vehicle[]\" value = \"" . $valor . "\" $selected >" . $valor;
        }
        ?>
        <br /><br />
        Selecciona opción:
        <select name="combo">
            <?php
            foreach ($aOpciones as $valor) {
                $selected = ($opcionSeleccionada == $valor['valor']) ? 'selected' : '';
                echo "<option value = \"" . $valor['valor'] . "\" $selected >" . $valor['literal'] . "</option>";
            }
            ?>
        </select><br /><br />
        Selección de vehículos (múltiple):<br />
        <select multiple name="cars[]">
            <?php
            foreach ($cars as $valor) {
                $selected = (in_array($valor, $carsSeleccionados)) ? 'selected' : '';
                echo "<option value = \"" . $valor . "\" $selected >" . $valor . "</option>";
            }
            ?>
        </select><br /><br />
        <input type="submit" name="submit" value="Submit"><br /><br />
    </form>
<?php
} // Procesa Formulario
else {
    echo "<h1>Your Input:</h1>";
    echo $name;
    echo "<br/>";
    echo $email;
    echo "<br/>";
    echo $website;
    echo "<br/>";
    echo $comment;
    echo "<br/>";
    echo $gender;
    echo "<br/>";
    //Bucle para vehículos seleccionados.
    echo "Vehiculos: ";
    foreach ($aFutbolSeleccionados as $elemento) {
        echo $elemento . "<br/>";
    }

    echo $opcionSeleccionada;
    echo "<br/>";

    //Bucle para coches seleccionados.
    foreach ($carsSeleccionados as $elemento) {
        echo $elemento . "<br/>";
    }
}
