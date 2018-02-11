<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Twilio\Exceptions\TwilioException;

class TwilioController extends Controller
{
    	public function sendMessage(Request $request){
		$targetPhoneNumber = $request->targetPhoneNumber;
		$messageBody = $request->messageBody;
		$this->handleSend($targetPhoneNumber, $messageBody);

	}

	public function handleMessage(Request $request){
		$from = $request->From;
		$body = $request->Body;

		$fromCity = $request->FromCity;

		$response = "Price of $body in $fromCity is $3/lb";

		$this->handleSend($from, $response);
	}

	private function handleSend($targetPhoneNumber, $messageBody){
		$sid = "AC4e8c44cfe642865a0022ea8e461b0368";
                $token = "4ae7af5bfccb900e250869d823a2277f";
                $client = new Client($sid, $token);
                try {
                        /*$client->api->v2010->accounts->create("+17789386579", [
                                "From"=>"+17789386579",
                                "Body"=>"Hello!"
                        ]);*/
                        $messages = $client->messages->create($targetPhoneNumber, [
                                "From"=>"+16042567302",
                                "Body"=>$messageBody
                        ]);
                } catch (TwilioException $e){
                        return $e->getMessage();
                }
	}
}
