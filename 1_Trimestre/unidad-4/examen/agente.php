<?php
/**
 * agente
 * 
 * Parte del sistema de multas para los usuarios con perfil de agente
 * 
 * Permite crear nuevas multas
 * 
 * @author Javier Fernández Rubio
 */

session_start();
if ($_SESSION['perfil'] == 'agente') {
    $acceso = true;
} else {
    header('Location: index.php');
}

if (!isset($_SESSION['multas'])) {
    $_SESSION['multas'] = array();
}

if (isset($_POST['crearMulta'])) {
    $matricula = $_POST['matricula'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];
    $importe = $_POST['importe'];

    if($matricula == '' || $descripcion == '' || $fecha == '' || $importe == '') {
        $error = "Debes rellenar todos los campos";
    } else {
        $multa = array(
            'matricula' => $matricula,
            'descripcion' => $descripcion,
            'fecha' => $fecha,
            'importe' => $importe,
            'estado' => 'Pendiente'
        );
        array_push($_SESSION['multas'], $multa);
    }
    //array_push($_SESSION['multas'], array("id"=>$_SESSION['id'], "matricula"=>$matricula, "descripcion"=>$descripcion, "fecha"=>$fecha, "importe"=>$importe, "estado"=>"Pendiente"));
}





?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta author="Rafa Caballero">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Multas - Javier Fernandez Rubio</title>
</head>
<body>

<?php

if ($acceso) {
    echo "<h3>Bienvenido " . $_SESSION['usuario'] . "</h3>";

    echo "<a href=\"index.php\">Inicio</a> | ";
    echo "<a href=\"agente.php\">Gestión de multas</a> | ";
    echo "<a href=\"salir.php\">Cerrar sesión de " . $_SESSION['perfil'] . "</a><br><br>";

    echo "<form method=\"post\" action=\"" . $_SERVER['PHP_SELF'] . "\">";
            // Matrícula
            echo "<label for=\"matricula\">Matrícula </label>";
            echo "<input type=\"text\" name=\"matricula\" placeholder=\"Matrícula\"/><br>";
            // Descripción
            echo "<label for=\"descripcion\">Descripción </label>";
            echo "<input type=\"text\" name=\"descripcion\" placeholder=\"Descripción\"/><br>";
            // Fecha
            echo "<label for=\"fecha\">Fecha </label>";
            echo "<input type=\"date\" name=\"fecha\"/><br>";
            // Importe
            echo "<label for=\"importe\">Importe </label>";
            echo "<input type=\"number\" name=\"importe\" placeholder=\"Importe\"/><br>";
            echo "<input type=\"submit\" name=\"crearMulta\" value=\"Crear multa\"/>";
            echo "<input type=\"reset\" value=\"Borrar\"/>";
            echo "<span style=\"color: red;\"> " . $error . "</span>";
    echo "</form>";

    // Mostrar multas
    if (isset($_SESSION['multas']) && count($_SESSION['multas']) > 0) {
        echo "<table border>";
        echo "<tr>";
            echo "<th>Matrícula</th>";
            echo "<th>Descripción</th>";
            echo "<th>Fecha</th>";
            echo "<th>Importe</th>";
            echo "<th>Estado</th>";
        echo "</tr>";
        $indice = 0;
        foreach ($_SESSION['multas'] as $multa) {
            echo "<tr>";
                echo "<td>" . $multa['matricula'] . "</td>";
                echo "<td>" . $multa['descripcion'] . "</td>";
                echo "<td>" . $multa['fecha'] . "</td>";
                echo "<td>" . $multa['importe'] . "</td>";
                if ($multa['estado'] == 'Pendiente') {
                    echo "<td><a href=\"pagamulta.php?id=" . $indice . "\">" . $multa['estado'] . "</a></td>";
                } else {
                    echo "<td>" . $multa['estado'] . "</td>";
                }
            echo "</tr>";
            $indice++;   
        }
        echo "</table>";
    }
}

?>
    
</body>
</html>