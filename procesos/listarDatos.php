<?php 
include('../clases/conexion.php');
$tabla = (isset($_POST['tabla'])?$_POST['tabla']:'no se recibe');

switch($tabla)
{
  case 'categoria':

        $sqlMostrar='SELECT * FROM categoria ';
        $rsMostrar = $bdConexion->ejecutarSql($sqlMostrar);

        print'<script type="text/javascript" src="../js/listar.js"></script>
              <table  class="table table-condensed table-hover " id="lista">
              <thead>
                <tr>
                    <th>Código</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
              </thead>
              <tbody>';
        while($reg=  mysqli_fetch_array($rsMostrar))
         {
             print'<tr>
                    <td>'.$reg['idCategoria'].'</td>
                    <td>'.$reg['nombreCategoria'].'</td>';
             print'<td style="text-align: center;">
                    <a href="frmCategoria.php?accion=update&hCodigo="'.$reg['idCategoria'].'&txtNombre="'.$reg['nombreCategoria'].'">
                    <button type="submit" class="btn btn-warning boton">Editar</button>
                    </a>
                    <a href="tblCategoria.php?accion=delete&hCodigo="'.$reg['idCategoria'].'&txtNombre="'.$reg['nombreCategoria'].'" onclick="return confirmDelete();">
                    <button type="submit" class="btn btn-danger boton">Eliminar</button>
                    </a>
                  </td>
                  </tr>';
          } 
          print '</tbody></table>';
  break;
  case 'libro':

        $sqlMostrar='SELECT l.idLibro,l.titulo,c.nombreCategoria FROM libro l INNER JOIN categoria c ON l.idCategoria = c.idCategoria ORDER BY l.idLibro';
        $rsMostrar = $bdConexion->ejecutarSql($sqlMostrar);

        print'<script type="text/javascript" src="../js/listar.js"></script>
              <table  class="table table-condensed table-hover" id="lista">
              <thead>
                <tr>
                    <th>Código</th>
                    <th>Titulo</th>
                    <th>categoría</th>
                    <th id="cla">Acciones</th> 
                </tr>
              </thead>
              <tbody>';
        while($fila = mysqli_fetch_array($rsMostrar)) 
        {
          print "<tr>
                    <td>".$fila['idLibro']."</td>
                    <td>".$fila['titulo']."</td>
                    <td>".$fila['nombreCategoria']."</td>
                    <td style='text-align:center;'>
                      <a href='tblLibroEjemplar.php?accion=editar'>
                      <button type='submit' class='btn btn-default boton'>Ejemplares</button>
                      </a>
                                                    <a href='frmEjemplar.php?titulo=".$fila['titulo']."&idLibro=".$fila['idLibro']."'>
                      <button type='submit' class='btn btn-warning boton'>Agregar Ejemplar</button>
                      </a>
                                                    <!--Elimina libros y todos sus ejemplares-->
                      <a href='tblLibros.php?accion=eliminar' 
                      onclick='return eliminarItem();'>
                      <button type='submit' class='btn btn-danger boton' title='Elimina todos los ejemplares del libro seleccionado' >Eliminar</button>
                      </a> 
                    </td>
                </tr> "; 
        }//Fin While
        print '</tbody></table>';
  break;


  default:
  echo 'No sirve';
  break;
}
?>