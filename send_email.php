<?php
require 'vendor/autoload.php'; // Inclua o autoload do Composer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar dados do formulário
    $nome = htmlspecialchars(trim($_POST['nome']));
    $email = htmlspecialchars(trim($_POST['email']));
    $mensagem = htmlspecialchars(trim($_POST['mensagem']));

      // Configurações do PHPMailer
      $mail = new PHPMailer(true);
      $mail->CharSet = 'UTF-8'; // Configura o charset para UTF-8

    try {
        // Configurações do servidor de e-mail
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Servidor SMTP do Gmail
        $mail->SMTPAuth = true;
        $mail->Username = 'marcosmordame@gmail.com'; // Seu e-mail do Gmail
        $mail->Password = 'abnw wdlk tntn iujw'; // Senha do aplicativo ou senha do e-mail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Para TLS
        $mail->Port = 587; // Porta para TLS

        // Destinatário
        $mail->setFrom('marcosmordame@gmail.com', 'Seu Nome'); // Seu e-mail e nome
        $mail->addAddress('marcosmordame@gmail.com'); // E-mail para onde enviar

        // Conteúdo do e-mail
        $mail->isHTML(true);
        $mail->Subject = "Novo Contato do Formulario: $nome";
        $mail->Body    = "<strong>Nome:</strong> $nome<br><strong>E-mail:</strong> $email<br><strong>Mensagem:</strong><br>$mensagem";
        $mail->AltBody = "Nome: $nome\nE-mail: $email\nMensagem:\n$mensagem";

   
        $mail->send();
        // Redirecionar de volta para a página do formulário com uma mensagem de sucesso
        header('Location: index.html?status=success');
        exit();
    } catch (Exception $e) {
        // Redirecionar de volta para a página do formulário com uma mensagem de erro
        header('Location: index.html?status=error');
        exit();
    }
} else {
    echo "<p>Método de solicitação inválido.</p>";
}
?>
?>
