<?php

Class usuarios {

    private $pdo;
    public $msgErro = "";

    public function conectar($nomedb, $host, $usuario, $senha) {



        //Criar as constantes com as credencias de acesso ao banco de dados
        define('HOST', 'localhost');
        define('USER', 'root');
        define('PASS', 'senac');
        define('DBNAME', 'xpto1234');

        //Criar a conexão com banco de dados usando o PDO        
        global $pdo;
        try {
            //$pdo = new PDO("mysql:dbname= ".$nomedb."; host=".$host,$usuario,$senha);
            //$pdo = new PDO("mysql:dbname = db_sistema; host=".$host,$usuario,$senha);
            //$pdo = new PDO("mysql:dbname = db_sistema; host=localhost;", $usuario, $senha);
            $pdo = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASS);
        } catch (PDOException $e) {
            //$msgERRO = $e->getMessage();
            echo 'Erro com o banco de dados: ' . $e->getMessage();
        } catch (Exception $e) {
            echo 'Erro generico: ' . $e->getMessage();
        }
    }

    public function cadastrar($nome, $telefone, $email, $senha) {
        global $pdo;

        //verificar cadastro
        $sqle = $pdo->prepare("SELECT id FROM usuarios WHERE email = :e");
        $sqle->bindValue(":e", $email);
        //var_dump($sql);
        $sqle->execute();
        if ($sqle->rowCount() > 0) {
            return false;
        } else {
            $sql = $pdo->prepare("INSERT INTO usuarios (nome, telefone, email, senha) VALUES (:n, :t, :e, :s)");
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":t", $telefone);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":s", md5($senha));
            $sql->execute();
            return true;
        }
    }

    public function logar($email, $senha) {
        global $pdo;
        //Verificar as credenciais
        $sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :e AND senha = :s");
        $sql->bindValue(":e", $email);
        $sql->bindValue(":s", md5($senha));
        echo 'Aqui!';
        $sql->execute();
        if ($sql->rowCount() > 0) {
            //Se SIM, acessar o sistema (sessão)
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id'] = $dado['id'];
            return true; //logado com sucesso
        } else {
            return false; //não foi possível logar
        }
    }

        public function limpar() {
        //$("input").val("");
        //$("textarea") . val("");
        }    
}
