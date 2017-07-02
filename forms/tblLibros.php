<!DOCTYPE html>
<html lang="en">
<?php
include ('../plantilla/plantilla.php');
$interfaz = new plantilla();
$interfaz->header();
$interfaz->barraNavegacion();
?>
<body  >
<div class="container"   >
<div class="row">
    <div class="col-md-12">
        <h3 class="text-center text-muted pull-left">
            <strong>LIBROS</strong>
        </h3>
        <table class="tbl">
            <tr>
            <td>
                <form action="frmLibro.php" method="GET" >
                    <buttontype="submit" class="btn btn-primary pull-left">Agregar Libro</button>
                    <input type="hidden" id="tabla" name="tabla" value="libro">
                </form>
            </td>
        </table><br>
          <article id="contenido"></article>
    </div><!--Fin col-md-12-->
</div><!--Fin row-->   
</div><!--Fin Container-->
<?php  $interfaz->footer(); ?>
</body>
</html>
