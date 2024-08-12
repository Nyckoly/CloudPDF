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
    <title>Cadastro</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
   
    <form method="post">
        Nome: <input type="text" name="nome" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Senha: <input type="password" name="senha" required><br><br>
        <input type="submit" value=" Cadastrar">

    </form>
  
    
</body>
</html>