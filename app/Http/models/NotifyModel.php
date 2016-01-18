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
	function delNotify($idx){
		
		$result = DB::delete('delete from admin_community where idx=?', array($idx));
		
		return array('code' => 1, 'msg' => 'success', 'data' => $result);
	}
	function modNotify($idx, $contents){
		if (!(inputErrorCheck($idx, 'idx')
			&& inputErrorCheck($contents, 'contents')))
			return;
			
		$result = DB::update('update admin_community set contents=?, upload=now() where idx=?',
					array($contents, $idx));
		if ($result == true)
			return array('code' => 1, 'msg' => 'update success', 'data' => $result);
		else
			return array('code' => 0, 'msg' => 'update failure');	
	}
}