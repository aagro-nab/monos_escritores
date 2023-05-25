<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".\statics\styles\monos_escritores.css">
    <title>Taller de Monos Escritores</title>
</head>
<body>
  <?php
        // -----------------------> FORMULARIO <-------------------------//
        echo '<div class="main">
        <div id="titulo">Taller de monos escritores</div>
    
        <span id="sub"> Busqueda </span>
        <form id="form">
            <fieldset>
                
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
        </div>';
    

        //-----------------------> ARREGLO DEL USUARIO <-----------------------//

        $input = array("Hola", "Soy", "Ame", "Lol", "Que", "Funcione", "Porfavor");
        
        //-----------------------> PALABRAS RANDOM <-----------------------//

        echo '<main>';
            $abecedario = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L",
            "M", "N", "Ñ", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "a", 
            "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "ñ", "o", "p",
            "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "1", "2", "3", "4", "5", "6",
            "7", "8", "9", "0");

            //echo var_dump($abecedario);
            //echo count($abecedario);

            //son 64 variables de abecedario

            $longitud = rand(6, 9);
            $palabras = rand (250, 260);

        //-----------------------> MODO NORMAL <-----------------------//
        //Las palabras salen en el documento todas juntas en orden

        echo "<br><b> MODO NORMAL </b><br><br>";

        $posicion = rand(1, $palabras);
        $cadena = implode(" ", $input);

            for($cont_p=$palabras; $cont_p>=0; $cont_p--)
            {
                if($posicion == $cont_p)
                    echo '<b>'.$cadena.'</b>';
                else
                {
                    $longitud = rand(6, 9);
                    for($cont_l=$longitud; $cont_l>=0; $cont_l--)
                    {
                        $letra = rand(0, 63);
                        echo $abecedario[$letra];
                    }
                }
                echo ' ';
            }
        
        
        //-----------------------> MODO PALABRAS <-----------------------//
        //Las palabras salen en diferentes posiciones y diferente orden

        echo "<br><br><b> MODO PALABRAS </b><br><br>";

        $palabras_m = $palabras;
        $verificar = [];
        $diferente = true;

        //POSICIONES QUE NO SE REPITEN
            for($cant_palabras = count($input); $cant_palabras>=0; $cant_palabras--)
            {
                do
                {
                    $posicion_m[$cant_palabras] = rand(1, $palabras_m);
                    //$verificar[$cont_ver] = $posicion_m[$cant_palabras];

                    for($cont_dif=count($verificar)-1; $cont_dif>=0; $cont_dif--)
                    {
                        if ($posicion_m[$cant_palabras] == $verificar[$cont_dif])
                        {
                            $diferente = false;
                        }
                    }

                }while($diferente = false);
            }

        //GENERAR PALABRAS
            for($cont_p=$palabras; $cont_p>=0; $cont_p--)
            {
                $imprimir_input = false;
                for($cont = count($input)-1; $cont>=0; $cont--)
                {
                    if($posicion_m[$cont] == $cont_p)
                    {
                        echo '<b>'.$input[$cont].' '.'</b>';
                        $imprimir_input = true;
                    }
                }

                if($imprimir_input == false)
                {
                    $longitud = rand(6, 9);
                    for($cont_l=$longitud; $cont_l>=0; $cont_l--)
                    {
                        $letra = rand(0, 63);
                        echo $abecedario[$letra];
                    }
                    echo $cont_p.' ';
                }

                echo ' ';
            }

        
        //-----------------------> MODO DESORDEN <-----------------------//
        //Las palabras salen todas juntas desordenadas
        
        echo "<br><br><b> MODO DESORDEN </b><br><br>";

        $cant_palabras = count($input);

        shuffle($input);
        $cadena = implode(" ", $input);

        $posicion = rand(1, $palabras);

            for($cont_p=$palabras; $cont_p>=0; $cont_p--)
            {
                $longitud = rand(6, 9);
                if($posicion == $cont_p)
                    echo '<b>'.$cadena.'</b>';
                else
                {
                    $longitud = rand(6, 9);
                    for($cont_l=$longitud; $cont_l>=0; $cont_l--)
                    {
                        $letra = rand(0, 63);
                        echo $abecedario[$letra];
                    }
                }
                echo ' ';
            }
         
        
        echo '</main>';
      
        //-----------------------> FECHA Y HORA <-----------------------//
        
        echo '<br>';
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