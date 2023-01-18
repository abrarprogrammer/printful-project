<?php

// Put contacting email here
$main_email = "info@seeyourdreams.xyz";

if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

//Fetching Values from URL
$email = $_POST['xx_email'];
$message = $_POST['xx_message'];

//Sanitizing email
// $email = filter_var($email, FILTER_SANITIZE_EMAIL);

//After sanitization Validation is performed
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
	
		$subject = "A New Customer Wants To See His Dream.";
		
		// To send HTML mail, the Content-type header must be set
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: form@seeyourdreams.xyz' . "\r\n";
		$headers .= 'Reply-To: '.$email . "\r\n";
		
		$template = '
		<div style="padding:50px;">
			A new customer has filled your form <br/>'
			. '<strong style="color:#f00a77;">Email:</strong>  ' . $email . '<br/>'
			. '<strong style="color:#f00a77;">His/Her Dream:</strong>  ' . $message . '<br/>'
			. 'Reply to this email to send email to '.$email
		.'</div>';

		$sendmessage = "<div style=\"background-color:#f5f5f5; color:#333;\">" . $template . "</div>";
		
		// message lines should not exceed 70 characters (PHP rule), so wrap it
		$sendmessage = wordwrap($sendmessage, 70);

		// Client side configurations
		$client_subject = "SEEYOURDREAMS";

		$client_message = '
		<div style="padding:50px;">
			Hey!<br/>'
			. 'Thank you for sharing your dream with us. Our team is excited to help bring it to life for you!<br/>'
			. 'We will now get to work to get you a visualization that accurately captures the details and emotions of your dream.<br/>'
			. 'We will be sending you an email shortly with a digital copy. In the meantime, if you have any questions or concerns, please do not hesitate to reach out to us.<br/>'
			. 'Thank you for choosing us to help you explore your dream world.<br/>'
			. 'Best,<br/>'
			. 'Admin<br/>'
			. 'seeyourdreams.xyz'
		.'</div>';

		$client_sendmessage = "<div style=\"background-color:#f5f5f5; color:#333;\">" . $client_message . "</div>";
		
		// message lines should not exceed 70 characters (PHP rule), so wrap it
		$client_sendmessage = wordwrap($client_sendmessage, 70);

		$client_headers = 'MIME-Version: 1.0' . "\r\n";
		$client_headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$client_headers .= 'From: info@seeyourdreams.xyz' . "\r\n";
		$client_headers .= 'Reply-To: info@seeyourdreams.xyz' . "\r\n";
		
		
		// Send mail by PHP Mail Function
		// mail($main_email, $subject, $sendmessage, $headers);
		// echo "";
		if(mail($main_email, $subject, $sendmessage, $headers)) {
			mail($email, $client_subject, $client_sendmessage, $client_headers);
			echo "";
		}
	
	
} else {
	echo "<span class='contact_error'>* Invalid email *</span>";
}

?>
<div style="padding: 50px;"></div>