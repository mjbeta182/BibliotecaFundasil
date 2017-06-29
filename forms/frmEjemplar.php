<!DOCTYPE html>
<html lang="en">
<?php
include ('../plantilla/plantilla.php');
$idLibro=(isset($_REQUEST['idLibro'])?$_REQUEST['idLibro']:0);
$Titulo_de_libro    =(isset($_REQUEST['titulo'])?$_REQUEST['titulo']:null);
$interfaz = new plantilla();
$interfaz->header();
$interfaz->barraNavegacion();
?>
<!--**************************************************************************************************-->
 <body>
<div class="container">
    <div class="row3">
        <div class="col-md-12">
            <h3 class="text-center text-muted">
                <strong>EJEMPLAR</strong>
                <p id="tituloLibro"><?=$Titulo_de_libro?></p>
            </h3>  
        </div>
    </div>
<div class="row3">
    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 form-wrap">
        <form  action="tblLibroEjemplar.php" method="GET">
            <div class="input-group">
                <span class="input-group-addon"></span>
                 <input type="text" value="<?=$idLibro?>" >
                <input type="text" class="form-control" id="hCodigo" name="hCodigo" placeholder="Codigo" required="true" >
            </div>
            <br>
            <div class="input-group" id="combobox">
                 <select class="form-control " >
                     <option>..Biblioteca..</option>
                 </select>
            </div>
            <br>
            <div class="input-group" id="combobox">
                 <select class="form-control " >
                     <option>..Librera..</option>
                 </select>
            </div>
            <br>
            <div class="input-group" id="combobox">
                 <select class="form-control " >
                     <option>..Estante..</option>
                 </select>
            </div>
            <br>
            <br>
                <?php print '<a href="tblLibroEjemplar.php?idLibro='.$idLibro.'">
                <button type="submit" class="btn btn-primary" name="btnGuardar" onclick="return confirmUpdate();">Guardar</button>
                </a>';
                ?>
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
