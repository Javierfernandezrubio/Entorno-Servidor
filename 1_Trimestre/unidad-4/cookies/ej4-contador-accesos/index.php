<?php
/**
 * @author: Javier Fernández Rubio
 */

 $titulo = "Ejercicio 4";
 $descripcion = "Incluir en vuestro servidor un contador que indique al usuario el número de veces que ha accedido al sitio.";

 $cookie = intval($_COOKIE['contador'])+1 ?? 1;
 if (!isset($_COOKIE['contador'])){
    setcookie("contador", "1", time()+3600);
 } else {
    setcookie("contador", strval($cookie), time()+3600);
 }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Javier Fernández Rubio"/>
    <!--<link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/estilo.css">-->
    <script src="https://use.fontawesome.com/0fbf2b9dd0.js"></script>
    <title>Javier Fernández Rubio - 2º DAW</title>
</head>
<body>
    <header></header>
    <nav><h2><?php echo $titulo ?></h2></nav>
    <div class="ejercicio">
        <p>
            <?php echo $descripcion ?>
        </p>
    </div>
    <div class="contenedor">
        <div class="principal">
            <p>Ha accedido a este sitio: <?php echo $cookie; 
            if ($cookie == 1) {
                echo ' vez';
            } else {
                echo ' veces';
            } ?>
            </p>
        </div>
    </div>
    <footer>
        <div class="redes"></div>
    </footer>
</body>
</html>