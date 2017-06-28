<?php
$i = (isset($_REQUEST['i']));



		for ($i=1;$i<=$num/10;$i++) {
		 print '<li><a id="link" href="tblLibros.php?pag=' . $i . '">' . $i . '</a></li>';	
		}


		

?>