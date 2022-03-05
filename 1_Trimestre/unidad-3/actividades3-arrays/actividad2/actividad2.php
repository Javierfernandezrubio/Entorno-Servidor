<?php
/**
 * Crear un array con los alumnos de clase y permitir la selección aleatoria de uno de ellos. 
 * El resultado debe mostrar nombre y fotografía.
 * 
 * 
 * @author Javier Fernandez Rubio
 * @date 10/10/2021
 * 
 */

 $alumnos = array( array("nombre" => "Jesus Díaz Rivas", "foto" => "./img/JesusDiazRivas.jpg"),
    array("nombre" => "Manuel Brito Guerrero", "foto" => "./img/ManuelBrito.jpg"),
    array("nombre" => "Joaquín Baena Salas", "foto" => "./img/JoaquinBaenaSalas.jpg"),
    array("nombre" => "Laura Hidalgo Rivera", "foto" => "./img/LauraHidalgoRivera.jpg"),
    array("nombre" => "Tomas Hidalgo Martin " , "foto" => "./img/TomasHidalgoMartin.jpg"),
    array("nombre" => "Carlos Hidalgo Risco" , "foto" => "./img/CarlosHidalgoRisco.PNG"),
    array("nombre" => "Daniel Ayala Cantador" , "foto" => "./img/DanielAyalaCantador.jpg"),
    array("nombre" => "Javier Cebrián Muñoz" , "foto" => "./img/javierCebrianMuñoz.jpeg"),
    array("nombre" => "Javier Fernández Rubio" , "foto" => "./img/javierfernandezrubio.jpeg"),
    array("nombre" => "Rubén Ramírez Rivera" , "foto" => "./img/RubenRamirezRivera.jpeg"),
    array("nombre" => "David Pérez Ruiz" , "foto" => "./img/DavidPerezRuiz.png"),
    array("nombre" => "Alejandro Rabadán Rivas" , "foto" => "./img/AlejandroRabadanRivas.jpg"),
    array("nombre" => "David Rosas Alcatraz" , "foto" => "./img/DavidRosasAlcaraz.jpg"),
    array("nombre" => "Guillermo Tamajon Hernandez" , "foto" => "./img/GuillermoTamajonHernandez.jpg"),
    array("nombre" => "Sergio Vera Jurado" , "foto" => "./img/sergiovera.png"),
    array("nombre" => "Javier Salazar Almagro" , "foto" => "./img/JavierSalazarAlmagro.jpg"),
    array("nombre" => "Manuel Solar Bueno" , "foto" => "./img/ManuelSolarBueno.jpg"),
    array("nombre" => "Andrea Solís Tejada" , "foto" => "./img/AndreaSolisTejada.jpeg"),
    array("nombre" => "Juan Manuel González Prófumo" , "foto" => "./img/JuanManuelGonzalezProfumo.jpg"),
    array("nombre" => "Rafael Yuste Barrera" , "foto" => "./img/suu.jpg"),
    array("nombre" => "Javier Epifanio López" , "foto" => "./img/JavierEpifanioLopez.jpg"),
    array("nombre" => "Carlos Chaves Hernández" , "foto" => "./img/suu.jpg"),
    array("nombre" => "Virginia Ordoño Bernier" , "foto" => "./img/VirginiaOrdoño.jpg")
);

$numAle = rand(0,22);
$alumnoAleatorio = $alumnos[$numAle];

echo $alumnoAleatorio['nombre'].'<br/><img src='.$alumnoAleatorio['foto'].'>';
    


