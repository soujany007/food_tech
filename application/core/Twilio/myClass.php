<?php
class myClass {

	use Twilio\Rest\Client;		    

	function myFunction() {
    require_once APPPATH . "libraries/Twilio/autoload.php";
	
    $AccountSid = "ACca25bc122d951b1e1a5ce918a5a38a9e";
    $AuthToken = "a6092936cba46a773bae8a4c6c402b24";
    $client = new Client($AccountSid, $AuthToken);
    $people = array(
        "+919993125001" => "Pankaj Sharma",
    );

    foreach ($people as $number => $name) {

        $sms = $client->account->messages->create(
                $number, array(
            'from' => "+15005550006",
            'body' => "Hey $name, Monkey Party at 6PM. Bring Bananas!"
                )
        );
        echo "Sent message to " . $name;
    }
}
}

