<!DOCTYPE html>
<html lang="en">
<?php
include ('../plantilla/plantilla.php');
include('../procesos/autores.php');
$interfaz = new plantilla();
$interfaz->header();
$interfaz->barraNavegacion();
?>
<!--***********************************************************************************************-->
<body>
<div class="container">
<div class="row">
    <div class="col-md-12">
     <h3 class="text-center text-muted pull-left">
        <strong>AUTORES</strong>
     </h3>
    <table class="tbl">
        <tr>
        <td>
            <a href="frmAutores.php">
                <button type="submit" class="btn btn-primary">Agregar Autor</button>
            </a>     
        </td>
        <td class="pull-right"> 
            <select class="form-control ">
             <option>Buscar por...</option>
            </select>
        </td>
         <td class="pull-right" id="busqueda">
            <input  type="text" class="form-control" placeholder="Buscar">
        </td>
        </tr>
    </table><br>
    <table class="table table-condensed table-hover" >
         <?php mostrarDatos($bdConexion); ?>
    </table>
    </div><!--Fin col-md-12-->
</div><!--Fin row-->   
</div><!--Fin Container-->
<!--**************************************************************************************************-->
<?php  
$interfaz->footer();
$bdConexion->desconectar();
?>
</body>
</html>
