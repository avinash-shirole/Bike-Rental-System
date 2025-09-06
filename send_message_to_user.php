<?php
require_once 'vendor/autoload.php';

use Twilio\Rest\Client;

// Twilio credentials
$sid = 'your_account_sid'; // Replace with your Account SID
$authToken = "curl 'https://api.twilio.com/2010-04-01/Accounts/AC79524c8cbb27f66ca8a2bae3c3b76264/Messages.json' -X POST \
--data-urlencode 'To=+919370636481' \
--data-urlencode 'MessagingServiceSid=MG5e2a987e077dd838a21881a189598289' \
--data-urlencode 'Body=Ahoy 👋' \
-u AC79524c8cbb27f66ca8a2bae3c3b76264:[AuthToken]"; // Replace with your Auth Token

$twilioPhoneNumber = '+1234567890'; // Replace with your Twilio phone number

// Recipient's phone number
$toPhoneNumber = '+919370636481'; // Replace with the recipient's phone number

// Message content
$message = "Hello! This is a test message from Twilio.";

// Initialize Twilio client
$client = new Client($sid, $authToken);

try {
    // Send the SMS
    $client->messages->create(
        $toPhoneNumber, // To
        [
            'from' => $twilioPhoneNumber, // From
            'body' => $message, // Message content
        ]
    );

    echo "Message sent successfully!";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
