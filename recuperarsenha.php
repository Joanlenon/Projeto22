<?php
session_start();

include("conectadb.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];

    // Query the database to check if the user exists
    $sql = "SELECT COUNT(usu_id) FROM usuarios WHERE usu_nome = '$nome'";
    $retorno = mysqli_query($link, $sql);
    $tbl = mysqli_fetch_array($retorno);
    $cont = $tbl[0];

    if ($cont == 1) {
        // Generate a unique token for password reset
        $token = generateRandomToken();

        // Store the token and its associated user in the database (you need to create the necessary table)
        $sql = "INSERT INTO password_reset (token, user_id) VALUES ('$token', '$nome')";
        mysqli_query($link, $sql);

        // Send the password reset link to the user's email (you need to implement this part)
        sendPasswordResetEmail($nome, $token);
        
        // Display a success message
        echo "<script>alert('Um link para redefinir sua senha foi enviado para o seu email.');</script>";
    } else {
        // Display an error message
        echo "<script>alert('Usuário não encontrado.');</script>";
    }
}

function generateRandomToken($length = 32) {
    // Generate a random string of characters for the token
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $token = '';
    for ($i = 0; $i < $length; $i++) {
        $token .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $token;
}


function sendPasswordResetEmail($username, $token) {
    // Implement your email sending logic here
    // You can use PHP's mail function or a third-party library like PHPMailer
    // to send an email to the user with the password reset link
    // Example using PHP's mail function:
    $to = 'user@example.com';
    $subject = 'Reset Your Password';
    $message = "Hello $username,\n\nClick the following link to reset your password:\n\n";
    $message .= "http://www.example.com/reset_password.php?token=$token";
    $headers = 'From: your_email@example.com' . "\r\n" .
        'Reply-To: your_email@example.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estiloadm.css">
    <title>Recuperar Senha</title>
</head>
<body>
    <form action="recuperar_senha.php" method="post">
        <h1>RECUPERAR SENHA</h1>
        <input type="text" name="nome" placeholder="Nome de Usuário" required>
        <input type="submit" name="submit" value="Recuperar Senha">
    </form>
</body>
</html>
