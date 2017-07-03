<!DOCTYPE html>
<html lang="en">
<?php
include ('../plantilla/plantilla.php');
$Titulo_de_libro	=(isset($_REQUEST['titulo'])?$_REQUEST['titulo']:null);
$idLibro	=(isset($_REQUEST['idLibro'])?$_REQUEST['idLibro']:null);
$interfaz			= new plantilla();
$interfaz->header();
$interfaz->barraNavegacion();
?>
<body>
<div class="container"   >
<div class="row">
    <div class="col-md-12">
 <h3 class="text-center text-muted pull-left">
            <strong>EJEMPLARES <?=$Titulo_de_libro?></strong>
        </h3>
    <table class="tbl">
        <tr>
        <td>
            <input type="hidden" id="tabla" name="tabla" value="ejemplar">
			<input type="hidden" id="id" value="<?=$idLibro?>">
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
