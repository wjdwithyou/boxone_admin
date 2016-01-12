<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\models\MemberModel;
use Request;

// include baseFunc?

class LoginController extends Controller{
	public function index(){
		$page = 'login';
		return view($page, array('page' => $page));
	}
	
	public function login(){
		$mbModel = new MemberModel();
		
		$id = Request::input('id');
		$pw = Request::input('pw');
		
		$result = $mbModel->login($id, $pw);	// if you use create() instead of login(), you can make admin account.
		
		/*
		 * Things to do.
		 * Session
		if ($result['code'] == 1){
			if (session_id() == '')
				session_start();
			
			$_SESSION['idx'] = $result['data'][0]->idx;
			echo ($result['data'][0]->idx);
		}
		*/
		
		header('Content-Type: application/json');
		echo json_encode($result);
	}
}