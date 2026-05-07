<?php

header('Content-Type: application/json; charset=UTF-8');



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $to = "contact@suretekinfosoft.com";


    

    $name = htmlspecialchars($_POST['name'] ?? '');

    $email = htmlspecialchars($_POST['email'] ?? '');

    $phone = htmlspecialchars($_POST['phone'] ?? '');

    $position = htmlspecialchars($_POST['position'] ?? '');

    

    $subject = "New Job Application: " . $position;

    

    $message = "

    <h3>New Job Application</h3>

    <p><strong>Name:</strong> $name</p>

    <p><strong>Email:</strong> $email</p>

    <p><strong>Phone:</strong> $phone</p>

    <p><strong>Position:</strong> $position</p>

    ";

    

    // File upload

    $resume = $_FILES['resume']['tmp_name'] ?? '';

    $resume_name = $_FILES['resume']['name'] ?? '';

    $resume_type = $_FILES['resume']['type'] ?? '';

    

    $boundary = md5(time());

    

    $headers  = "MIME-Version: 1.0\r\n";

    $headers .= "From: $name <$email>\r\n";

    $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";

    

    $body  = "--$boundary\r\n";

    $body .= "Content-Type: text/html; charset=UTF-8\r\n";

    $body .= "Content-Transfer-Encoding: base64\r\n\r\n";

    $body .= chunk_split(base64_encode($message));

    

    if ($resume && is_uploaded_file($resume)) {

        $resume_content = chunk_split(base64_encode(file_get_contents($resume)));

        $body .= "--$boundary\r\n";

        $body .= "Content-Type: $resume_type; name=\"$resume_name\"\r\n";

        $body .= "Content-Disposition: attachment; filename=\"$resume_name\"\r\n";

        $body .= "Content-Transfer-Encoding: base64\r\n\r\n";

        $body .= $resume_content . "\r\n";

    }

    $body .= "--$boundary--";

    

    if (mail($to, $subject, $body, $headers)) {

        echo json_encode(["status" => "success", "message" => "Your application has been submitted successfully!"]);

    } else {

        echo json_encode(["status" => "error", "message" => "Could not send email."]);

    }

    exit;

}



echo json_encode(["status" => "error", "message" => "Invalid request"]);

