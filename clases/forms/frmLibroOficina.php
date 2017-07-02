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
        <strong>LIBRO DE OFICINA</strong>
    </h3>
    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 form-wrap">
        <form  action="#" method="GET">
            <div class="input-group">
                <span class="input-group-addon"></span>
                <input type="text" class="form-control" id="hCodigo" name="hCodigo" placeholder="Codigo" readonly="" >
                <input type="text" class="form-control" id="" name=""  placeholder="Titulo" >
            </div>
            <br>
            <div class="input-group" id="combobox">
                 <select class="form-control " >
                     <option>..Categoría..</option>
                 </select>
            </div>
            <br>
             <div class="input-group" id="combobox">
                 <select class="form-control ">
                     <option>..Oficina..</option>
                 </select>
            </div>
            <br>
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
