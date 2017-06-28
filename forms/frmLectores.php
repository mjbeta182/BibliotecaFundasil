<!DOCTYPE>
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
  <h3 class="text-center text-muted">
    <strong>LECTORES</strong>
  </h3>
  <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 form-wrap">
      <!--LECTOR 1-->
      <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a class="fa fa-male" href="#lector1" aria-controls="lector1"  data-toggle="tab"></a></li>
        <li><a href="#lector2" aria-controls="lector2"  data-toggle="tab">Menor de edad</a></li>
      </ul>
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="lector1">
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
            <button type="submit" class="btn btn-warning" name="btnGuardar">Guardar</button>
          </form>
        </div>
        <!--LECTOR 2-->
        <div role="tabpanel" class="tab-pane" id="lector2">
          <form role="form" action="#" method="GET">
           <br>
            <div class="input-group">
              <span class="input-group-addon"></span>
              <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Nombre Completo" >
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon"></span>
              <input type="text" class="form-control" id="txtResponsable" name="txtResponsable" placeholder="Nombre de  responsable" >
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon"></span>
              <input type="text" class="form-control" id="txtFechaNac" name="txtFechaNac"  placeholder="Fecha de nacimiento">
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
            <button type="submit" class="btn btn-warning" name="btnGuardar">Guardar</button>
          </form>
        </div>
      </div>
    </div>
</div><!--Fin row3-->
</div><!--Fin Container-->
<!--**************************************************************************************************-->
<?php  
$interfaz->footer();
?>
</body>
</html>














