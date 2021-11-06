<?php
    session_start();

    // if (isset($_SESSION['usuarioId'])) {

    include('../componentes/header.php');
    require('../database/conexao.php');

    $sql = "SELECT * FROM tbl_pessoa";

    $resultado = mysqli_query($conexao, $sql);
?>

<div class="container">

    <br/>
    
    <table class="table table-bordered">

    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>E-mail</th>
            <th>Celular</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>

        <?php
            while($pessoa = mysqli_fetch_array($resultado)):
        ?>
            <tr>
                <th><?=$pessoa['cod_pessoa']?></th>
                <th><?=$pessoa['nome']?></th>
                <th><?=$pessoa['sobrenome']?></th>
                <th><?=$pessoa['email']?></th>
                <th><?=$pessoa['celular']?></th>
                <th>
                    <button class="btn btn-warning">Editar</button>

                    <form action="" method="post" style="display: inline;">
                        <input type="hidden" name="id" value="">
                        <button class="btn btn-danger">Excluir</button>
                    </form>
                    
                </th>
            </tr>
        <?php
            endwhile;
        ?>
    </tbody>

    </table>

</div>

<?php
    // } else{
    //     echo('USUÁRIO NÃO AUTENTICADO');
    // }
    include('../componentes/footer.php');
?>