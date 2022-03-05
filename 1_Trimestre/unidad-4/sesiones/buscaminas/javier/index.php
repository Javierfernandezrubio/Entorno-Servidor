<?php

/**
 * Buscaminas
 * 
 * @author Javier Fernández Rubio 
 */
// Definición de la constante con el número de filas y columnas
define('MAX_MINAS', 10);
define('MAX_FILAS', 10);
define('MAX_COLUMNAS', 10);

session_start();

// Bandera de gana o pierde
$banderaGanador = false;

if (!isset($_SESSION['tableroConMinas'])) {
    $_SESSION['tableroConMinas'];
    $_SESSION['tableroVisible'];
    $_SESSION['configuracionPartida']['filas'] = MAX_FILAS;
    $_SESSION['configuracionPartida']['columnas'] = MAX_COLUMNAS;
    $_SESSION['bandera'] = false;
    generaTablero();
}

// Funcion visualiza tablero
function visualizaTablero()
{
    echo "<table border='1'>";
    for ($fila = 0; $fila < count($_SESSION['tableroConMinas']); $fila++) {
        echo "<tr>";
        for ($columna = 0; $columna < count($_SESSION['tableroConMinas'][$fila]); $columna++) {
            echo "<td>";
            echo $_SESSION['tableroConMinas'][$fila][$columna];
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

// Funcion genera tablero
function generaTablero()
{
    for ($fila = 0; $fila < $_SESSION['configuracionPartida']['filas']; $fila++) {
        $tablero[$fila] = array();
        for ($columna = 0; $columna < $_SESSION['configuracionPartida']['columnas']; $columna++) {
            $_SESSION['tableroConMinas'][$fila][$columna] = 0;
            $_SESSION['tableroVisible'][$fila][$columna] = 0;
        }
    }
    insertarMinas();
}


// Función inserta minas
function insertarMinas()
{
    $contador = 0;
    do {
        $fila = random_int(0, $_SESSION['configuracionPartida']['filas'] - 1);
        $columna = random_int(0, $_SESSION['configuracionPartida']['columnas'] - 1);
        if ($_SESSION['tableroConMinas'][$fila][$columna] != 9) {
            $_SESSION['tableroConMinas'][$fila][$columna] = 9;
            sumamosAlrededor($fila, $columna);
            $contador++;
        }
    } while ($contador < 10);
}

// Función suma alrededor de minas
function sumamosAlrededor($fila, $columna)
{
    for ($i = max($fila - 1, 0); $i <= min($fila + 1, $_SESSION['configuracionPartida']['filas'] - 1); $i++) {
        for ($j = max($columna - 1, 0); $j <= min($columna + 1, $_SESSION['configuracionPartida']['columnas'] - 1); $j++) {
            if ($_SESSION['tableroConMinas'][$i][$j] != 9) $_SESSION['tableroConMinas'][$i][$j]++;
        }
    }
}

function ganador()
{
    $banderaGanador = true;
    for ($fila = 0; $fila < $_SESSION['configuracionPartida']['filas']; $fila++) {
        for ($columna = 0; $columna < $_SESSION['configuracionPartida']['columnas']; $columna++) {
            if ($_SESSION['tableroVisible'][$fila][$columna] == 0 && $_SESSION['tableroConMinas'][$fila][$columna] != 9) {
                $banderaGanador = false;
            }
        }
    }
    return $banderaGanador;
}

/**
 * Pulsar casilla
 * Funcion que implementa la funcionalidad del juego.
 * Se pulsa sobre un enlace, se envian por la url y el metodo get
 * del formulario, la fila y la columna.
 *
 * @param [type] $fila
 * @param [type] $columna
 * @return void
 */
function clickCasilla($fila, $columna)
{
    if ($_SESSION['tableroVisible'][$fila][$columna] == 0) {
        $_SESSION['tableroVisible'][$fila][$columna] = 1;
        if ($_SESSION['tableroConMinas'][$fila][$columna] == 9) {
            finPartida();
        } else {
            if ($_SESSION['tableroConMinas'][$fila][$columna] == 0) {
                for ($i = max($fila - 1, 0); $i <= min($fila + 1, $_SESSION['configuracionPartida']['filas'] - 1); $i++) {
                    for ($j = max($columna - 1, 0); $j <= min($columna + 1, $_SESSION['configuracionPartida']['columnas'] - 1); $j++) {
                        clickCasilla($i, $j);
                    }
                }
            }
        }
    }
}

function finPartida()
{
    $_SESSION['bandera'] = true;
    visualizaTablero();
}

function reiniciarPartida()
{
    $_SESSION['tableroConMinas'] = null;
    $_SESSION['tableroVisible'] = null;
    $_SESSION['configuracionPartida']['filas'] = MAX_FILAS;
    $_SESSION['configuracionPartida']['columnas'] = MAX_COLUMNAS;
    $_SESSION['bandera'] = false;
    generaTablero();
}

function muestraResultado($fila, $columna)
{
    return $_SESSION['tableroConMinas'][$fila][$columna];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscaminas</title>
</head>

<body>
    <?php
    //generaTablero(); // Genera el tablero
    //visualizaTablero(); // Visualiza el tablero

    echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">';
    // Mostrar tablero
    $contador = 0;
    for ($i = 0; $i < sizeof($_SESSION['tableroVisible']); $i++) {
        for ($j = 0; $j < sizeof($_SESSION['tableroVisible']); $j++) {
            if ($contador == 9) {
                if ($_SESSION['tableroVisible'][$i][$j] == 0) {
                    echo '<input class="noVisible" type="submit" name="' . $i . ' ' . $j . '" value="' . $i . ' ' . $j . '" /><br/>';
                } else {
                    echo '<input class="visible" type="button" value="' . muestraResultado($i, $j) . '" disabled /><br/>';
                }
                $contador = 0;
            } else {
                if ($_SESSION['tableroVisible'][$i][$j] == 0) {
                    echo '<input class="noVisible" type="submit" name="' . $i . ' ' . $j . '" value="' . $i . ' ' . $j . '" />';
                } else {
                    echo '<input class="visible" type="button" value="' . muestraResultado($i, $j) . '" disabled />';
                }
                $contador++;
            }
        }
    }
    echo '</form>';


    if (!$_SESSION['bandera']) {
        echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">';
        echo '<input class="visible" type="submit" name="reinicia" value="Reiniciar" />';
        echo '</form>';
    }
    ?>
</body>

</html>

<?php
// Funcion genera minas
//function generaMinas($tablero, $minas)
//{
//$minasRestantes = $minas;
//while ($minasRestantes > 0) {
//$fila = rand(0, count($tablero) - 1);
//$columna = rand(0, count($tablero[$fila]) - 1);
//if ($tablero[$fila][$columna] != "*") {
//$tablero[$fila][$columna] = "*";
//$minasRestantes--;
//}
//}
//return $tablero;
//}