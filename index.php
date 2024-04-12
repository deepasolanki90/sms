<?php
if(isset($_POST['submit'])){
  $number=$_POST['number'];
  $message=$_POST['message'];
    
	// Account details
	$apiKey = urlencode('NzIzNDY2NzAzMTQ3NmI3OTcyNTQ0MjY3MzMzODQ0NTk=');
	
	// Message details
	$numbers = array($number);
	$sender = urlencode('TXTLCL');
	$message = rawurlencode('This is your message');
 
	$numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo $response;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sms Form</title>
</head>
<body>
    <form action="">
        <label for="number">Phone Number</label><br>
        <input type="number" name="number" id="number"><br>
        <label for="text">Message</label><br>
        <input type="text" name="message" id="message"><br>
        <button>submit</button>
    </form>
</body>
</html>