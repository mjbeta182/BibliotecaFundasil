<?php

class plantilla 
{
	
	function __construct()
	{
		# code...
	}

	function header()
	{
		print '
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="description" content="">
			<meta name="author" content="">
            <title>Biblioteca FUNDASIL</title>

            <!-- Archivos de Estilo css -->
            <link rel="stylesheet" href="../css/estilo.css">
			<link href="../css/shop-homepage.css" rel="stylesheet">
             <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

            <!-- Librerias js -->
            <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <script src="../js/bootstrap.js"></script>
            <script src="../js/confirmacion.js"></script>
            <script type="text/javascript" src="../js/funciones.js"></script>
             <script type="text/javascript"  src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript"  src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>



            
            
              		<!-- Llamado y opciones de librerías -->
                     <script src="../js/script.js"></script>

                     <!-- Librería datepicker -->
                     <script src="../libs/bootstrap-datepicker/js/bootstrap-datepicker.js" charset="UTF-8"></script>

                     <!-- Formato español para datepicker -->
                     <script src="../libs/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js"></script>

                     <!-- Librería confirmation -->
                     <script src="../libs/bootstrap-confirmation/bootstrap-confirmation.js"></script>

                     <!-- Tema para datepicker -->
                     <link rel="stylesheet" href="../libs/bootstrap-datepicker/css/bootstrap-datepicker.css">
              
    
   		 </head>';
	}

	function barraNavegacion()
	{
		print'
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    		<div class="container">
    			<div class="navbar-header">
    				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
    					<span class="sr-only">Toggle navigation</span>
    					<span class="icon-bar"></span>
    					<span class="icon-bar"></span>
    					<span class="icon-bar"></span>
    				</button>
    				<a class="navbar-brand" href="#">Inicio  <span class="fa fa-home"></a>
    		</div>
    		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li>
                        <a href="#">Prestamos  <span class="fa fa-list-alt"></span></a>
                    </li>
                    <li>
						<a href="#">Libros  <span class="fa fa-book"></span></a>
					</li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle " data-toggle="dropdown">Usuarios  <span class="fa fa-group"></span>
                        <strong class="caret "></strong></a>
                        <ul class="dropdown-menu" style="background:#1C1C1C;">
                            <li>
                                <a id="char" href="#">Empleados</a>
                            </li>
                            <li>
                                <a id="char" href="#">Lectores</a>
                            </li>
                        </ul>
					<li class="dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown">Varios  <span class="   fa fa-th-list"></span><strong class="caret"></strong></a>
                        <ul class="dropdown-menu" style="background:#1C1C1C;">
                            <li >
                                <a id="char" href="#" >Autores</a>
                            </li>
                            <li>
                                <a id="char" href="#">Categorías</a>
                            </li>
                            <li>
                                <a id="char" href="#">Librera</a>
                            </li>
                            <li>
                                <a id="char" href="#">Estante</a>
                            </li>
                            <li>
                                <a id="char" href="#">Biblioteca</a>
                            </li>
                            <li>
                                <a id="char" href="#">Oficina</a>
                            </li>
                        </ul>
                    </li>
					<li>
						<a href="#">Ayuda <span class="fa fa-question-circle"></a>
					</li>
				</ul>
    		</div><!-- /.navbar-collapse -->
    		</div><!-- /.container -->
    	</nav>';
	}

	function footer()
	{
		print '
		<div class="container">
		    <hr>
			<footer>
				<div class="row">
					<div class="col-lg-12">
						<a href="http://www.fundasil.org"> <p>&copy; FUNDASIL 2017</p></a>
					</div>
				</div>
			</footer>
		</div><!-- /.container -->';
	}
}


?>