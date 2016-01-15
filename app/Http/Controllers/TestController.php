<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\models\AdvertiseModel;
use Request;

class TestController extends Controller{
	public function multiple(){
		$num = Request::input('a');
		
		$page = 'test';
		return view($page, array('page' => $page, 'num' => $num));

	}
}
	
