<?php
session_start();

require('../database/conexao.php');

if (
    isset($_POST['acao']) 
    // && 
    // isset($_POST['usuario']) && 
    // isset($_POST['senha'])
){

    // $email = $_POST['email'];
    // $senha = $_POST['senha'];
        
        
    switch ($_POST['acao']) {
        case 'login':

            echo 'chegou!!';
            exit;
            
            realizarLogin($email, $senha, $conexao);
            break;


        case 'logout':
            session_destroy();
            break;

        
        default:
            # code...
            break;
    }
}

// header("Location: ../../produtos");

function realizarLogin($email, $senha, $conexao) {
    $sql = "SELECT * FROM tbl_pessoa WHERE email = '$email'";

    $resultado = mysqli_query($conexao, $sql);

    $dadosUsuario = mysqli_fetch_array($resultado);

    if (isset($dadosUsuario['email']) && isset($dadosUsuario['senha']) && password_verify($senha, $dadosUsuario['senha'])) {
        $_SESSION['email'] = $email;
        $_SESSION['id'] = session_id();
        $_SESSION['data_hora'] = date('d/m/Y - h:i:s');
        $_SESSION["usuarioId"] = $dadosUsuario['id'];
    } else {
        session_destroy();
    }
}