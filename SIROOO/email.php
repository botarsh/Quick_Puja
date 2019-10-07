<?php
	$prod = $_GET['prodName'];
	$price = $_GET['prodprice'];
	$mobno = $_POST['mobno'];
	$email = $_POST['email'];
	$name = $_POST['name'];
	$add = $_POST['add'];
	// * This example shows settings to use when sending via Google's Gmail servers.
	// * This uses traditional id & password authentication - look at the gmail_xoauth.phps
	// * example to see how to use XOAUTH2.
	// * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
	// */
	//Import PHPMailer classes into the global namespace
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';
	//Create a new PHPMailer instance
	$mail = new PHPMailer;
	//Tell PHPMailer to use SMTP
	$mail->isSMTP();
	//Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
	$mail->SMTPDebug = 2;
	//Set the hostname of the mail server
	$mail->Host = 'smtp.gmail.com';
	// use
	// $mail->Host = gethostbyname('smtp.gmail.com');
	// if your network does not support SMTP over IPv6
	//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
	$mail->Port = 587;
	//Set the encryption mechanism to use - STARTTLS or SMTPS
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
	//Whether to use SMTP authentication
	$mail->SMTPAuth = true;
	//Username to use for SMTP authentication - use full email address for gmail
	$mail->Username = "madanparmar637@gmail.com";
	//Password to use for SMTP authentication
	$mail->Password = "2m3a9d9A";
	//Set who the message is to be sent from
	$mail->setFrom('madanparmar637@gmail.com', 'Madan Lal');
	//Set an alternative reply-to address
	$mail->addReplyTo('4798rishabh@gmail.com', 'Rishabh Mishara');
	//Set who the message is to be sent to
	$mail->addAddress($email, $name);
	//Set the subject line
	$mail->Subject = 'Your Order Received!';
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);
	//Replace the plain text body with one created manually
	//$mail->AltBody = 'This is a plain-text message body';
	//Attach an image file
	//$mail->addAttachment('text.txt');
	//send the message, check for errors
	
	$mail->Body = "Hello, <b>$name</b><br>Your order has been received.<br>
	your details are...<br>
	<ul>
		<li>Product Name : $prod</li>
		<li>Prroduct Price : $price</li>
		<li>Your Mobile : $mobno</li>
		<li>Your Address : $add</li>
	</ul>
	<b><h2>We will contact you soon..</h2></b>";
	$mail->IsHTML(true);
	
	if (!$mail->send()) {
		header('location:error.html');
	} else {
		$suc = "Check Your Mail Please!";
		header("location:index.php?suc=$suc");
		//Section 2: IMAP
		//Uncomment these to save your message in the 'Sent Mail' folder.
		//if (save_mail($mail)) {
		//	echo "Message saved!";
		//}
	}
	//Section 2: IMAP
	//IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
	//Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
	//You can use imap_getmailboxes($imapStream, '/imap/ssl', '*' ) to get a list of available folders or labels, this can
	//be useful if you are trying to get this working on a non-Gmail IMAP server.
	/*function save_mail($mail)
	{
		//You can change 'Sent Mail' to any other folder or tag
		$path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";
		//Tell your server to open an IMAP connection using the same username and password as you used for SMTP
		$imapStream = imap_open($path, $mail->Username, $mail->Password);
		$result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
		imap_close($imapStream);
		return $result;
	}*/
?>