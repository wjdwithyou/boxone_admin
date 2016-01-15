<?php
namespace App\Http\models;
use DB;
use AWS;
header("Content-Type: text/html; charset=UTF-8");
include_once dirname(__FILE__)."/../method/baseFunction.php";

class NotifyModel{
	function addNotify($nickname, $contents){
		if (!(inputErrorCheck($contents, 'contents')
			&& inputErrorCheck($nickname, 'nickname')))
			return;
		// need id redunduncy check?
		
		$result_f = DB::table('admin_community')->insertGetID(
				array(	'contents' => $contents,
						'nickname' => $nickname,
						'upload' => DB::raw('now()')
				));
		
		$rt = DB::select('select idx, upload from admin_community where nickname=?', array($nickname));
		
		return array('code' => 1, 'msg' => 'created', 'data' => $rt, 'nickname' => $nickname);
	}
	function getNotifyAll(){
		$result = DB::select('select idx, nickname, upload, contents from admin_community');
		
		return array('code' => 1, 'msg' => 'success', 'data' => $result);
	}
	
}