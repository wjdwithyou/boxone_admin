<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\models\NotifyModel;
use Request;
header("Content-Type: text/html; charset=UTF-8");

class MemberController extends Controller{
	public function member(){
		$page = 'member';
		

		
		return view($page, array('page' => $page));
	}
}