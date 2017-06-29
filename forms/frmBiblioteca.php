<!DOCTYPE html>
<html lang="en">
<?php
include ('../plantilla/plantilla.php');
include('../procesos/biblioteca.php');
$interfaz = new plantilla();
$interfaz->header();
$interfaz->barraNavegacion();
?>
<!--**************************************************************************************************-->
 <body>
<div class="container">
<div class="row3">
    <h3 class="text-center text-muted">
        <strong>BIBLIOTECA</strong>
    </h3>
    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 form-wrap">
        <form  action="tblBiblioteca.php" method="GET">
            <div class="input-group">
                <span class="input-group-addon"></span>
                <input type="text" class="form-control" id="hCodigo" name="hCodigo" placeholder="Codigo" readonly="" value="<?=$hCodigo?>">
                <input type="text" class="form-control" id="txtNombre" name="txtNombre"  placeholder="Nombre" required="true" value="<?=$txtNombre?>">
            </div>
            <br>
            <br>
            <button type="submit" class="btn btn-warning" name="btnGuardar" onclick="return confirmUpdate();">Guardar</button>
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
