<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Beveilig de input
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    // Controleer het e-mailadres
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Ongeldig e-mailadres");
    }

    // Stel de e-mail samen met HTML
    $to = "cleancravings@joranvdlinde.nl";
    $subject = "Nieuw bericht van CleanCravings contactformulier";
    
    // HTML-body van de e-mail
    $htmlBody = "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <style>
            body { font-family: Arial, sans-serif; color: #000000; line-height: 1.6; background-color: #fff; }
            .container { max-width: 600px; margin: 0 auto; background-color: #f8fafc; }
            .header { background-color: #D6E0A3; padding: 20px; text-align: center; }
            .content { padding: 30px; }
            h1 { color: #000000; }
            .highlight { color: #D6E0A3; }
            .message { background-color: rgba(214, 224, 163, 0.1); padding: 15px; border-radius: 5px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h1>CleanCravings</h1>
            </div>
            <div class='content'>
                <h2>Nieuw bericht van <span class='highlight'>contactformulier</span></h2>
                <p><strong>Naam:</strong> $name</p>
                <p><strong>E-mail:</strong> $email</p>
                <h3>Bericht:</h3>
                <div class='message'>
                    <p>" . nl2br($message) . "</p>
                </div>
            </div>
        </div>
    </body>
    </html>
    ";

    // Plain text versie voor e-mailclients die geen HTML ondersteunen
    $plainBody = "Naam: $name\nE-mail: $email\n\nBericht:\n$message";

    // Stel headers in
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Verstuur de e-mail
    if (mail($to, $subject, $htmlBody, $headers)) {
        // Redirect naar de homepage na succesvolle verzending
        header("Location: contact.html?status=success#contact-form");
        exit();
    } else {
        header("Location: contact.html?status=error#contact-form");
        exit();
    }
} else {
    // Redirect naar de contactpagina als het formulier niet is verzonden
    header("Location: contact.html#contact-form");
    exit();
}
?>
