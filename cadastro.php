<?php
include 'conexao.php';
if($_SERVER['REQUEST_METHOD']=='POST'){//VERIFICA SE O METODO ENVIADO É POST
    $nome = $_POST['nome'];//obtem o nome do formulário
    $email = $_POST['email'];//obtem o email do formulário
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);//obtem a senha do formulário
    $sql = "INSERT INTO usuarios(nome, email, senha) VALUES
     ('$nome','$email','$senha')";
     if(mysqli_query($conn, $sql)){//Executa a consulta e verifica 
        //se foi bem-sucedida
        echo"Cadastro realizado com sucesso";
        
     }else{
     echo"Erro: ".$sql."<br>".mysqli_error($conn);
     }

}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="formulario">
        <h2>Cadastro</h2>
        <form method="post">
            <input type="text" name="nome" placeholder="Nome" required><br><br>
            <input type="email" name="email" placeholder="E-mail" required><br><br>
            <input type="password" name="senha" placeholder="Senha" required><br><br>
            <div class="botoes">
                <a href="login.php" class="cadastro-link">Fazer login</a>
                <input type="submit" value=" Cadastrar">
            </div>
        </form> 
    </div>
</body>
</html>