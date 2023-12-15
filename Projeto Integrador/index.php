<?php
require_once 'Class/usuarios.php';
$u = new usuarios();

?>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Projeto Zetta</title>
        <link rel="stylesheet" href="CSS/estilo.css"/>
    </head>
    <body>
        <div id="corpo-form">
            <h1>Entrar</h1>
            <form method="POST">

                <input type="email" placeholder="Usuário" name="email">
                <input type="password" placeholder="Senha" name="senha"><!-- comment -->
                <input type="submit" value="ACESSAR"><!-- comment -->
                <a href="cadastrar.php">Ainda não é inscrito? <strong>Cadastre-se!</strong></a>
            </form>

            <?php
            if (null !== (filter_input(INPUT_POST, 'email'))) {    //filter_input(INPUT_POST, 'nome')          $_POST['nome'])
                $email = addslashes(filter_input(INPUT_POST, 'email'));
                $senha = addslashes(filter_input(INPUT_POST, 'senha'));
                $confirmarsenha = addslashes(filter_input(INPUT_POST, 'confsenha'));
                //verificar se tem campo vazio

                if (!empty($email) && !empty($senha)) {
                    $u->conectar("db_sistema", "localhost", "root", "");
                    if ($u->msgErro === "") {
                        if ($u->logar($email, $senha)) {
                            header("location: Principal.php");
                        } else {
                            echo 'Credencias de acesso inválidas!';
                        }
                    } else {
                        echo 'Erro:' . $umsgErro;
                    }
                } else {
                    ?>
                    <div class="msg-erro">
                        Estou aqui!
                        Preencha todos os campos!
                    </div>
                    <?php
                }
            }
            ?>
    </body>
</html>

