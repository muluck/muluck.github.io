<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $to = 'linus.krenkel@hotmail.com'; // Setzen Sie hier die E-Mail-Adresse, an die die Nachricht gesendet werden soll.
    $subject = 'Nachricht von ' . $name;
    $body = "Name: $name\nEmail: $email\nTelefonnummer: $phone\n\nNachricht:\n$message";

    // Senden der E-Mail
    if (mail($to, $subject, $body)) {
        echo '<script>alert("Ihre Nachricht wurde erfolgreich gesendet."); window.location = "contact.html";</script>';
    } else {
        echo '<script>alert("Es gab ein Problem beim Senden Ihrer Nachricht. Bitte versuchen Sie es später erneut."); window.location = "contact.html";</script>';
    }
}
?>
