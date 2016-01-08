<?php
namespace App\Http\models;
use DB;

include_once dirname(__FILE__)."/../function/baseFunction.php";

class AdvertiseModel{
	/*
	// create도 필요없다? ㅠㅠ
	function create($id, $name, $image, $website_link, $alt){
		if (!(inputErrorCheck($id, 'id')
			&& inputErrorCheck($name, 'name')
			&& inputErrorCheck($image, 'image')
			&& inputErrorCheck($website_link, 'website_link')
			&& inputErrorCheck($alt, 'alt')))
			return;
		
		$result = DB::table('advertise')->insertGetId(
			array(	'id' => $id,
					'name' => $name,
					'image' => $image,
					'website_link' => $website_link,
					'alt' => $alt,
					'upload' => DB::raw('now()')));
		
		// img..
		
		return array('code' => 1, 'msg' => 'created', 'data' => $result);
	}
	*/
	
	function update($idx, $name, $website_link, $image, $alt){
		if (!(inputErrorCheck($idx, 'idx')
			&& inputErrorCheck($name, 'name')
			&& inputErrorCheck($website_link, 'website_link')
			&& inputErrorCheck($image, 'image')
			&& inputErrorCheck($alt, 'alt')))
			return;
		
		$result = DB::update('update advertise set name=?, website_link=?, image=?, alt=?, upload=now() where idx=?',
			array($name, $website_link, $image, $alt, $idx));
		
		if ($result == true)
			return array('code' => 1, 'msg' => 'update success', 'data' => $result);
		else
			return array('code' => 0, 'msg' => 'update failure');
	}
	
	/*
	// delete는 필요없는걸로!
	function delete(){
		return;
	}
	*/
	
	function getAdvertiseAll(){
		$result = DB::select('select idx, id, name, image from advertise');
		
		return array('code' => 1, 'msg' => 'success', 'data' => $result);
	}
	
	function getAdvertiseByIdx($idx){
		$result = DB::select('select id, image, website_link, name, alt from advertise where idx=?', array($idx));
		
		return array('code' => 1, 'msg' => 'success', 'data' => $result);
	}
}