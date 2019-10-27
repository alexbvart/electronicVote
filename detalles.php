<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body  class="center-all">

                <?php
                
            $partidoNombre= $_GET['partidoNombre'];
            $partidoIdenti= $_GET['partidoId'];
                
                   $conexion=mysqli_connect("localhost","root","","votos");
                   $parreg = mysqli_query($conexion,
                   "SELECT
                   nombreRegion as nombres,
                   SUM(if( pr.partidosId=$partidoIdenti,pr.votosCount,0)) as votos
                   FROM
                   parreg As pr
                   JOIN regiones AS r
                          ON r.regionesId = pr.regionesId
                   GROUP BY
                   pr.regionesId
                   ORDER BY
                   votos
                   DESC
                   
                   " );
             
                ?>
<section>
            <h2>Detalle de votos</h2>

               <?php 
               echo"<div class=\"center-all\">Partido:  ".$partidoNombre."</div>";
                ?>
             
            <table class="table table-striped table-bordered" >
                <thead>
                    <tr>
                        <th style="text-align:left">Region</th>
                        <th style="text-align:center">Votos</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                    
                while ($indexPR=mysqli_fetch_array($parreg)) {
                    echo"<tr>
                        <td style=\"text-align:left\">".$indexPR['nombres']."</td>
                        <td style=\"text-align:center\">".$indexPR['votos']."</td>
                        </tr>";
                }               
                ?>
                    <tr>
                        <td style="text-align:left">total</td>
                        <td style="text-align:center">
                        
                        <?php
                        $parreg2=mysqli_query($conexion,
                        "SELECT
                        sum(if(pr.partidosId='".$partidoIdenti."', votosCount,0)) as votosTotales
                        FROM
                        parreg as pr
                        JOIN partidos AS p
                        ON p.partidosId = pr.partidosId
                        "
                        );
                        while ($indexPR2=mysqli_fetch_array($parreg2)) {

                            echo" ".$indexPR2['votosTotales']."";
                         };
                                        
                    ?>
                    
                        </td>
                    </tr>
                </tbody>
            </table>
    </section>

</body>
</html>