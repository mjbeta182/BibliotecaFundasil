<!DOCTYPE html>
<html lang="en">
<?php
include ('../plantilla/plantilla.php');
include('../procesos/libro.php');
$interfaz = new plantilla();
$interfaz->header();
$interfaz->barraNavegacion();
?>
<!--**************************************************************************************************-->
 <body>
<div class="container">
    <div class="row3">
        <div class="col-md-12">
            <h3 class="text-center text-muted" id="heading">
                <strong>LIBROS</strong>
            </h3>
        </div>
    </div>
<div class="row3">
    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 form-wrap">
        <form  action="tblLibros.php" method="GET">
            <div class="input-group">
                <span class="input-group-addon"></span>
                <input type="text" class="form-control" id="hCodigo" name="hCodigo" placeholder="Codigo" readonly="" value="<?=$hCodigo?>">
                <input type="text" class="form-control" id="txtTitulo" name="txtTitulo"  placeholder="Titulo" required="true" value="<?=$txtTitulo?>">
            </div>
            <br>
            <div class="input-group" id="combobox">
                 <select class="form-control " >
                     <option>..Categoría..</option>
                 </select>
            </div>
            <br>
            <br>
                <button type="submit" class="btn btn-primary" name="btnGuardar" onclick="return confirmUpdate();">Guardar</button>
            <input type="hidden" id="accion" name="accion" value="<?=$accion?>" >
        </form>
    </div>
</div><!--Fin row3-->
</div><!--Fin Container-->
<!--**************************************************************************************************-->
<?php  
$interfaz->footer();
?>
</body>
</html>
