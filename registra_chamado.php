<?php 
	
	session_start();


	$titulo = str_replace('#','-',$_POST['titulo']);
	$categoria = str_replace('#','-',$_POST['categoria']);
	$descriçao = str_replace('#','-',$_POST['descriçao']);
	
	$arquivo = fopen('../../app_helpdesk/chamado.txt', 'a');
	$texto = $_SESSION['id']. ' # ' . $titulo .' # '. $categoria .' # '. $descriçao . PHP_EOL;
	fwrite($arquivo, $texto);
	fclose($arquivo);
	header('Location: home.php')

 ?>