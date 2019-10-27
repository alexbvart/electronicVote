<!DOCTYPE html>
<html lang="en">
                   
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de dstos</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body class="center-all">
                    <?php
                     $conexion=mysqli_connect("localhost","root","","votos");
                     $partidos=mysqli_query($conexion,"Select * from partidos");
                     $regiones=mysqli_query($conexion,"Select * from regiones");
                    ?>
    <section >
        <h2>Registro de votos</h2>
        <form action="registro.php" method="POST">

            <label> Partido Politico:</label>
                <select name="partidoSelect" id="">
                
                <?php
                     while ($indexP=mysqli_fetch_array($partidos)) {
                        echo" <option value=\" ".$indexP['partidosId']." \">
                              ".$indexP['nombrepartidos']."
                              </option>  ";
                        }
                ?>
                            
                </select>
            
            <label> Ciudad:</label>

            <select name="regionSelect" id="">
            <?php
                 while ($indexR=mysqli_fetch_array($regiones)) {
                    echo" <option value=\" ".$indexR['regionesId']." \">
                          ".$indexR['nombreRegion']."
                          </option>  ";
                    }
            ?>
            
                        <!-- <option value="1">Arequipa</option>
                        <option value="2">Lima</option>
                        <option value="3">Piura</option> -->
                    </select>
            <label> Número de votos:</label>

            <input type="number" name="numeroDeVotos" id="">
            <input type="submit" value="GUARDAR" name="btnEnviar" class="btnEnviar">

     

            <?php
            if (isset($_POST['btnEnviar'])) {
                
                
                $partid= $_POST['partidoSelect'];
                $region= $_POST['regionSelect'];
                $cantid= $_POST['numeroDeVotos'];
                  
                    // echo" partido: ".$partid." <br> region: ".$region." <br> votos: ".$cantid." ";
                    echo" 
                    <div class=\"texto center-all\">".$cantid." votos enviados con exito</div>
                    ";

                    $envio= mysqli_query($conexion,"
                    INSERT INTO parReg (partidosId,regionesId,votosCount )
                             VALUES
                                ('".$partid."',
                                 '".$region."',
                                 '".$cantid."');
                    
                    ");


                }
            ?>  
            
        </form>
    </section>
</body>

</html>