<?php
session_start();
/*CONEXÃO COM BANCO DE DADOS*/
require('../database/conexao.php');

/*FUNÇÃO DE VALIDAÇÃO*/
function validaCampos(){

    $erros = [];

    if(!isset($_POST['nome']) || $_POST['nome'] == "" ){
        $erros[] = "O campo nome é de preenchimento obrigatório";
    }
    if(!isset($_POST['sobrenome'])|| $_POST['sobrenome'] == "" ){
        $erros[] = "O campo sobrenome é de preenchimento obrigatório";
    }
    if(!isset($_POST['email'])|| $_POST['email'] == "" ){
        $erros[] = "O campo email é de preenchimento obrigatório";
    }
    if(!isset($_POST['celular'])|| $_POST['celular'] == "" ){
        $erros[] = "O campo celular é de preenchimento obrigatório";
    }
    return $erros;

}

switch ($_POST['acao']) {

    case 'inserir':

        //CHAMADA DA FUNÇÃO DE VALIDAÇÃO DE ERROS:
        $erros = validaCampos();

        //VERIFICAR SE EXISTEM ERROS:
        if(count($erros) > 0){
            $_SESSION["erros"] = $erros;
            header('location: index.php');
            exit();
        }

        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];
        $celular = $_POST['celular'];

        /*MONTGEM DA INSTRUÇÃO SQL DE INSERÇÃO DE DADOS:*/
        $sql = "INSERT INTO tbl_pessoa (nome, sobrenome, email, celular)
        VALUES ('$nome', '$sobrenome', '$email', '$celular')";

        $resultado = mysqli_query($conexao, $sql);

        header('location: ../index.php');

        break;

        case 'deletar':

            $categoriaID = $_POST['categoriaId'];

            $sql = "DELETE FROM tbl_categoria WHERE id = $categoriaID";

            $resultado = mysqli_query($conexao, $sql);

            header('location: index.php');

            break;

        case 'editar':

            $id = $_POST["id"];
            $descricao = $_POST["descricao"];

            $sql = "UPDATE tbl_categoria SET descricao = '$descricao' WHERE id = $id";
            // echo $sql; exit;
            
            $resultado = mysqli_query($conexao, $sql);

            header('location: index.php');

            break;
    
    default:
        # code...
        break;
}



?>