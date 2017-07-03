<!DOCTYPE html>
<html lang="en">
<?php
include ('../plantilla/plantilla.php');
$interfaz= new plantilla();
$interfaz->header();
$interfaz->barraNavegacion();
?>
<body>
<div class="container"   >
<div class="row">
    <div class="col-md-12">
 <h3 class="text-center text-muted pull-left">
            <strong>PRESTAMOS</strong>
        </h3>
    <table class="tbl">
        <tr>
        <td>
            <input type="hidden" id="tabla" name="tabla" value="prestamo">
			<input type="hidden" id="id" value="0">
  		</td>
        </tr>
        </table>
		<article id="contenido"></article>
    </div><!--Fin col-md-12-->
</div><!--Fin row-->   
</div><!--Fin Container-->
<?php  $interfaz->footer(); ?>
</body>
</html>
