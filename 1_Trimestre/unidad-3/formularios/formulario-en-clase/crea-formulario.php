<?php
$datosPersonales = array(
    "nombre" => array('tipo' => "text", 
                        'valor' => ""
    ),
    "apellidos" => array('tipo' => "text", 
                        'valor' => ""
    ),
    "direccion" => array('tipo' => "text", 
                        'valor' => ""
    ),
    "curso" => array( 'tipo' => "radio",
                'opciones' => array ( 
        "1ASIR",
        "2ASIR",
        "1DAW",
        "2DAW" )
    ) 
);

echo ("<form action=\"mostrar-formulario.php\" method=\"post\">");

foreach ($datosPersonales as $key => $value) {
    echo("<label>".$key."");
    if ($value['tipo'] == 'radio'){
        $opciones = $value['opciones'];
        //echo ("<input type=\"".$value."\" name=\".$value\" );
        foreach ($opciones as $clave => $valor) {
            echo ("<label><input type=\"".$value['tipo']."\" name=\"defecto\" value=\"\">".$valor."</label>");
        }
    } else {
        echo("<input type=\"".$key."\" name=\"\" value=\"\">");
    }
    echo ("</label><br>");
}
echo("<input type=\"submit\" value=\"Enviar\">");
echo ("</form>");
