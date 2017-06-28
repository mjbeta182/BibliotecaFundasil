<!DOCTYPE html>
<html lang="en">
<?php
include ('../plantilla/plantilla.php');
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
          <form role="form" action="#" method="GET">
             <br>
            <div class="input-group">
              <span class="input-group-addon"></span>
              <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Nombre Completo" >
            </div>
             <br>
            <div class="input-group">
              <span class="input-group-addon"></span>
              <input type="text" class="form-control" id="txtFechaNac" name="txtFechaNac"  placeholder="Fecha de nacimiento" >
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon"></span>
              <input type="text" class="form-control" id="txtDireccion" name="txtDireccion" placeholder="Dirección" >
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon"></span>
              <input type="email" class="form-control" id="txtTelefono" name="txtTelefono" placeholder="Teléfono" >
            </div>
            <br>
             <div class="input-group">
              <span class="input-group-addon"></span>
              <input type="text" class="form-control" id="txtDui" name="txtDui" placeholder="DUI" >
            </div>
            <br>
            <button type="submit" class="btn btn-warning" name="btnGuardar">Guardar</button>
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
