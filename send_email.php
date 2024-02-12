<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $to = 'ziel@email.com'; // Setzen Sie hier die E-Mail-Adresse, an die die Nachricht gesendet werden soll.
    $subject = 'Nachricht von ' . $name;
    $body = "Name: $name\nEmail: $email\nTelefonnummer: $phone\n\nNachricht:\n$message";

    // SendGrid-API-Schlüssel
    $apiKey = "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";
    
    // Senden der E-Mail mit SendGrid
    $url = 'https://api.sendgrid.com/v3/mail/send';
    $data = array(
        'personalizations' => array(
            array(
                'to' => array(
                    array(
                        'email' => $to
                    )
                ),
                'subject' => $subject
            )
        ),
        'from' => array(
            'email' => $email
        ),
        'content' => array(
            array(
                'type' => 'text/plain',
                'value' => $body
            )
        )
    );
    $headers = array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $apiKey
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);

    if ($response) {
        echo '
