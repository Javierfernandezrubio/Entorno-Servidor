<?php

/**
 * Crear una aplicación que almacene información de países: nombre capital y bandera. Diseñar un
 * formulario que permita seleccionar un país y nos muestre el nombre de la capital y la bandera.
 * 
 * 
 * @author Javier Fernández Rubio
 * @date 27-10-2021
 */

/**
 * Funcion que limpia los datos del fomulario
 * de errores
 *
 * @param $data
 * @return void
 */
function clearData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


// Definimos las variables, esta vez de tipo select
$arrayPaises = array(
    array('valor' => 1, 'capital' => 'Madrid', 'bandera' => 'img/españa.jpg', 'pais' => 'España'),
    array('valor' => 2, 'capital' => 'Paris', 'bandera' => 'img/francia.PNG', 'pais' => 'Francia'),
    array('valor' => 3, 'capital' => 'Berlin', 'bandera' => 'img/alemania.png', 'pais' => 'Alemania'),
    array('valor' => 4, 'capital' => 'Lisboa', 'bandera' => 'img/portugal.jpg', 'pais' => 'Portugal'),
    array('valor' => 5, 'capital' => 'Roma', 'bandera' => 'img/italia.jpg', 'pais' => 'Italia')
);
$paisEscogido = "";


// Banderas para controlar la validacion
$lprocesaFormulario = FALSE;
$lerror = FALSE;

// Detectamos error en la validacion de los datos del formulario
// Validacion no necesaria en verdad
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lprocesaFormulario = TRUE;

    // lista despegable de opciones
    if (isset($_POST["paises"])) {
        $paisEscogido = $_POST["paises"];
    }
}

if ($lerror) {
    $lprocesaFormulario = FALSE;
}


if (!$lprocesaFormulario) { ?> 
    <h1>Paises, sus capitales y sus banderas:</h1>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        Selecciona país:
        <select name="paises">
            <?php
            foreach ($arrayPaises as $valor) {
                $selected = ($paisEscogido == $valor['pais']) ? 'selected' : '';
                echo "<option value =\"" . $valor['pais'] . "\" $selected >" . $valor['pais'] . "</option>";
            }
            ?>
        </select>
        <br />
        <input type="submit" name="enviar" value="Enviar">
    </form>



<?php
} else { ?>

    <h1>Paises, sus capitales y sus banderas:</h1>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        Selecciona país:
        <select name="paises">
            <?php
            foreach ($arrayPaises as $valor) {
                $selected = ($paisEscogido == $valor['pais']) ? 'selected' : '';
                echo "<option value =\"" . $valor['pais'] . "\" $selected >" . $valor['pais'] . "</option>";
            }
            ?>
        </select>
        <input type="submit" name="enviar" value="Enviar">
    </form>


    <h2>Has escogido el país <?php echo $_POST['paises'] ?> </h2>

    <?php
    //function paisSeleccionado( $paisEscogido, $arrayPaises ){
    $paisnu = "";
    $img = "";
    foreach ($arrayPaises as $pais) {

        foreach ($pais as $key => $value) {
            if ($key == 'capital') {
                $paisnu = $value;
            }

            if ($key == 'bandera') {
                $img = $value;
            }

            if ($value == $_POST['paises']) {
                echo "<p>Capital: " . $paisnu . "</p> ";
                echo "<p>Bandera: <br/> <img src=\"" . $img . " \"</p> ";
            }
        }
    }

    //}
    ?>
<?php
}
?>