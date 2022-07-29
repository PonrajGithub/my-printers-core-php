<?php
require 'includes\PHPMailer.php';
require 'includes\SMTP.php';
require 'includes\Exception.php';
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
// print_r($_POST);
// exit; 
$mail = new PHPMailer; 
$mail->isSMTP();                      // Set mailer to use SMTP 
$mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
$mail->SMTPAuth = true;               // Enable SMTP authentication 
$mail->Username = 'aponraj077@gmail.com';   // SMTP username 
$mail->Password = 'Ponraj@12345';   // SMTP password 
$mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
$mail->Port = 587;                    // TCP port to connect to 
 
// Sender info 
$mail->setFrom('ponraj154080@gmail.com', 'CodexWorld'); 
$mail->addReplyTo('noreply@gmail.com', 'CodexWorld'); 
 
// Add a recipient 
$mail->addAddress('ponraj154080@gmail.com'); 
 
//$mail->addCC('cc@example.com'); 
//$mail->addBCC('bcc@example.com'); 
 
// Set email format to HTML 
$mail->isHTML(true); 
 
// Mail subject 
$mail->Subject = 'Elcowarz 2021 Event Registeraion'; 

// Mail body content 
$bodyContent = '<h1>Event Registeration</h1>'; 
$bodyContent .= "<p>"."Name=".$_POST['name']."</p>"; 
$bodyContent .= "<p>"."Department=".$_POST['department']."</p>"; 
$bodyContent .= "<p>"."Technical Event Name=".$_POST['techevent']."</p>"; 
$bodyContent .= "<p>"."Non-Technical Event Name=".$_POST['non-tech_event']."</p>"; 
$bodyContent .= "<p>"."Register Number=".$_POST['reg-no']."</p>"; 
$bodyContent .= "<p>"."Gender=".$_POST['gender']."</p>";
$bodyContent .= "<p>"."Email=".$_POST['mailid']."</p>";
$bodyContent .= "<p>"."Phone=".$_POST['Mobilenumber']."</p>";
$mail->Body    = $bodyContent; 
// Send email 
if(!$mail->send()) {
    echo 'Message could not be sent. Mailer Error:,<br>'.$mail->ErrorInfo; 
	echo "<button onclick ='window.location.href='index.phtml''> Resubmit</button>";
} else { 
    // echo 'Message has been sent.<br>'; 
   //   echo "Message has been sent. <br>"; 
	  // echo '<button onclick ="window.location.href=\'index.phtml\'"> I have another Registeration </button>';
	  header('Location:'); 
}
?>
