

<?php 

session_start();

//variavel que verifica se a autenticacao foi feita...
$usuario_autenticado = false;
$usuario_id = null;

$perfis = array(1 => 'adm', 2 => 'user');


//usuarios do sistema...1
$usuario_app = array(
    array( 'id' => 1, 'email' => 'adm@test.com', 'senha' => '123', 'perfis_id' => 1),
    array( 'id' => 2, 'email' => 'user@test.com', 'senha' => '123', 'perfis_id' => 1),
    array( 'id' => 3, 'email' => 'maria@test.com', 'senha' => '123', 'perfis_id' => 2),
    array( 'id' => 4, 'email' => 'roberto@test.com', 'senha' => '123', 'perfis_id' => 2 ),

);  

    foreach ($usuario_app as $user) {

       if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
        
        $usuario_autenticado = true;
        $usuario_id = $user['id'];
        $usuario_perfil_id = $user['perfis_id'];
       }

    }

    if($usuario_autenticado){
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfis_id'] = $usuario_perfil_id;
        header('location: home.php');

    } else{
        $_SESSION['autenticado'] = 'NAO';
        header('location: index.php?error');
        
    }
?>    