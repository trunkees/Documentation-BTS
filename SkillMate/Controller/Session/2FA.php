<?php 


    $verification_code = rand(100000, 999999);

    $email = $_POST['Email'];
    $subject = "Votre code de vérification";
    $message = "Votre code de vérification est : $verification_code";
    $headers = 'From: noreply@example.com' . "\r\n" .
               'Reply-To: noreply@example.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    mail($email, $subject, $message, $headers);

    exit;

?>

