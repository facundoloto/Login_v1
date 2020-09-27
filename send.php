<?php



/*function sendEmail($email,$name,$password){
$title="SignUp";
$message = '
 
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------
Username: '.$name.'
Password: '.$password.'
------------------------
'; // Our message above including the link
$header = "From:example@gmail.com"."\r\n"; // Set from headers
$mail=mail($email,$title,$message,$header);
if($mail){echo "enviado";}
else{echo "error";}

}

}
*/

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'mailer/Exception.php';
    require 'mailer/PHPMailer.php';
    require 'mailer/SMTP.php';
   
function sendEmail($email,$name,$password){
    $mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug =0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com'; //puerto gmail                   // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'phpprueba8@gmail.com';//se congigura el usuario donde se va enviar los email                 // SMTP username
    $mail->Password   = '97_phpprueba8';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587; //puerto de gemail                                   // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('phpprueba8@gmail.com', 'php');
    $mail->addAddress($email);     // Add a recipient
   


    // Attachments
    /*$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachment
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name se envia imagenes*/

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Importante';
    $body='gracias por registrarte en este sitio web'.'<br>nombre usuario:'.$name.'<br>contraseña:'.$password.'<br>email:'.$email;
    $mail->Body =$body;
    $mail->AltBody = "gracias";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
 function sendPassword($email,$password){
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug =0;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com'; //puerto gmail                   // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'phpprueba8@gmail.com';//se congigura el usuario donde se va enviar los email                 // SMTP username
        $mail->Password   = '97_phpprueba8';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587; //puerto de gemail                                   // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom('phpprueba8@gmail.com', 'php');
        $mail->addAddress($email);     // Add a recipient
       
    
    
        // Attachments
        /*$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachment
        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name se envia imagenes*/
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Importante';
        $body='solicitaste una nueva contraseña,vaya al link de que hay abajo para reestablecer su contraseña'.'<a href="http://192.168.0.54/nuevacontrase%C3%B1a.html">pinchar aqui para reestablecer contraseña</a>';
        $mail->Body =$body;
        $mail->AltBody = "gracias";
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
 }
?>