<?php
 session_start();

 if(isset($_SESSION["user"])){
     if(($_SESSION["user"])=="" or $_SESSION['usertype']!='p'){
       
     }else{
         $useremail=$_SESSION["user"];
     }

 }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
	<link rel="stylesheet" href="../css/index1.css">
        
    <title>Appointments</title>
    <style>
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }
</style>
</head>
<body >

<?php

//Include required PHPMailer files
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';
	

//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	
//Create instance of PHPMailer
	$mail = new PHPMailer();
//Set mailer to use smtp
	$mail->isSMTP();
//Define smtp host
	$mail->Host = "smtp.gmail.com";
//Enable smtp authentication
	$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "tls";
//Port to connect smtp
	$mail->Port = "587";
//Set gmail username
	$mail->Username = "emshospitalbatticaloa1@gmail.com";
//Set gmail password
	$mail->Password = "nfolmpgvudumldsz";
//Email subject
	$mail->Subject = ("Booking Confirmation (EMS Hospital - Batticaloa)");
//Set sender email
	$mail->setFrom('emshospitalbatticaloa1@gmail.com');
//Enable HTML
	$mail->isHTML(true);
//Attachment
	//$mail->addAttachment('img/attachment.png');
//Email body
	$mail->Body = "<u><h1 style=”<?php echo ‘font-size: 10px; color:blue;’ ?><b>Your booking has confirmed.</b></u></h1><br><br><h3 style=”<?php echo ‘font-size: 15px; color:blue;’ ?> Consultant fee Rs.2000.00<br>Hospital fee Rs.500.00<br>Your total booking amount is Rs.2500.00</h3><br><br>_Thank you for choosing our service_";
//Add recipient
	$mail->addAddress($useremail);
	
//Finally send email
	if ( $mail->send() ) {
		echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                    <br><br>
                        <h2>Mail sent Successfully.</h2>
                        
                        <div style="display: flex;justify-content: center;">
                        
                        <a href="appointment.php" class="non-style-link"><button  class="logout-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;OK&nbsp;&nbsp;</font></button></a>
                        <br><br><br><br>
                        </div>
                    </center>
            </div>
            </div>
			';
	}else{
		echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                    <br><br>
                        <h2>Mail not sent.</h2>
                        
                        <div style="display: flex;justify-content: center;">
                        
                        <a href="appointment.php" class="non-style-link"><button  class="logout-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;OK&nbsp;&nbsp;</font></button></a>
                        <br><br><br><br>
                        </div>
                    </center>
            </div>
            </div>
			';
	}
//Closing smtp connection
	$mail->smtpClose();
?>

</body>
</html>