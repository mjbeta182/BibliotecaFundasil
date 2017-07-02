<?php 
include('../clases/conexion.php');

print 'generando jquery';
$sqlMostrar='SELECT * FROM categoria ';
$rsMostrar = $bdConexion->ejecutarSql($sqlMostrar);

?>

<script type="text/javascript" src="../js/listacategorias.js"></script>
<table  class="display table table-condensed " id="lista">
        <thead>
            <tr>
                <th>Código</th><!--Estado-->
                <th>Categoría</th>
            </tr>
        </thead>
          <tbody>
            <?php
           while($reg=  mysqli_fetch_array($rsMostrar))
           {
                       echo '<tr>';
                       echo '<td >'.mb_convert_encoding($reg['idCategoria'], "UTF-8").'</td>';
                       echo '<td>'.mb_convert_encoding($reg['nombreCategoria'], "UTF-8").'</td>';
                       echo '</tr>';
             
                }
             
            ?>
        </tbody>
</table>