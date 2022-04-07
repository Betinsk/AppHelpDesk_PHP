<?php 
	
	session_start();
/*
	echo '<pre>';
	print_r($_SESSION);
	echo '<pre>';

	//remover indices do array de sessão
	//unset()

	unset($_SESSION['x']); //inteligencia para remover o indice apenas se ele existir.

	echo '<pre>';
	print_r($_SESSION);
	echo '<pre>';


	//destruir a variável de sessão
	//session_destroy()

	session_destroy(); // será destruida
	//forçar um direcionamento

	echo '<pre>';
	print_r($_SESSION);
	echo '<pre>';
*/

	session_destroy();
	header('Location: index.php');


 ?>