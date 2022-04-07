<?php 

	echo '<pre>';
	print_r($_POST);
	echo '<pre>';

	//Aqui, estamos trabalhando na montagem do texto
	$titulo = str_replace('#', '-', $_POST['titulo']);
	$categoria = str_replace('#', '-', $_POST['categoria']);
	$categoria = str_replace('#', '-', $_POST['descricao']);

	$texto = $titulo . '#' . $categoria . '#' . $categoria . PHP_EOL;

	//Abrindo o arquivo
	$arquivo = fopen('arquivo.txt', 'a');

	//implode('#', $_POST);

	//Escrevendo o texto
	fwrite($arquivo, $texto);

	//Fechando o arquivo
	fclose($arquivo);

	//echo $texto;

	header('Location: abrir_chamado.php');


 ?>