<?php
session_start();
include "includes/config.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
// require 'vendor/autoload.php';
 
   

$error = "";
$msg = "";
if (isset($_POST['email'])) {

    $emailTo = $_POST['email'];

    $emailvalidate = mysqli_query($conn, "SELECT * FROM tblaccount WHERE email = '$emailTo' ");
    if (mysqli_num_rows($emailvalidate) == 0) {
        $error = "*This email does not exist on our database. Please try again";
    } else {

        $code = uniqid(true);
        $query = mysqli_query($conn, "INSERT INTO tblresetrequest(code, email) VALUES('$code', '$emailTo')");
        if (!$query) {
            exit("Error");
        }
        else{
            $mail = new PHPMailer;
            $mail->isSMTP();
            // $mail->SMTPDebug = 2;
            $mail->Host = 'smtp.hostinger.com';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->Username = 'theflarestudentpublication@theflarepublication.online';
            $mail->Password = 'Theflarestudentpublication123?';
            
            $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/reset-password.php?code=$code";
            
            $mail->setFrom('theflarestudentpublication@theflarepublication.online', 'The Flare - Student Publication');
            $mail->addReplyTo('no-reply@theflarestudentpublication.com', 'No reply');
            $mail->addAddress($emailTo);
            $mail->Subject = 'Forget password';
            // $mail->msgHTML(file_get_contents('message.html'), __DIR__);
            $mail->Body    = "<h1>Request password reset</h1>
                         Please <a href='$url'>Click here</a> to continue<br>
                         Note: You can only use this link once";
            $mail->AltBody = 'Request password reset';
            //$mail->addAttachment('test.txt');
            if (!$mail->send()) {
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                // echo 'The email message was sent.';
                $error = "";
                $msg = "You will receive an email with a link to reset your password, <a href='index.php'>Click here</a> to continue";
            }
        }

        

        //try {
            
        
            // $mail = new PHPMailer(true);
            
            // $mail->isSMTP();                                            
            // $mail->Host       = 'smtp.gmail.com';                     
            // $mail->SMTPAuth   = true;                                   
            // $mail->Username   = 'theflarestudentpublication@gmail.com';
            // $mail->Password   = 'theflarestudentpublication123';
            // $mail->SMTPSecure = 'ssl';
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            // $mail->Port       = 465;
         

            // $mail->setFrom('theflarestudentpublication@gmail.com', 'The Flare - Student Publication');
            // $mail->addAddress($emailTo);     
            // $mail->addReplyTo('no-reply@theflarestudentpublication.com', 'No reply');

            // $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/reset-password.php?code=$code";

            // $mail->isHTML(true); 
            //$mail->Subject = 'Forget password';
            //$mail->Body    = "<h1>Request password reset</h1>
                         // Please <a href='$url'>Click here</a> to continue<br>
                         // Note: You can only use this link once";
            // $mail->AltBody = 'Request password reset';

            // $mail->SMTPOptions = array(
            //     'ssl' => array(
            //         'verify_peer' => false,
            //         'verify_peer_name' => false,
            //         'allow_self_signed' => true
            //     )
            // );
            // $mail->send();
            // $error = "";
            // $msg = "You will receive an email with a link to reset your password, <a href='index.php'>Click here</a> to continue";
        // } catch (Exception $e) {
        //     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        // }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>The Flare - Student Publication</title>
    <link rel="icon" href="images/flare-logo.png" type="image/icon type">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/style.css">

    <style>
        html,
        .main {
            min-height: 100%;
            background: linear-gradient(160deg, rgba(237, 112, 62), rgba(235, 183, 70));
            background-size: cover;
        }
        @media only screen and (max-width: 768px) {
            .signin-form {
                order: 2;
            }
        }
    </style>
    <script src="assets/js/modernizr.min.js"></script>
</head>

<body>
    <div class="main">
        <section class="sign-in" style="margin-top: 20px;">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image" style="background-color: #fff; border-radius: 20px;">
                        <h4 style="text-align: center; font-weight: 600 !important;">The Flare - Student Publication</h4>
                        <figure><img src="images/flare.jpg" alt="flare image" style="background-color: #fff; border-radius: 50%;" width="250"></figure>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Forget password</h2>
                        <form method="post" class="" id="">

                            <div style="font-size: 14px; margin-top: 30px;">
                                <i class="fa fa-info-circle"></i> Guide :
                                <ul>
                                    <li>Make sure to enter working email address<span style="color: red">*</span></li>
                                    <li>If you haven't received the email, please check your spam<span style="color: red">*</span></li>

                                </ul>
                            </div>
                            <div class="form-group">
                                <label for=""><i class="fa fa-envelope"></i></label>
                                <input type="text" name="email" id="" placeholder="Email" autocomplete="off" required />
                            </div>
                            <div style="color: red;"><?php echo $error; ?></div>
                            <div style="color: green;"><?php echo $msg; ?></div>
                            <br>
                            <div class="form-group">
                                <label for="" class="label-agree-term"><i class="fa fa-arrow-left"></i></span></span><a href="index.php"> Go back ?</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input class="btn btn-primary btn-lg" type="submit" name="forget" value="Request a reset password" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>