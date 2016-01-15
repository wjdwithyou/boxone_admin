<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\models\AdvertiseModel;
use Request;

class AdvertiseController extends Controller{
	public function index(){
		if (session_id() == '')
			session_start();
		
		if (!isset($_SESSION['idx'])){
			echo ("no session");
			return;
		}
		$log_id=$_SESSION['id'];
		
		$adModel = new AdvertiseModel();
		
		$adList = $adModel->getAdvertiseAll();
		// use in php
		// $adList[n]->idx, id...
		
		//echo(mb_detect_encoding($adList['data'][0]->name));
		//return;
		
		$page = 'advertise';
		return view($page, array('page' => $page, 'log_id' => $log_id , 'adList' => $adList['data']));
	}
	
	/*
	public function indexNew(){
		if (session_id() == '')
			session_start();
		
		if (!isset($_SESSION['idx'])){
			echo ("no session");
			return;
		}
		//echo ($_SESSION['id']);
		
		$page = 'advertise_new';
		return view($page, array('page' => $page));
	}
	*/
	
	public function indexModify(){
		if (session_id() == '')
			session_start();
		
		if (!isset($_SESSION['idx'])){
			echo ("no session");
			return;
		}
		//echo ($_SESSION['id']);
		
		$adModel = new AdvertiseModel();
		$ad_idx = Request::input('idx');
		
		$info = $adModel->getAdvertiseByIdx($ad_idx);
		
		$page = 'advertise_modify';
		return view($page,
				array(	'page' => $page,
						'info' => $info['data'][0],
						'idx' => $ad_idx));
	}
	
	public function create(){
		if (session_id() == '')
			session_start();
		
		if (!isset($_SESSION['idx'])){
			echo ("no session");
			return;
		}
		//echo ($_SESSION['id']);
		
		$adModel = new AdvertiseModel();
		
		$id = Request::input('location');
		$name = Request::input('name');
		$website_link = Request::input('link');
		$alt = Request::input('comment');
		
		$image = Request::file('img');
		/*
		if (Request::hasFile('img')){
			$image = Request::file('img');
		}
		else{
			$image = "";
		}
		*/
		
		// session additional?
		
		$admin_last = $_SESSION['id'];
		$result = $adModel->create($admin_last, $id, $name, $website_link, $image, $alt);
		
		header('Content-Type: application/json');
		echo json_encode($result);
	}
	
	public function update(){
		if (session_id() == '')
			session_start();
		
		if (!isset($_SESSION['idx'])){
			echo ("no session");
			return;
		}
		//echo ($_SESSION['id']);
		
		$adModel = new AdvertiseModel();
		
		$idx = Request::input('idx');
		
		$name = Request::input('name');
		$website_link = Request::input('link');
		$alt = Request::input('comment');
		
		$image = Request::file('img');
		/*
		if (Request::hasFile('img')){
			$image = Request::file('img');
		}
		else{

			$image = "";

		}
		*/
		
		if (session_id() == '')
			session_start();
		
		if (!isset($_SESSION['idx'])){
			header('Content-Type: application/json');
			echo json_encode(array('code' => 0, 'msg' => 'not logined'));
		}
		else{
			$admin_last = $_SESSION['id'];
			$result = $adModel->update($admin_last, $idx, $name, $website_link, $image, $alt);
			
			header('Content-Type: application/json');
			echo json_encode($result);
		}
	}
	
	public function setEmpty(){
		if (session_id() == '')
			session_start();
		
		if (!isset($_SESSION['idx'])){
			echo ("no session");
			return;
		}
		//echo ($_SESSION['id']);
		
		$adModel = new AdvertiseModel();
		$idx = Request::input('idx');
		
		$admin_last = $_SESSION['id'];
		$result = $adModel->setEmpty($admin_last, $idx);
		
		header('Content-Type: application/json');
		echo json_encode($result);
	}
}