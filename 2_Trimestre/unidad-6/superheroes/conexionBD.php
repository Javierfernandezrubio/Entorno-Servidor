<?php
/**
 * Conexion a la base de datos
 * 
 * @author Javier Fernandez Rubio
 */

 function conectarBD() {
     try {
         $db = new PDO('mysql:host=localhost;dbname=phppracticas;charset=utf8', 'usuario', 'baloncesto');
         //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
         $db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "set names utf8");
         return $db;
     } catch (PDOException $e) {
         echo 'Error: ' . $e->getMessage();
         exit();
     }
 }
?>