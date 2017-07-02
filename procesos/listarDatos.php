<?php 
include('../clases/conexion.php');
$tabla = (isset($_POST['tabla'])?$_POST['tabla']:'no se recibe');
print $tabla;
print 'generando jquery';

switch($tabla)
{
  case 'categoria':

    $sqlMostrar='SELECT * FROM categoria ';
    $rsMostrar = $bdConexion->ejecutarSql($sqlMostrar);

    print '<script type="text/javascript" src="../js/listar.js"></script>
    <table  class="display table table-condensed " id="lista">
          <thead>
              <tr>
                  <th>Código</th><!--Estado-->
                  <th>Categoría</th>
                  <th>Acciones</th>
              </tr>
          </thead>
          <tbody>';
          
           while($reg=  mysqli_fetch_array($rsMostrar))
           {
                       echo '<tr>';
                       echo '<td >'.mb_convert_encoding($reg['idCategoria'], "UTF-8").'</td>';
                       echo '<td>'.mb_convert_encoding($reg['nombreCategoria'], "UTF-8").'</td>';
                       echo "<td style='text-align: center;'>
                            <a href='frmCategoria.php?accion=update&hCodigo=".$reg['idCategoria']."&txtNombre=".$reg['nombreCategoria']."'>
                            <button type='submit' class='btn btn-warning boton'>Editar</button>
                            </a>
                            <a href='tblCategoria.php?accion=delete&hCodigo=".$reg['idCategoria']."&txtNombre=".$reg['nombreCategoria']."' onclick='return confirmDelete();'>
                            <button type='submit' class='btn btn-danger boton'>Eliminar</button>
                            </a>
                          </td></tr>";
             
            }
             
            
    print '</tbody></table>';
  break;

  default:
  echo 'No sirve';
  break;
}
?>