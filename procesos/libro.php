<?php
include('../clases/conexion.php');


$hCodigo	= (isset($_REQUEST['hCodigo'])?$_REQUEST['hCodigo']:null);
$txtCategoria	= (isset($_REQUEST['txtCategoria'])?$_REQUEST['txtCategoria']:null);

function mostrarDatos($bdConexion)
{
	//Cantidad de registros que se desea mostrar
	$cantidad_por_pagina=25;

	//Numero de registros encontrados 
	$sqlMostrar ='SELECT * FROM libro';
	$rsMostrar = $bdConexion->ejecutarSql($sqlMostrar);
	$cantidad_de_registros = mysqli_num_rows($rsMostrar);

	//Numero total de paginas
	$num = ceil($cantidad_de_registros / $cantidad_por_pagina);

	//Numero de pagina en la que se encuentra el usuario
	if (!isset($_GET['pag'])) { $pag = 1;} else {$pag = $_GET['pag'];}
	if ($pag == ""){$pag = 1;}
	//Determina el primer indice en el limit sql 
	$primer_indice = ($pag-1)*$cantidad_por_pagina;


	//Devuelve los resultados de la base de datos que se mostraran en la pagina
	$sqlMostrar='SELECT l.idLibro,
                                l.titulo,
                                c.nombreCategoria
				FROM libro l
				INNER JOIN categoria c
				ON l.idCategoria = c.idCategoria 
				ORDER BY l.idLibro 
				LIMIT ' . $primer_indice . ',' .  $cantidad_por_pagina;

	$rsMostrar = $bdConexion->ejecutarSql($sqlMostrar);


	print '	<thead>
	 		<tr>
	            <th>Código</th>
	            <th>Titulo</th>
	            <th>categoría</th>
	   			<th id="cla">Acciones</th> 
	 		</tr>
	       	</thead>';
	while($fila = mysqli_fetch_array($rsMostrar)) {
	  print "<tbody>
            	<tr>
				<td>".$fila['idLibro']."</td>
				<td>".$fila['titulo']."</td>
				<td>".$fila['nombreCategoria']."</td>
				<td style='text-align:center;'>
					<a href='frmCategoria.php?accion=editar'>
					<button type='submit' class='btn btn-warning boton'>Editar</button>
					</a>
					<a href='tblLibros.php?accion=eliminar' 
					onclick='return eliminarItem();'>
					<button type='submit' class='btn btn-danger boton'>Eliminar</button>
					</a>
				</td>
			   </tr> "; 
	}//Fin While

	//Despliega los links para paginacion
	print'<tr><td colspan="4" id="pagination"><ul class="pagination">';

		if($pag>1 && $pag>0)
		{
                        if($pag>5)
                        {print'<li><a id="pag" class="fa fa-angle-double-left" href="tblLibros.php?pag=' . ($pag-5).'"></a></li>';}	
			print '<li><a id="pag" class=" 	fa fa-angle-left" href="tblLibros.php?pag=' . ($pag-1) . '"></a></li>';
		}

	       	print '<li><a id="link" href="tblLibros.php?pag=' . $pag . '">' . $pag .' / '. $num .'</a></li>';	

		if($pag<$num)
		{
			print'<li><a id="pag" class=" 	fa fa-angle-right" href="tblLibros.php?pag=' . ($pag+1).'"></a></li>';
                      if($pag=$num-5){
			print'<li><a id="pag" class="fa fa-angle-double-right" href="tblLibros.php?pag=' . ($pag+5).'"></a></li>';}
		}
	
	print '</ul></td></tr></tbody>';
	}//Fin del metodo mostrar

        
?>
            