<?php
   /*
   Name:mail file 
   
   version: 1
   purpose: to send mail
   
   Developer: Haripriya
   */
   
   /* original code starts */
   
#including dbconfig file
include "resources/dbconfig/dbconfig.php";
#including 'log.php'
include 'resources/log/log.php';
#including 'errorclass.php'
include 'resources/log/errorclass.php';
#creating logs
$logfile = 'resources/log/logs/log_' . date('d-M-Y') . '.log';
logToFile($logfile, "info->mail.php", 1);
 

//include mailer files
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$success='';

require_once 'vendors/autoload.php';


 if ($_SERVER["REQUEST_METHOD"] == "POST") {

  
        # Sender Data
        $subject = trim($_POST["subject"]);
        $name = str_replace(array("\r","\n"),array(" "," ") , strip_tags(trim($_POST["name"])));
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $message = trim($_POST["message"]);
        
		
		
		
        if ( empty($name) OR !filter_var($email, FILTER_VALIDATE_EMAIL) OR empty($subject) OR empty($message)) {
            # Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Please complete the form and try again.";
            exit;
        }
  
  
  
  
$mail = new PHPMailer(true);

//$mail->SMTPDebug = 2;                               // Enable verbose debug output

$mail->AuthType = 'NTLM';                             // Enable SMTP authentication
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;  
$mail->Username = 'cadractelesystems@gmail.com';                 // SMTP username
$mail->Password = '9676013878';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom($_POST['email'],$_POST['email']);
$mail->addAddress('cadractelesystems@gmail.com');     // Add a recipient

$mail->addReplyTo('cadractelesystems@gmail.com','Cadrac Telesystems');
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML
$subject= $_POST['name'].'-'.$_POST['subject'];

$mail->Subject =  $subject;
$mail->Body    = '<imp><b>INFORMATION</b></imp><br>Name '.$name .'<br> email: '.$email.'<br> subject is: '.$subject.
				 ' <br>message:'.$message;

$mail->AltBody = 'welcome to my world';
  
$success=$mail->send();
 
        if ($success) {
            # Set a 200 (okay) response code.
            http_response_code(200);
            echo "Thank You! Your message has been sent.";
        } else {
            # Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Something went wrong, we couldn't send your message.";
        }

    } else {
        # Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }

?>
