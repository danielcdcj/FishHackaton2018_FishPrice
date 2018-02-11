<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Price;
use \DB;
use \App\Message;
class MessageController extends Controller
{

	public function getMessages(Request $request){
                $location = $request->location;

                $query = [];
                if(!empty($location)){
                        $query["location"] = $location;
                }

                $data = Message::where($query)->get();

                return $data;

        }

	public function insertMessage(Request $request){
		$name = $request->name;
		$phone = $request->phone;
		$location = $request->location;
		$comment = $request->comment;
		$soldPrice = $request->soldPrice;
		$buyerName = $request->buyerName;

		$newMessage = new Message;
		$newMessage->name = $name;
		$newMessage->phone = $phone;
		$newMessage->location = $location;
		$newMessage->comment = $comment;
		$newMessage->soldPrice = (double)$soldPrice;
		$newMessage->buyerName = $buyerName;
		$newMessage->save();

		return [
			"RC"=>200
		];
	}
}
