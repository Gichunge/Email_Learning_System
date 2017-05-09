<!DOCTYPE html>
<HTML>	
	<HEAD>
		<title>APCS</title>
		<?php			
			$email = $name="";
			if ($_SERVER["REQUEST_METHOD"] == "POST") {				
				$email = test_input($_POST["mail"]);
				$name = test_input($_POST["name"]);	
				if($name == ''){
					echo "<script>alert('Please Input Your  Name');</script>";
				}	
				if($email == ''){
					echo "<script>alert('Please Input Your Email');</script>";							
				}
				else{
						/**
					 * This example shows settings to use when sending via Google's Gmail servers.
					 */
					//SMTP needs accurate times, and the PHP time zone MUST be set
					//This should be done in your php.ini, but this is how to do it if you don't have access to that
					date_default_timezone_set('Etc/UTC');
					require '../mail_engine/PHPMailer-master/PHPMailerAutoload.php';
					//Create a new PHPMailer instance
					$mail = new PHPMailer;
					//Tell PHPMailer to use SMTP
					$mail->isSMTP();
					//Enable SMTP debugging
					// 0 = off (for production use)
					// 1 = client messages
					// 2 = client and server messages
					$mail->SMTPDebug = 0;
					//Ask for HTML-friendly debug output
					$mail->Debugoutput = 'html';
					//Set the hostname of the mail serverS 
					$mail->Host = 'smtp.gmail.com';
					// use
					// $mail->Host = gethostbyname('smtp.gmail.com');
					// if your network does not support SMTP over IPv6
					//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
					$mail->Port = 587;
					//Set the encryption system to use - ssl (deprecated) or tls
					$mail->SMTPSecure = 'tls';
					//Whether to use SMTP authentication
					$mail->SMTPAuth = true;
					//Username to use for SMTP authentication - use full email address for gmail
					$mail->Username = "kimgichunge6@gmail.com";
					//Password to use for SMTP authentication
					$mail->Password = "billgates";
					//Set who the message is to be sent from
					$mail->setFrom('kimgichunge6@gmail.com', 'Kelvin Gichunge');
					//Set an alternative reply-to address
					$mail->addReplyTo('kimgichunge6@gmail.com', 'Kelvin Gichunge');
					//Set who the message is to be sent to
					$mail->addAddress($email, $name);
					//Set the subject line
					$mail->Subject = 'C PROGRAMMING SOLUTION(APCS)';
					//Read an HTML message body from an external file, convert referenced images to embedded,
					//convert HTML into a basic plain-text alternative body
					$mail->msgHTML("Hello ".$name." This is Kim Gichunge Automated System providing you with at
					 least a solution to C-PROGRAMMING UNIT of our Course as we wait for the Lecturer.Incase of any problems occurring 
					 when learning,i'll be available for help.Long live Applied Physics & Computer Science!");
					//$mail->msgHTML(file_get_contents('../mail_engine/PHPMailer-master/examples/contents.html'), dirname(__FILE__));
					//Replace the plain text body with one created manually
					$mail->AltBody = 'C-PROGRAMMING RESOURCES';
					//Attach an image file
					$mail->addAttachment('../mail_engine/PHPMailer-master/examples/Resources/C-PROGRAMMING.pdf');
					$mail->addAttachment('../mail_engine/PHPMailer-master/examples/Resources/WEB_LINKS_TUTORIALS.txt');
					$mail->addAttachment('../mail_engine/PHPMailer-master/examples/Resources/YOUTUBE_LINKS_TUTORIALS.txt');
					$mail->addAttachment('../mail_engine/PHPMailer-master/examples/Resources/SOFTWARES_LINKS.txt');
					//send the message, check for errors
					if (!$mail->send()) {
						echo "<script>alert('A Problem Occurred,Please Input Your Name and Your Existing Email Correctly');</script>";
					    //echo "Mailer Error: " . $mail->ErrorInfo;					    
					    //echo "<script>alert('Mailer Error: '.$mail->ErrorInfo;);</script>";
					} else {
					    //echo "Message sent!";
					    echo "<script>alert('C-PROGRAMMING Tutorials and Resources have been sent to your Email Successfully!');</script>";
					}
				}					
			}
			
			function test_input($data) {
			   $data = trim($data);
			   $data = stripslashes($data);
			   $data = htmlspecialchars($data);
			   return $data;
			}					
		?>
		<meta name="author" content="Gichunge Kelvin">
  		<meta charset="utf-8">
  		<meta name='viewport' content='width=device-width, initial-scale=1'>
  		<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"> 
  		<script src="../jquery/jquery.min.js"></script> 
  		<script src="../bootstrap/js/bootstrap.min.js"></script>
  		<script src='Javascript/Admin_validate.js'></script>
  		<link rel="stylesheet" type="text/css" href="Stylesheets/Styles.css">
	</HEAD>
	<BODY>	
		<div class='container'>
			<h3 style='color:white'><b>Today: <?php echo date("d/m/Y");?></b></h3>
			<h4 style='color:white'><b>APPLIED PHYSICS & COMPUTER SCIENCE (MULTIMEDIA UNIVERSITY OF KENYA)</b></h4>
			<h5 style='color:white'><b>GET A COPY OF C-PROGRAMMING TUTORIALS,LINKS & SOFTWARES TO YOUR EMAIL INBOX INSTANTLY</b></h5>
			<h6 style='color:white'>Copyright &copy;kelvinGichunge Softwares</h6>

		<form name = 'admin' class='form-inline' role='form' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method='post'>	
			<div class='form-group'>
				<label for='name'><b>Your Name :</b></label>
				<input type="text" class="form-control" id="name" name='name'>
			</div>				
			<div class='form-group'>
				<label for='email'><b>Your Email :</b></label>
				<input type="email" class="form-control" id="email" name='mail'>
			</div>
			
			<button type="submit" class="btn btn-success btn-lg">GET FREE TUTORIALS</button><br>
			<span id = 'error'></span>

		</div>	
		</form>		
		</div>	
					
	</BODY>
</HTML>