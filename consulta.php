<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>consulta de voto</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body class="center-all">
            <?php
                error_reporting(0);


                 $conexion=mysqli_connect("localhost","root","","votos");
                 $parreg = mysqli_query($conexion,
                 "SELECT
                 pr.partidosId as partId,
                 nombrepartidos as nombres,
                 SUM(votosCount) as votos
                 FROM
                 parreg As pr
                 JOIN partidos AS p
                        ON p.partidosId = pr.partidosId
                 GROUP BY
                 pr.partidosId
                 ORDER BY
                 votos
                 DESC
                 
                 " );

                           ?>
    <section>
        <h2>Consulta de votos</h2>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th style="text-align:left">Partido</th>
                <th style="text-align:center">Votos</th>
                </tr>
            </thead>
            <tbody>

                <?php
            
                 while ($indexPR=mysqli_fetch_array($parreg)) {

                     echo"
                     <tr>
                    
                        <td style=\"text-align:left\">
                            <a class=\"\" href=\"detalles.php?partidoNombre=".$indexPR['nombres']."
                            &partidoId=".$indexPR[partId]."\" target=\"iframeTarger\">
                                ".$indexPR['nombres']."
                            </a>
                        </td>

                        <td style=\"text-align:center\">".$indexPR['votos']."</td>
            
                    </tr> 
                    
                    ";
                   
                }

                ?>
                <tr>
                    <td style="text-align:left">total</td>
                    <td style="text-align:center">
                    <?php
                    $parreg2=mysqli_query($conexion,
                        "SELECT
                        sum(votosCount) as votosTotales
                        FROM
                        parreg"
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