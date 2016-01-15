<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\models\NotifyModel;
use Request;
header("Content-Type: text/html; charset=UTF-8");

class NotifyController extends Controller{
	public function test(){
		$page = 'notify';
		
		$noModel = new NotifyModel();
		$noList = $noModel -> getNotifyAll();
		// all
		
		return view($page, array('page' => $page, 'noList'=>$noList['data']));
	}
	public function addNotify(){
		if (session_id() == '')
			session_start();
		
		if (!isset($_SESSION['idx'])){
			echo ("no session");
			return;
		}
		
		$noModel = new NotifyModel(); 	
			
		$nickname = $_SESSION['id'];
		$contents = Request::input('contents');
		
		$result = $noModel->addNotify($nickname, $contents);
		
		header('Content-Type: application/json');
		echo json_encode($result);
		
		
		//return view($page, array('page' => $page, 'num' => $num));

	}
}
	
