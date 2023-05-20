<?php
    //-----------------------> FECHA Y HORA <-----------------------//
    
    date_default_timezone_set("Asia/Choibalsan");
    $zona_horaria = date_default_timezone_get();
    $ahora = date('h:i:s a');
    $fecha = date('d/m/Y');
    
    $fecha_rand = array(
        "hour" => rand(1, 12), 
        "minute" => rand(1, 59),
        "second" => rand(1, 59),
        "mes" => rand(1, 12),
        "dia" => rand(1, 31),
        "año" => rand(1000, 2023));

    $salida = mktime($fecha_rand["hour"], $fecha_rand["minute"], $fecha_rand["second"], $fecha_rand["mes"], $fecha_rand["dia"], $fecha_rand["año"]);

    echo "La fecha de consulta de este libro fue el ".$fecha." a las ".$ahora." en ".$zona_horaria;
    echo '<br><br>';
    echo "El libro se escribió el ".date("d/m/Y", $salida).'<br>';
?>