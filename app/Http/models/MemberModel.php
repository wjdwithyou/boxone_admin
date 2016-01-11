<?php

namespace App\Http\models;
use DB;

// include baseFunc?

class MemberModel{
	function login($id, $pw){
		// 일단은 hash 안쓴다..
		$target_member = DB::select('select * from admin where id=? and pw=?', array($id, $pw));
		
		if (count($target_member) > 0)
			return array('code' => 1, 'data' => $target_member);
		else
			return array('code' => 0, 'data' => "login failure");
	}
}