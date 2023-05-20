<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <!-- -----------------------> FORMULARIO <-------------------------// -->
        <h1>Taller de monos escritores</h1>
    
        <form>
            <fieldset>
                <legend>Búsqueda</legend>
                <label>Introduce aquí las palabras:
                <input type="Search"/>
                </label><br><br>
                <label for="Modo">¿Qué modo del texto buscar?:</label>
                <select id="Modo">Modo
                    <option value="Normal">Normal</option>
                    <option value="Palabras">Palabras</option>
                    <option value="Orden">Orden<option>
                </select><br><br>
                <label for="Zona">Zona horaria:</label>
                <select id="Zona">Zona
                    <option value="CDMX">CDMX</option>
                    <option value="NY">New York</option>
                    <option value="Berlín">Berlín<option>
                </select><br><br>
      
                <input type="reset" value="Borrar">
                <input type="submit" value="Enviar">
            </fieldset>    
        </form>
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

</body>
</html>