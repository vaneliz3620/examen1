<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Vane">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Examen 1</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <script language="javascript" src="./scripts.js"></script>
</head>
<body>
    <?php include "conexion.php"; ?>
    <div class="header">
        <h1>Examen No. 1</h1>
        <h2>Diseño de Comportamientos Interactivos III</h2>
    </div>
    
    <div class="contenedor1"> 
        <button type="button" class="b1" onclick="mostrarFoto13()">Mostrar foto</button>
        <button type="button" class="b1" onclick="ocultarFoto13()">Ocultar foto</button>
        <img src="imgs/foto1.jpg" class="foto" id="foto">
    </div>

    <div class="contenedor2">
        Ingrese su teléfono (10 números):
        <br><br>
        <form>
            <input type="text" class="c1" placeholder="telefono" id="telefono" />
            <br><br>
            <button type="button" class="b1" onclick="validarTelefono13()">Validar</button>
        </form>
        <br>
        <div class="msg" id="msg"></div>

    </div>

    <div class="contenedor3">
        Desplegar los registros que inician con la letra: 
        <br><br>
        <form method="post" action="index.php">
            <input type="text" name="letra" maxlength="1" class="c2" placeholder="letra" />
            <button type="submit" class="b1">Buscar</button>
        </form>
        <br><br>
        <?php
       if (isset($_REQUEST["letra"])){
        $letraParaBuscar = $_REQUEST["letra"];
        $sql = "select idDirectorio, nombre, apellido from juanf_directorio where apellido like '".$letraParaBuscar."%' order by apellido";
        $rs = ejecutar($sql);

    }else if (isset($_POST["busqueda"])){
        $registroParaBuscar = $_POST["busqueda"];

        $sql = "select idDirectorio, nombre, apellido from juanf_directorio where apellido like '".$registroParaBuscar."%' order by apellido";
        $rs = ejecutar($sql);
    }
        ?>

<?php
        if (isset($_REQUEST["letra"]) || isset($_POST["busqueda"])){
            echo '<div id="r1">Registros encontrados: </div>';
            echo '<ul class="listaNombres">';

             if (mysqli_num_rows($rs) != 0){
                $k = 0;
                while ($datos = mysqli_fetch_array($rs)){
                    if ($k % 2 == 0){
                        echo "<li class='oscuro'>";
                    }else{
                        echo "<li class='claro'>";
                    }
                    echo "<a href='javascript:mostrarRegistro(".$datos['idDirectorio'].")'>".$datos["apellido"]."</a>, ".$datos["nombre"].", ".$datos["apellido"].", ".$datos["empresa"].", ".$datos["email"]."</li>";
                    $k++;
                }
            }else{
                echo 'No se encontraron registros con la búsqueda realizada';
            }
            echo "</ul>";

        }else if (isset($_REQUEST["id"])){
            $id = $_REQUEST["id"];

            $sql = "select * from juanf_directorio where idDirectorio =".$id;

            $rs = ejecutar($sql);

            $datosRegistro = mysqli_fetch_array($rs);

        } else {
            echo '<div id="r1">Seleccione una letra o realize una búsqueda para desplegar los registros del directorio</div>';
        }
        ?>  

    </div>

</body>
</html>