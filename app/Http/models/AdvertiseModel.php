<?php
namespace App\Http\models;
use DB;
use AWS;

include_once dirname(__FILE__)."/../method/baseFunction.php";

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
	
	function update($admin_last, $idx, $name, $website_link, $image, $alt){
		if (!(inputErrorCheck($admin_last, 'admin_last')
			&& inputErrorCheck($idx, 'idx')
			&& inputErrorCheck($name, 'name')
			&& inputErrorCheck($website_link, 'website_link')
			&& inputErrorCheck($image, 'image')
			&& inputErrorCheck($alt, 'alt')))
			return;
		
		/*
		$ext = $image->getClientOriginalExtension();	// 파일 확장자 얻어오기
		$img_name = $idx."_img.".$ext;	// 저장될 파일명
		*/

		// 임시방편
		$img_name = $idx."_img."."png";	// 전부 png로 바꿔서 저장!
										// gif같은거 처리하려면 결국 바꾸긴 해야한다..
		
		$img_adr = "https://s3-ap-northeast-1.amazonaws.com/boxone-image/advertise/".$img_name;	// 저장될 주소
		
		$result = DB::update('update advertise set admin_last=?, name=?, website_link=?, image=?, alt=?, upload=now() where idx=?',
			array($admin_last, $name, $website_link, $img_adr, $alt, $idx));
		
		$s3 = AWS::createClient('s3');
		 
		//$image_name = $document_idx.'_image'.$image_num.'.'.$ext;
		$s3->putObject(array(
			'Bucket' 	=> 'boxone-image',
			'Key'		=> 'advertise/'.$img_name,
			'SourceFile'	=> $image,
		));
		
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
		$result = DB::select('select idx, id, name, image, upload, admin_last from advertise');
		
		return array('code' => 1, 'msg' => 'success', 'data' => $result);
	}
	
	function getAdvertiseByIdx($idx){
		$result = DB::select('select id, image, website_link, name, alt, admin_last from advertise where idx=?', array($idx));
		
		return array('code' => 1, 'msg' => 'success', 'data' => $result);
	}
}