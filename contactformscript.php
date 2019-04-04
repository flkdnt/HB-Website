<?php
session_start();

$msg = '';


use PHPMailer\PHPMailer\PHPMailer;

require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/SMTP.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailerAutoload.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';

$securimage = new Securimage();

//Don't run this unless we're handling a form submission
if (array_key_exists('email', $_POST)) {

    date_default_timezone_set('Etc/UTC');

    //Create a new PHPMailer instance
    $mail = new PHPMailer;



/////////////////////
// THIS 

   // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
   // $mail->isSMTP();                                      // Set mailer to use SMTP
   // $mail->Host = 'smtp.live.com';                        // Specify main and backup SMTP servers
   // $mail->SMTPAuth = true;                               // Enable SMTP authentication
   // $mail->Username = 'smtpusername';              // SMTP username
   // $mail->Password = 'smtppassword';                         // SMTP password
   // $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
   // $mail->Port = 587;                                    // TCP port to connect to
    $mail->Debugoutput = 'text';

// OR THIS

    //$mail->isMail();                                      // uses regular mail

//////////////////





    $mail->setFrom('info@domain.com', 'Message from Contat Form');
    $mail->addAddress('myemai@email.com', 'Message from Contat Form');


	$email = isset($_POST['email']) ? $_POST['email'] : null;
	$subject = isset($_POST['subject']) ? $_POST['subject'] : null;
	$name = isset($_POST['name']) ? $_POST['name'] : null;
	$message = isset($_POST['message']) ? $_POST['message'] : null;


    if ($mail->addReplyTo($_POST['email'], $_POST['name'])) {
        $mail->Subject = $_POST['subject'];
        $mail->isHTML(true);
        $mail->Body = <<<EOT
<div style="width:100%">
<div><label style="color: #044F69; font-weight:bold">Subject:</label> <span>{$_POST['subject']}</span></div>
<div><label style="color: #044F69; font-weight:bold">Email:</label> <span>{$_POST['email']}</span></div>
<div><label style="color: #044F69; font-weight:bold">Name:</label> <span>{$_POST['name']}</span></div>
<div><label style="color: #044F69; font-weight:bold">Message:</label> <span>{$_POST['message']}</span></div>
</div>
EOT;

        if ($securimage->check($_POST['captcha_code']) == false) {
            $response = [
                'status'=> 1,
                'msg'   => 'CAPTCHA test failed!'
            ];
        } else {
            //Send the message, check for errors
            if (!$mail->send()) {
                // Generate a response in this failure case, including a message and a status flag
                $response = [
                    'status'=> 1,
                    'msg'   => 'Sorry, something went wrong. Please try again later.'
                ];
            } else {
                // Generate a response in the success case, including a message and a status flag
                $response = [
                    'status'=> 0,
                    'msg'   => 'Success!'
                ];
            }
        }
    } else {
        // Generate a response in this failure case, including a message and a status flag
        $response = [
            'status'=> 1,
            'msg'   => 'Invalid email address, message ignored.'
        ];
    }
}
// Add the response to the session, so that it will be available after reload
$_SESSION['response'] = $response;

// Finally display the response as JSON so calling JS can see what happened
header('Content-Type: application/json');
echo json_encode($response);

?>
