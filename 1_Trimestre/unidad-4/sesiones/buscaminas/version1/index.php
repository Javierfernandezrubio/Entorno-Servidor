<?php

/**
 * @author: manolohidalgo_
 */
session_start();
if (isset($_POST)) {
    if ($_POST['reiniciar']) {
        unset($_SESSION['tableroConMinas']);
        unset($_SESSION['tableroVisible']);
        unset($_SESSION['bandera']);
        unset($_SESSION['configuracionPartida']['filas']);
        unset($_SESSION['configuracionPartida']['columnas']);
        session_destroy();
        session_start();
        session_regenerate_id(true);
    } else {
        foreach ($_POST as $key => $value) {
            $fila = substr($key, 0, 1);
            $columna = substr($key, 2);
            clickCasilla($fila, $columna);
        }
    }
}
if (!isset($_SESSION['tableroConMinas'])) {
    $_SESSION['tableroConMinas'];
    $_SESSION['tableroVisible'];
    $_SESSION['configuracionPartida']['filas'] = 10;
    $_SESSION['configuracionPartida']['columnas'] = 10;
    $_SESSION['bandera'] = false;
    crearTableros();
}

function crearTableros()
{
    for ($i = 0; $i < $_SESSION['configuracionPartida']['filas']; $i++) {
        for ($j = 0; $j < $_SESSION['configuracionPartida']['columnas']; $j++) {
            $_SESSION['tableroConMinas'][$i][$j] = 0;
            $_SESSION['tableroVisible'][$i][$j] = 0;
        }
    }
    insertarMinas();
}

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

function sumamosAlrededor($fila, $columna)
{
    for ($i = max($fila - 1, 0); $i <= min($fila + 1, $_SESSION['configuracionPartida']['filas'] - 1); $i++) {
        for ($j = max($columna - 1, 0); $j <= min($columna + 1, $_SESSION['configuracionPartida']['columnas'] - 1); $j++) {
            if ($_SESSION['tableroConMinas'][$i][$j] != 9) $_SESSION['tableroConMinas'][$i][$j]++;
        }
    }
}

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
    //  echo 'Perdiste pringado';
}

function muestraResultado($fila, $columna)
{
    return $_SESSION['tableroConMinas'][$fila][$columna];
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="http://localhost/img/logo-manolohidalgo-redondo.png" />
    <meta charset="utf-8">
    <meta name="description" content"Manolo Hidalgo">
    <meta name="keywords" content"Manolo, Hidalgo, DAW, Diseño de Aplicaciones Web">
    <link rel="alternate" type="application/rss+xml" title="Manolo Hidalgo - Desarrollador de Aplicaciones Web" href="https://hipema.github.io/rss/rss_html.xml" />
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://localhost/css/bootstrap.css">
    <script src="https://kit.fontawesome.com/1033c8428d.js" crossorigin="anonymous"></script>
    <title>yo</title>
</head>

<body>
    <div class="container">
        <!-- Frase central -->
        <div class="row">
            <div class="container-fluid bg-dark">
                <h2 class="text-light text-center">Desarrollo Web en Entorno Servidor</h2>
            </div>
        </div>

        <!-- Cuerpo de la página -->
        <div class="container-fluid py-4">
            <h3>Buscaminas</h3>
            <div class="contenedor">
                <div class="principal">
                    <?php
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
                    ?>
                </div>
                <div class="lateral">
                    <?php
                    echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">';
                    echo '<input class="opciones" type="button" value="Colocar bandera">';
                    echo '<input class="opciones" type="button" value="Reiniciar partida">';
                    echo '</form>';
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>