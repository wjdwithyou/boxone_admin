<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\models\LoginModel;
use Request;

// include baseFunc?

class LoginController extends Controller{
	public function login(){
		$mbModel = new MemberModel();
		
		$id = Request::input('id');
		$pw = Request::input('pw');
		
		$result = mbModel->login($id, $pw);
		
		// impl.
		
		header('Content-Type: application/json');
		echo json_encode($result);
	}
}