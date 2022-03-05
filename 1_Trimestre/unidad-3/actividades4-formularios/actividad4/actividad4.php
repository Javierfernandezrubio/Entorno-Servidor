<?php

/**
 * Crear un script para sumar una serie de números. El número de números a sumar será introducido en
 * un formulario.
 * 
 * @author Javier Fernández Rubio
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


// Definimos las variables
$cantidadNumeros = 0;
$arrayNumeros = array();
// Definimos los errores
$cantidadNumerosError = "";


// Banderas para controlar la validacion
$lprocesaFormulario = FALSE;
$lprocesaFormularioSuma = FALSE;
$lerror = FALSE;

// Detectamos error en la validacion de los datos del
// formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lprocesaFormulario = TRUE;
    //$lprocesaFormularioSuma = TRUE;

    // Validacion de la cantidad
    if (empty($_POST["cantidadNumeros"])) {
        $cantidadNumerosError = "Debes dar una cantidad de numeros";
        
    } else {
        $cantidadNumeros = clearData($_POST["cantidadNumeros"]);
        if ($cantidadNumeros <= 0) {
            $lerror = true;
            $cantidadNumerosError = "Debes dar una cantidad de numeros";
        }
    }
}

if ($lerror) {
    $lprocesaFormulario = FALSE;
    $lprocesaFormularioSuma = FALSE;
}

if ($lprocesaFormulario){
    $lprocesaFormularioSuma = false;
}

?>

<!DOCTYPE html>
<html lang="es">

<body>

    <head>
        <style>
            .error {
                color: #FF0000;
            }
        </style>
    </head>
</body>

</html>

<?php
if (!$lprocesaFormulario) { ?>
    <h1>Suma de una cantidad de números</h1>
    <p><span class="error">* Campos requeridos</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Cantidad de números:<input type="number" name="cantidadNumeros" value="<?php echo $cantidadNumeros; ?>">
        <span class="error">*<?php echo $cantidadNumerosError; ?></span><br /><br />


        <br /><br />
        <input type="submit" name="submit" value="Sumar"><br /><br />
    </form>
    <?php
} // Procesa Formulario
else {

    if (!$lprocesaFormularioSuma) { ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <?php
            $numInput = $_POST['cantidadNumeros'];
            for ($i = 1; $i <= $numInput; $i++) {
                echo "Número " + $i + "<input type=\"number\" name=\"arrayNumeros[]\" value=\"<?php echo $arrayNumeros[$i]; ?>\">";
                echo "<span class=\"error\">*<?php echo $cantidadNumerosError; ?></span><br/><br/>";
            }
            ?>
            <br /><br />
            <input type="submit" name="submit" value="Sumar"><br /><br />
        </form>
    <?php
    } else {
        if ($lprocesaFormularioSuma) {
            $suma = 0;
            foreach ($arrayNumeros as $numero) {
                $suma += $numero;
            }
        }
        echo "Suma: $suma";
    } ?>
<?php
}
?>