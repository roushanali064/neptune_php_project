<?php

include('./config/db.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include('./src/PHPMailer.php');
include('./src/SMTP.php');
include('./src/Exception.php');
$mail = new PHPMailer(true);

if(isset($_POST['mail_submission'])){
    
    $name = $_POST['name'];
    $email_to = $_POST['email'];
    $message = $_POST['message'];
    $subject = "Kufa community support";
    $body = "Hey $name thankyou for send a email"."<br>"."kuffa community receive your email"."<br>"."A kuffa agent reply your email in 2 hours";

//Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'roushanrhaman064@gmail.com';                     //SMTP username
    $mail->Password   = 'wvtb wzzu cwji tzot';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('big_kuffa@dev.com', 'BIG_Kuffa');
    $mail->addAddress($email_to, $name);     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo($email_to);
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    $insert_query = "INSERT INTO user_message (email,name,message) VALUES ('$email_to','$name','$message')";
    mysqli_query($db_connect,$insert_query);
    header('location: ./index.php');
}

// feedback mail

if(isset($_POST['send_feedback'])){
    $message_id = $_POST['message_id'];
    $email_to = $_POST['email'];
    $subject = $_POST['subject'];
    $body = $_POST['description'];

    if($message_id && $email_to && $subject && $body){

    //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'roushanrhaman064@gmail.com';                     //SMTP username
    $mail->Password   = 'wvtb wzzu cwji tzot';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;

    //Recipients
    $mail->setFrom('big_kuffa@dev.com', 'BIG_Kuffa');
    $mail->addAddress($email_to);     //Add a recipient
    $mail->addReplyTo($email_to);

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    // update

        $update_query = "UPDATE user_message SET feedback='$body'";
        mysqli_query($db_connect,$update_query);
        header('location: ./dashboard/user_mail.php');
    }
}

?>