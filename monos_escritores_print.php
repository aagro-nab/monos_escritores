<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".\statics\styles\monos_escritores.css">
    <title>Document</title>
</head>
<body class="mainmain">
<?php


    //-----------------------> ARREGLO DEL USUARIO <-----------------------//
    $input=(isset($_POST["input"]) && $_POST["input"] !="")? $_POST["input"] : "Sin llenar";
    $modo=(isset($_POST["mod"]) && $_POST["mod"] !="")? $_POST["mod"] : false;
    $zona=(isset($_POST["zona"]) && $_POST["zona"] !="")? $_POST["zona"] : false;
    $input = explode(" ",$input);

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
    if($modo=="Normal"){
        echo "<div class=\"sub_p\"> Modo Normal </div>";

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

    }else{
            //-----------------------> MODO PALABRAS <-----------------------//
            //Las palabras salen en diferentes posiciones y diferente orden
            if($modo=="Palabras"){
                echo "<div class=\"sub_p\"> Modo Palabras </div>";

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

        } else {
            //-----------------------> MODO DESORDEN <-----------------------//
            //Las palabras salen todas juntas desordenadas
            if($modo=="Desorden"){
                echo "<div class=\"sub_p\"> Modo Desorden </div>";

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
            }
        }

        
    }
    echo "</main>";
    //-----------------------> FECHA Y HORA <-----------------------//

    echo '<br>';
    // date_default_timezone_set("$zona");
    // $zona = date_default_timezone_get();
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

    echo "La fecha de consulta de este libro fue el ".$fecha." a las ".$ahora." en ";
    if ($zona=="Berlin") {
        echo "Alemania, Berlín";
    } else {
            if ($zona=="NY") {
                echo "EUA, New York";
            } else {
                    if ($zona=="CDMX") {
                            echo "México, Ciudad de México";
                    }
                }
        }      
    echo '<br><br>';
    echo "El libro se escribió el ".date("d/m/Y", $salida).'<br>';
    ?>
</body>
</html>