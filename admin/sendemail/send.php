    <!-- ********************* CSS ***************************  -->
    <link rel="stylesheet" href="../content/css/add-Sanpham.css">
    <link rel="stylesheet" href="../content/css/email.css">
    <?php

    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $toEmail = $_POST['toEmail'];

    // echo $name, $email, $tel;
    ?>
    <?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;


    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer(true);

    try {
        //Send using SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'minkienmdc2003@gmail.com';                     //SMTP username
        $mail->Password   = 'shecssylfmogvmpp';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('from@example.com', 'The Debug Arena');
        $mail->addAddress($toEmail);     //Add a recipient


        $message = "Người gửi: " . $name . "<br>" . "Email: " . $email . "<br>" . "Nội dung: " . $tel;
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = $message;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo '

    
    <div class="Admin--content">
        <div class="Admin--content--container">
            <div class="Admin--content--container--title">
                <h1>Gửi email</h1>
            </div>
            <div class="Admin--content--container--form_susscess">
                    <h2>Gửi thành công</h2>
                    <a href="index.php?act=guiemail">Hoàn tất</a>
            </div>
        </div>
    </div>
    ';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
