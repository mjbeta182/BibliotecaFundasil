<!DOCTYPE html>
<html lang="en">
<?php
include ('../plantilla/plantilla.php');
$interfaz = new plantilla();
$interfaz->header();
$interfaz->barraNavegacion();
?>
<!--***********************************************************************************************-->
<body>
<div class="container">
<div class="row" style="margin:auto;">
    <div class="col-md-12">
     <h3 class="text-center text-muted pull-left">
        <strong>AUTORES</strong>
     </h3>
    <table class="tbl">
        <tr>
        <td>
            <button type="submit" class="btn btn-primary">Agregar Autor</button>
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
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre </th>
                <th>Acciones</th> 
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>TB - Monthly Betancourt Aguilar</td>
                <td>
                    <button type="submit" class="btn btn-warning" name="btnGuardar">Editar</button>
                    <button type="submit" class="btn btn-danger" name="btnGuardar">Eliminar</button>
                </td>
            </tr>
        </tbody>
    </table>
    </div><!--Fin col-md-12-->
</div><!--Fin row-->   
<div class="row" id="pagination">
    <div class="col-md-12">
        <ul class="pagination"  >
            <li><a id="pag" href="#" class="fa fa-chevron-left" ></a></li>
            <li><a id="pag" href="#" >1</a></li>
            <li><a id="pag" href="#">2</a></li>
            <li><a id="pag" href="#">3</a></li>
            <li><a id="pag" href="#">4</a></li>
            <li><a id="pag" href="#">5</a></li>
            <li><a id="pag" href="#" class="fa fa-chevron-right"></a></li>
        </ul>
    </div>
</div>
</div><!--Fin Container-->
<!--**************************************************************************************************-->
<?php  
$interfaz->footer();
?>
</body>
</html>
