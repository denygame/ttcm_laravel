<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;
use App\Ward;


class AreaController extends Controller
{
	public function getDistrict()
	{
		if(isset($_GET['id_city'])){
			$id_city = $_GET['id_city'];
			$district = District::where('city_id',$id_city)->get();
			return response()->json(['arrDistrict'=>$district]);
		}
	}

	public function getWard()
	{
		if(isset($_GET['id_district'])){
			$id_district = $_GET['id_district'];
			$ward = Ward::where('district_id',$id_district)->get();
			return response()->json(['arrWard'=>$ward]);
		}
	}
}
