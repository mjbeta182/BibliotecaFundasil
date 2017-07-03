<!DOCTYPE html>
<html lang="en">
<?php
include ('../plantilla/plantilla.php');
include('../procesos/libro.php');
$interfaz = new plantilla();
$interfaz->header();
$interfaz->barraNavegacion();
?>
<body>
<div class="container">
<div class="row3">
    <h3 class="text-center text-muted">
        <strong>LIBROS</strong>
    </h3>
    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 form-wrap">
        <form  action="tblLibros.php" method="GET">
            <div class="input-group">
                <span class="input-group-addon"></span>
                <input type="text" class="form-control" id="txtTitulo" name="txtTitulo"  placeholder="Titulo" required="true">
            </div>
            <br>
            <div class="input-group" id="combobox">
                 <?php
                        $bdConexion->llenarSelect("slcCategoria","SELECT idCategoria,nombreCategoria FROM categoria ORDER BY nombreCategoria ",$slcCategoria);
                 ?>
            </div>
            <br>
            <br>
                <button type="submit" class="btn btn-primary" name="btnGuardar" onclick="return confirmUpdate();">Guardar</button>
            <input type="hidden" id="accion" name="accion" value="<?=$accion?>" >
        </form>
    </div>
</div><!--Fin row3-->
</div><!--Fin Container-->
<?php  $interfaz->footer();?>
</body>
</html>
