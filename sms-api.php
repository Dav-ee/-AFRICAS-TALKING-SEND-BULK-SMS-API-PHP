<?php
require 'vendor/autoload.php';
use AfricasTalking\SDK\AfricasTalking;

class SMS
{
    private $recipients = array();

    function __construct($recipients)
    {
        $this->recipients =$recipients;
    }

    public function setRecipients($recipients) {
        $this->recipients = $recipients;
    }
    public function getRecipients() {
        return $this->recipients;
    }

    public function validateForm()
    {
        $recipients = $this->recipients;
        if ($recipients == "") {
            return false;
        }
        return true;
    }

    public function createFormErrorSessions($message)
    {
        session_start();
        $_SESSION['form_errors'] = $message;
    }

    // Set the numbers you want to send to in international format
//    $recipients = "+254706484707, +254774064343"; //use the receipients generated from form

    public function sendMessage($recipients) {
        // Set up credentials
        $username = "YOUR APP USERNAME";
        $apiKey = "YOUR API KEY"; // generate this in settings

        // Initialize the SDK
        $AT = new AfricasTalking($username, $apiKey);

        // Get the SMS Service
        $sms = $AT->sms();

        // Set your message
        $message = "Umbrella Academy";

        // Set your shortCode or senderId
       // $from = "10470"; //optional unless if you are in productions
        try {
            // That's it, hit send and we'll take care of the rest
            $result = $sms->send([
                'to'      => $recipients,
                'message' => $message
            ]);
           // print_r($result);
        } catch (Exception $e) {
            echo "Error: ".$e->getMessage();
        }
    }


}
