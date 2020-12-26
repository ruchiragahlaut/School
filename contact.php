<?php


$name=$_POST['w3lName'];
$email=$_POST['w3lSender'];
$subject=$_POST['w3lSubject'];
$message=$_POST['w3lMessage'];

// Database connection
$conn = new mysqli('localhost','root','','contact');
$sql="INSERT INTO `table`(`name`, `email`, `subject`,`message`) VALUES ('".$name."','".$email."','".$subject."','".$message."')";
$result = $conn->query($sql);
if(!$result){
    	die("Couldn't enter data: ".$conn->error);
	}

$conn->close();

// echo "Thank You For Contacting Us ";
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'vendor/phpmailer/phpmailer/src/Exception.php';
  require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
  require 'vendor/phpmailer/phpmailer/src/SMTP.php';

  // Include autoload.php file
  require 'vendor/autoload.php';
  // Create object of PHPMailer class
  $mail = new PHPMailer(true);

  $output = '';

  if (isset($_POST['submit'])) {
	$name=$_POST['w3lName'];
	$email=$_POST['w3lSender'];
	$subject=$_POST['w3lSubject'];
	$message=$_POST['w3lMessage'];

    try {
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      // Gmail ID which you want to use as SMTP server
      $mail->Username = 'NEW GMAIL ID';                                    //To Change
      // Gmail Password
      $mail->Password = 'NEW GMAIL ID PASSWORD';                           //To Change
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = 587;

      // Email ID from which you want to send the email
      $mail->setFrom('Your new GMAIL ID');                                //To Change
      // Recipient Email ID where you want to receive emails
      $mail->addAddress('Your Dad Email Address');                       //To Change

      $mail->isHTML(true);
      $mail->Subject = 'Form Submission';
      $mail->Body = "<h3>Name : $name <br>Email : $email <br> Subject : $subject <br> Message : $message</h3>";

      $mail->send();
      $output = '<div class="alert alert-success">
                  <h5>Thankyou! for contacting us, We\'ll get back to you soon!</h5>
                </div>';
    } catch (Exception $e) {
      $output = '<div class="alert alert-danger">
                  <h5>' . $e->getMessage() . '</h5>
                </div>';
    }
  }


	function_alert("Your message is sent.");

	function function_alert($msg) {
		echo "<script type='text/javascript'>
		alert('$msg');
		window.location.href='contact.html'
		</script>";
	}



?>

