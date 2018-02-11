<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Price;
use \DB;
class FishPriceController extends Controller
{
	public function insertPrice(Request $request){
		$data = $request->data;
		foreach($data as $currentData){
			$year = $request->year;
			$areaName = $request->areaName;
			$species = $request->species;
			$price = $request->price;
				
			DB::table('prices')->insert([
				"species"=>$species,
				"location"=>$areaName,
				"price"=>$price,
				"year"=>$year
			]);
		}
	}

	public function getLocations(Request $request){
		$data = DB::table("prices")->select("location")->distinct()->get();
		$toReturn = [];
		foreach($data as $currentData){
			//return $currentData;
			$toReturn[] = $currentData->location;
		}
		return $toReturn;
	}
	
	public function getSpecies(Request $request){
                $data = DB::table("prices")->select("species")->distinct()->get();
                $toReturn = [];
                foreach($data as $currentData){
                        //return $currentData;
                        $toReturn[] = $currentData->species;
                }
                return $toReturn;
        }

	public function getYears(Request $request){
                $data = DB::table("prices")->select("year")->distinct()->get();
                $toReturn = [];
                foreach($data as $currentData){
                        //return $currentData;
                        $toReturn[] = $currentData->year;
                }
                return $toReturn;
        }

	public function getPrice(Request $request){
		$species = $request->species;
		$year = $request->year;
		$areaName = $request->areaName;

		$query = [];
		if(!empty($species)){
			$query["species"] = $species;
		}
		if(!empty($year)){
			$query["year"] = $year;
		}
		if(!empty($areaName)){
			$query["location"] = $areaName;
		}

		$data = Price::where($query)->get();

		return $data;

	}

}
