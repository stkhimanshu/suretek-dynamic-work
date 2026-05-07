<?php
header('Content-Type: application/json; charset=UTF-8');
function sendLinkedInConversionEvent($name)
{

    $payload = [
        "conversion" => "urn:lla:llaPartnerConversion:24721250",
        "conversionHappenedAt" => 1764140980082,
        "conversionValue" => [
            "currencyCode" => "USD",
            "amount" => "50.0"
        ],
        "user" => [
            "userIds" => [
                [
                    "idType" => "SHA256_EMAIL",
                    "idValue" => "bad8677b6c86f5d308ee82786c183482"
                ]
            ],
            "userInfo" => [
                "firstName" => $name,
                "lastName" => $name
            ]
        ]
    ];

    $jsonData = json_encode($payload);

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => 'https://api.linkedin.com/rest/conversionEvents',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $jsonData,
        CURLOPT_HTTPHEADER => [
            'Authorization: Bearer AQXUbMNhHE5JGLbs_gmkttg2ZDnLcp79CWwrUYQupT23On16F0Fq_sjEYbvc0DwCSKPEYEyTz4An0Gxrm4R2DmSBuvItAw6nKasbDS2JdQNHeQjjWDCkD_6pNemSDPcf-9bex6OURUNXNeYBOWU_75nhQlNnKrpa9gqieXLcYfCV_-txxqWVQoNVfQTTT5VZnnkN0xLAcMBDIHBsQJh9qXR3C2xPiVfa_TPZQHd07XQ0goPesmyMjPXZBg_UBtLHa8-3xTdYtUdzbAY3OMNU_WWOQculD782s5PIT_5B3X_hPwlrmFawCRKA_ey01GjqRjw2GwUdgrKg4ft5LEufGrhcFxzaCI8rujS8uiMGTg0-KvORNAbCRQf91Xw8obyeIytdrzJ7dvJsoh1Qdf6WO45SbKMgI9MXAy0yqzYbdpIJ1NR_6v4iPL9ak1T1GNXdVsGajmW6t9LDa_9akfs',
            'Content-Type: application/json',
            'LinkedIn-Version: 202509',
            'X-Restli-Protocol-Version: 2.0.0'
        ]
    ]);

    $response = curl_exec($curl);
    if (curl_errno($curl)) {
        return "Curl Error: " . curl_error($curl);
    }

    curl_close($curl);

    return $response; // return the result
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // $to = "info@suretekinfosoft.com";
    $action = $_POST['action'] ?? '';

    // Default headers
    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: info@suretekinfosoft.com\r\n";



    // Default body (used unless overridden)
    $body = '';
    $mail_subject = '';

    if ($action === 'contact-form') {
        $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
        $to = "contact@suretekinfosoft.com";
        $final_email = $to . ',' . $email;

        /** CONTACT FORM **/
        $name = htmlspecialchars($_POST['name'] ?? '');
        $email = htmlspecialchars($_POST['email'] ?? '');
        // $subject = htmlspecialchars($_POST['subject'] ?? '');
        $mobile = htmlspecialchars($_POST['mobile'] ?? '');
        // $address = htmlspecialchars($_POST['address'] ?? '');
        $comments = htmlspecialchars($_POST['comments'] ?? '');

        $mail_subject = "Contact Form Submission";

        $body = "
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Mobile:</strong> $mobile</p>
        <p><strong>Comments:</strong> $comments</p>
        ";
    } elseif ($action === 'career-form') {
        $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
        $to = "careers@suretekinfosoft.com";
        $final_email = $to . ',' . $email;
        /** CAREER FORM **/
        $name = htmlspecialchars($_POST['name'] ?? '');
        $email = htmlspecialchars($_POST['email'] ?? '');
        $mobile = htmlspecialchars($_POST['mobile'] ?? '');
        $position = htmlspecialchars($_POST['position'] ?? '');

        $mail_subject = "Career Form Submission - $position";

        $message = "
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Mobile:</strong> $mobile</p>
        <p><strong>Position:</strong> $position</p>
        ";

        // If file uploaded, attach it
        if (isset($_FILES['resume']) && $_FILES['resume']['error'] === UPLOAD_ERR_OK) {
            $file_tmp_path = $_FILES['resume']['tmp_name'];
            $file_name = basename($_FILES['resume']['name']);
            $file_type = $_FILES['resume']['type'];

            // Read and encode file
            $file_content = chunk_split(base64_encode(file_get_contents($file_tmp_path)));

            // Create unique boundary
            $boundary = md5(time());

            // Build headers
            $headers  = "MIME-Version: 1.0\r\n";
            // $headers .= "From: careers@suretekinfosoft.com\r\n";
            $headers .= "From: info@suretekinfosoft.com\r\n";
            $headers .= "Reply-To: $email\r\n";
            $headers .= "Content-Type: multipart/mixed; boundary=\"{$boundary}\"\r\n";

            // Build email body
            $body  = "--{$boundary}\r\n";
            $body .= "Content-Type: text/html; charset=UTF-8\r\n";
            $body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
            $body .= $message . "\r\n\r\n";

            // Attach file
            $body .= "--{$boundary}\r\n";
            $body .= "Content-Type: {$file_type}; name=\"{$file_name}\"\r\n";
            $body .= "Content-Transfer-Encoding: base64\r\n";
            $body .= "Content-Disposition: attachment; filename=\"{$file_name}\"\r\n\r\n";
            $body .= $file_content . "\r\n";
            $body .= "--{$boundary}--";
        } else {
            // No file uploaded
            $body = $message;
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid form action"]);
        exit;
    }

    // Send mail with correct body
    if (mail($final_email, $mail_subject, $body, $headers)) {
        echo json_encode(["status" => "success", "message" => "Your message has been sent successfully!"]);
        if ($_POST['action'] == 'contact-form') {
            sendLinkedInConversionEvent($_POST['name']);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Could not send your message. Please try again."]);
    }

    exit;
}

// Invalid request (not POST)
echo json_encode(["status" => "error", "message" => "Invalid request method"]);
exit;
