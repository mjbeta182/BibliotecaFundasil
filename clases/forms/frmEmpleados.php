<!DOCTYPE html>
<html lang="en">
<?php
include ('../plantilla/plantilla.php');
include('../procesos/empleados.php');
$interfaz = new plantilla();
$interfaz->header();
$interfaz->barraNavegacion();
?>
<!--**************************************************************************************************-->
 <body>
<div class="container">
<div class="row3">
    <h3 class="text-center text-muted" id="heading">
      <strong>EMPLEADOS</strong>
    </h3>
    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 form-wrap">
        <form role="form" action="tblEmpleados.php" method="GET">
             <br>
            <div class="input-group">
              <span class="input-group-addon"></span>
              <input type="text" class="form-control" id="hCodigo" name="hCodigo" placeholder="Codigo" readonly="" value="<?=$hCodigo?>">
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon"></span>
              <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Nombre Completo" value="<?=$txtNombre?>">
            </div>
             <br>
            <div class="input-group">
              <span class="input-group-addon"></span>
              <input type="text" class="form-control" id="txtFechaNac" name="txtFechaNac"  placeholder="Fecha de nacimiento" value="<?=$txtFechaNac?>">
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon"></span>
              <input type="text" class="form-control" id="txtDireccion" name="txtDireccion" placeholder="Dirección" value="<?=$txtDireccion?>">
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon"></span>
              <input type="text" class="form-control" id="txtTelefono" name="txtTelefono" placeholder="Teléfono" value="<?=$txtTelefono?>">
            </div>
            <br>
             <div class="input-group">
              <span class="input-group-addon"></span>
              <input type="text" class="form-control" id="txtDui" name="txtDui" placeholder="DUI" value="<?=$txtDui?>">
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="btnGuardar">Guardar</button>
            <a href="tblEmpleados.php" id="btnCancelar" class="btn btn-warning">Cancelar</a>
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
