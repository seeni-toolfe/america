<?php
    // Include PHPMailer classes
    require 'email-templates/phpmailer/Exception.php';
    require 'email-templates/phpmailer/PHPMailer.php';
    require 'email-templates/phpmailer/SMTP.php';

    // Import PHPMailer classes into the global namespace
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    // Create an instance of PHPMailer
    $mail = new PHPMailer(true);

    try {

        // Server settings
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.hostinger.com';                   // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'seenivasan@toolfe.com';            // SMTP username
        $mail->Password = 'Jesusrdsdon@007';                  // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;      // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        // Recipients
        $mail->setFrom('$email', '$name');
        $mail->addAddress('seenivasan@toolfe.com', 'seenivasan');     // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Form Submission';
        $mail->Body    = 'Full Name: ' . $_POST['fullname'] . '<br>' .
                        'Email: ' . $_POST['email'] . '<br>' .
                        'Phone: ' . $_POST['phone'] . '<br>' .
                        'Country: ' . $_POST['country'] . '<br>' .
                        'Program of Interest: ' . $_POST['program_of_interest'] . '<br>' .
                        'Message: ' . $_POST['message'];
        $mail->AltBody = 'Full Name: ' . $_POST['fullname'] . "\n" .
                        'Email: ' . $_POST['email'] . "\n" .
                        'Phone: ' . $_POST['phone'] . "\n" .
                        'Country: ' . $_POST['country'] . "\n" .
                        'Program of Interest: ' . $_POST['program_of_interest'] . "\n" .
                        'Message: ' . $_POST['message'];

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>