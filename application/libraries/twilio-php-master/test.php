<?php
error_reporting(E_ALL);
		ini_set('display_errors', 1);
    /* Send an SMS using Twilio. You can run this file 3 different ways:
     *
     * 1. Save it as sendnotifications.php and at the command line, run 
     *         php sendnotifications.php
     *
     * 2. Upload it to a web host and load mywebhost.com/sendnotifications.php 
     *    in a web browser.
     *
     * 3. Download a local server like WAMP, MAMP or XAMPP. Point the web root 
     *    directory to the folder containing this file, and load 
     *    localhost:8888/sendnotifications.php in a web browser.
     */

    // Step 1: Get the Twilio-PHP library from twilio.com/docs/libraries/php, 
    // following the instructions to install it with Composer.
    require_once "Twilio/autoload.php";
    use Twilio\Rest\Client;
    
    // Step 2: set our AccountSid and AuthToken from https://twilio.com/console
    $AccountSid = "ACca25bc122d951b1e1a5ce918a5a38a9e";
    $AuthToken = "a6092936cba46a773bae8a4c6c402b24";

    // Step 3: instantiate a new Twilio Rest Client
    $client = new Client($AccountSid, $AuthToken);

    // Step 4: make an array of people we know, to send them a message. 
    // Feel free to change/add your own phone number and name here.
    $people = array(
        "+919993125001" => "Pankaj Sharma",
    );

    // Step 5: Loop over all our friends. $number is a phone number above, and 
    // $name is the name next to it
    foreach ($people as $number => $name) {

        $sms = $client->account->messages->create(

            // the number we are sending to - Any phone number
            $number,

            array(
                // Step 6: Change the 'From' number below to be a valid Twilio number 
                // that you've purchased
                'from' => "+15005550006", 
                
                // the sms body
                'body' => "Hey $name, Monkey Party at 6PM. Bring Bananas!"
            )
        );

$client->messages->create(
    // the number you'd like to send the message to
    $number,
    array(
        // A Twilio phone number you purchased at twilio.com/console
        'from' => '+15005550006',
        // the body of the text message you'd like to send
        'body' => 'Hey Jenny! Good luck on the bar exam!'
    )
);

        // Display a confirmation message on the screen
        echo "Sent message to $name";
    }
