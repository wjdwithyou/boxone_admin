<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\models\AdvertiseModel;
use Request;
//use Request;

class AdvertiseController extends Controller{
	public function index(){
		$adModel = new AdvertiseModel();
		
		$adList = $adModel->getAdvertiseAll();
		
		// use in php
		// $adList[n]->idx, id...
		
		$page = 'advertise';
		return view($page, array('page' => $page, 'adList' => $adList['data']));
	}
	
	
	public function indexModify(){
		$adModel = new AdvertiseModel();
		$ad_idx = Request::input('idx');
		
		$info = $adModel->getAdvertiseByIdx($ad_idx);
		
		$page = 'advertise_modify';
		return view($page,
				array(	'page' => $page,
						'info' => $info['data'][0],
						'idx' => $ad_idx));
	}
	
	public function update(){
		$adModel = new AdvertiseModel();
		
		$idx = Request::input('idx');
		
		// temp
		$name = Request::input('name');
		$website_link = Request::input('link');
		//$image = Request::input('image');
		$alt = Request::input('comment');
		
		
		
		
		
		
		// session
		
		
		
		
		
		
		$result = $adModel->update($idx, $name, $website_link, $image, $alt);
		
		header('Content-Type: application/json');
		echo json_encode($result);
	}
}