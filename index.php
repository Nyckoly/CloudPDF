
<?php
error_reporting(0);
ini_set('display_errors', 0);
// Em qualquer página protegida
session_start();// Inicia uma nova sessão ou retoma a sessão existente





if ($_SESSION['loggedin'] == true) {
    echo"<h1>Bem-vindo, ". htmlspecialchars($_SESSION['usuario_nome'])."!</h1>";
    echo"<p>Você está logado.</p>";
    echo"<a href='logout.php'>Sair</a>";
}

?>
 
 <!DOCTYPE html>
 <html lang="pt-br">
     <head>
        <meta charset="UTF-8">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
         <title>CloudPDF</title>
        </head>
        <body>
            <header>
                <nav>
                    <h1>CloudPDF </h1>
                </nav>
            </header>
            <form action="" method="POST">
                <input name="pdf" type="file">
                <button type="submit">Enviar</button>
            </form>

            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                    
                    $pdf = $_POST['pdf'];
                    
                    if (!$_SESSION['loggedin'] == true) {

                        header('Location: login.php'); 
                        exit();
                    }
                }
            ?>
        </body>
</html>
 