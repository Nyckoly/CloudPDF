<?php
session_start(); //inicia uma sessão
include 'conexao.php'; //inclui o arquivo de conexão com o banco
if($_SERVER['REQUEST_METHOD']=='POST'){//verifica se o método de requisição é POST
    $email = $_POST['email'];//obtém o valor do campo email
    $senha = $_POST['senha'];//obtém o valor do campo senha
    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    //variavel $sql recebe  a consulta d atabela usuarios
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){ //verifica se a consulta teve resultado
        $user = mysqli_fetch_assoc($result);//obtem os dados do usuario encontrado na consulta
        if(password_verify($senha,$user['senha'])){//verifica se a senha que foi digitada é a mesma que está no banco
            $_SESSION ['usuario_id'] = $user['id'];//armazena as informações(id e nome na sessão)
            $_SESSION ['usuario_nome'] = $user['nome'];
            $_SESSION ['loggedin'] = true;
            header("Location: index.php");//redireciona para a página.
            exit;//encerra o script
        }else{
            echo "senha incorreta";
        }}  else{
            echo"Usuário não encontrado";
        }

    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <img src="imagens/login.jpg" alt=" Imagem de login">
        <form method="post">
            Email: <input type="email" name="email" required><br><br>
            Senha: <input type="password" name ="senha" required><br><br>
            <input type="submit" value="Entrar">
        </form>
        <a href="cadastro.php" class="cadastro-link">Fazer cadastro</a>
    </div>
    
</body>
</html>