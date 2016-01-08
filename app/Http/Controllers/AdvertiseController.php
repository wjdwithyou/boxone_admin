<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\models\AdvertiseModel;
//use Request;

class AdvertiseController extends Controller{
	public function index(){
		$adModel = new AdvertiseModel();
		
		$adList = $adModel->getAdvertiseAll();
		// cnt?
		
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
	
	
	/*
	// coming soon
	public function update(){
		$adModel = new AdvertiseModel();
		
		
	}
	*/
}