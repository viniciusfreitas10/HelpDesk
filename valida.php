<?php 
	session_start();
	
	$autenticaçao = false;
	$usuario_id = null;
	$perfis = array(1 => 'admin', 2 => 'user');
	$usuario_perfil_id = null;
	$usuarios_app = array(
		['email' => 'adm@teste.com.br', 'senha' => '123', 'id' => 1, 'perfil_id' => 1],
		['email' => 'user@teste.com.br', 'senha' => '123','id' => 2, 'perfil_id' => 1],
		['email' => 'maria@teste.com.br', 'senha' => '123','id' => 3, 'perfil_id' => 2],
		['email' => 'joao@teste.com.br', 'senha' => '123','id' => 4, 'perfil_id' => 2]
	);
	foreach($usuarios_app as $user){
		if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
			$autenticaçao = true;
			$usuario_id = $user['id'];
			$usuario_perfil_id = $user['perfil_id'];
		}
	}
	if($autenticaçao){
		echo 'usuarios autenticado';
		$_SESSION['autenticado'] = 'SIM';
		$_SESSION['id'] = $usuario_id;
		$_SESSION['perfil_id'] = $usuario_perfil_id;
		header('Location: home.php');
	}else{
		$_SESSION['autenticado'] = 'NAO';
		header('Location: index.php?login=erro');
	}

?>