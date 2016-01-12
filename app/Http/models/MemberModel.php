<?php

namespace App\Http\models;
use DB;
use Hash;

// include baseFunc?

class MemberModel{
	
	// 관리자 계정 만들때만 사용
	function create($id, $pw){
		// inputErrorCheck
		
		$encrypt = Hash::make($pw);
		
		if (!(Hash::check($pw, $encrypt))){
			if (Hash::needsRehash($encrypt))
				$encrypt = Hash::make($pw);
		}
		
		$member_idx = DB::table('admin')->insertGetId(
			array(
				'id'=>$id,
				'pw'=>$encrypt
			)	
		);
		
		if ($member_idx > 0)
			return array('code' => 1, 'data' => $member_idx);
		else
			return array('code' => 0, 'data' => 'error in MemberModel::create()');
	}
	
	function login($id, $pw){
		$target_member = DB::select('select * from admin where id=?', array($id));
		
		if (count($target_member) > 0 && Hash::check($pw, $target_member[0]->pw))
			return array('code' => 1, 'data' => $target_member);
		else
			return array('code' => 0, 'data' => 'login failure');
	}
}