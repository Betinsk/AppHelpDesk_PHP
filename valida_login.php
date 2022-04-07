<?php 

	
	session_start();

	//variavel que verifica se a autenticacao foi realizada
	$usuario_autenticado = false;

	//Usuarios do sistema
	$usuarios_app = array(
		array('email' => 'adm@teste.com.br', 'senha' => '123456'),
		array('email' => 'user@teste.com.br', 'senha' => 'abdc')
	);


/*
	echo '<pre>';
	print_r($usuarios_app);
	echo '</pre>';

*/

	foreach ($usuarios_app as $user) {
		if( $user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha'] ) {
			$usuario_autenticado = true;
		}
	}

	if ($usuario_autenticado == true) {
		echo 'Usuario autenticado!';
		$_SESSION['autenticado'] = 'SIM';
				header('Location: home.php' ); // força o direcionamento para a pagina

	}

	else {
		header('Location: index.php?login=erro' ); // força o direcionamento para a pagina
		$_SESSION['autenticado'] = 'NÃO';
	}


/*

	print_r($_GET);

	echo "<br />";

		echo $_GET['email'];
	echo "<br />";
		echo $_GET['senha'];



		print_r($_POST);

		echo "<br />";

		echo $_POST['email'];
	echo "<br />";
		echo $_POST['senha'];
*/

 ?>