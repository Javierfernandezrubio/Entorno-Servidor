<?php
/**
 * Un restaurante dispone de una carta de 3 primeros, 5 segundos y 3 postres. Almacenar 
 * información incluyendo foto y mostrar los menús disponibles. Mostrar el precio del menú
 * suponiendo que éste se calcula sumando el precio de cada uno de los platos incluidos y con un 
 * descuento del 20 %.
 * 
 * @author: Javier Fernandez Rubio
 * @since: 12/10/2021
 * 
 */

$menu = array("primerPlato" => array (array ("nombre" => "Ensalada césar", "foto" => "./img/ensalada.jpg", "precio" => "6.50"),
                    array ("nombre" => "Berenjenas a la miel", "foto" => "./img/berenjenas.jpg", "precio" => "6.75"),
                    array ("nombre" => "Croquetas caseras", "foto" => "./img/croquetas.jpg", "precio" => "6.00")),
            "segundoPlato" => array (array ("nombre" => "Lasaña", "foto" => "./img/lasana.jpg", "precio" => "7.50"),
                    array ("nombre" => "Espaguetis a la carbonara", "foto" => "./img/espaguetis.jpg", "precio" => "6.50"),
                    array ("nombre" => "Solomillo al roquefort", "foto" => "./img/solomillo.jpg", "precio" => "8.50"),
                    array ("nombre" => "Dorada", "foto" => "./img/dorada.jpg", "precio" => "7.25"),
                    array ("nombre" => "Cordero", "foto" => "./img/cordero.jpg", "precio" => "9.50")),
            "postre" => array (array ("nombre" => "Helado", "foto" => "./img/helado.jpg", "precio" => "2.50"),
                    array ("nombre" => "Tarta de queso", "foto" => "./img/tartadequeso.jpg", "precio" => "3.50"),
                    array ("nombre" => "Tarta tres chocolates", "foto" => "./img/tartatreschocolates.jpg", "precio" => "3.50")));


echo "<h1>Estos son nuestros platos</h1>
        <h2>Primeros</h2>";
    foreach ($menu['primerPlato'] as $plato) {
        echo '<p><strong>'.$plato['nombre'].'</strong> Precio: '.$plato['precio'].'<br/><img src="'.$plato['foto'].'"/></p>';
    }
echo "<h2>Segundos</h2>";

    foreach ($menu['segundoPlato'] as $plato) {
        echo '<p><strong>'.$plato['nombre'].'</strong> Precio: '.$plato['precio'].'<br/><img src="'.$plato['foto'].'"/></p>';
    }

echo "<h2>Postres</h2>";

    foreach ($menu['postre'] as $postre) {
        echo '<p><strong>'.$postre['nombre'].'</strong> Precio: '.$postre['precio'].'<br/><img src="'.$postre['foto'].'"/></p>';
    }


echo "<h3>Elige tu menú y beneficiate de un 20% de descuento</h3>
    <table>
        <th>Opción</th>
        <th>Primer plato</th>
        <th>Segundo plato</th>
        <th>Postre</th>
        <th>Total</th>";
        $contador = 1;
        foreach ($menu['primerPlato'] as $plato) {
            foreach ($menu['segundoPlato'] as $plato2) {
                foreach ($menu['postre'] as $postre) {
                    echo '<tr><td>'.$contador.'</td><td>'.$plato['nombre'].'</td><td>'.$plato2['nombre'].'</td><td>'.$postre['nombre'].'</td><td>'.(($plato['precio']+$plato2['precio']+$postre['precio'])-($plato['precio']+$plato2['precio']+$postre['precio'])*0.2).' €</td></tr>';
                    $contador++;
                }
            }
        }

echo "</table>";