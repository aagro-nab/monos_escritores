<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".\statics\styles\monos_escritores.css">
    <title>Taller de Monos Escritores</title>
</head>
<body class="mainmain">

        <!-- ----------------------- FORMULARIO     ------------------------->
        <div class="main">
        <div id="titulo">Taller de monos escritores</div>
    
        <span class="sub"> Busqueda </span>
        
        <div class="cuerpo">
        <div id= "monito"> <img src=".\statics\img\mono.png" width="250px"> </div>
        <form class="form" action="./monos_escritores_print.php" method="post" enctype="multipart/form-data" target="_self">
            <!--<fieldset>-->
                <label>Introduce aquí las palabras</label>
                <input type="text" name="input"/>
                <br><br>
                <label for="mod" >¿Qué modo del texto buscar?</label>
                <select name="mod" id="Modo">Modo
                    <option value="Normal">Normal</option>
                    <option value="Palabras">Palabras</option>
                    <option value="Desorden">Desorden<option>
                </select><br><br>
                <label for="Zona">Zona horaria</label>
                <select id="Zona" name= "zona">Zona
                    <option value="CDMX">Ciudad de México</option>
                    <option value="NY">New York</option>
                    <option value="Berlin">Berlin<option>
                </select><br><br>
      
                <span id="enviar"> <input type="reset" value="Borrar">
                <input type="submit" value="Enviar"> </span>
            <!--</fieldset>    -->
        </form></div>
        </div>
    
</body>
</html>