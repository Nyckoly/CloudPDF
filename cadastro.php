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
   
    <form method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br><br>
        <label for="email">E-mail:</label>
        <input type="email" name="email" required><br><br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br><br>
        <input type="submit" value=" Cadastrar">
    </form>
  
    
</body>
</html>