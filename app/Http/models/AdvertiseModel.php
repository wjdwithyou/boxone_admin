<?php
namespace App\Http\models;
use DB;
use AWS;

include_once dirname(__FILE__)."/../method/baseFunction.php";

class AdvertiseModel{
	function create($admin_last, $id, $name, $website_link, $image, $alt){
		if (!(inputErrorCheck($admin_last, 'admin_last')
			&& inputErrorCheck($id, 'id')
			&& inputErrorCheck($name, 'name')
			&& inputErrorCheck($website_link, 'website_link')
			&& inputErrorCheck($image, 'image')
			&& inputErrorCheck($alt, 'alt')))
			return;
		
		// need id redunduncy check?
		
		$result_f = DB::table('advertise')->insertGetID(
				array(	'admin_last' => $admin_last,
						'id' => $id,
						'name' => $name,
						'website_link' => $website_link,
						'alt' => $alt,
						'upload' => DB::raw('now()')
				));
		
		$rt = DB::select('select idx, upload from advertise where id=?', array($id));
		
		
		
		$s3AdvAdr = "https://s3-ap-northeast-1.amazonaws.com/boxone-image/advertise/";
		$ext = $image->getClientOriginalExtension();	// 파일 확장자 얻어오기
		
		$img_name = $rt[0]->idx."_".$rt[0]->upload.".".$ext;
		
		$img_adr = $s3AdvAdr.$img_name;
		
		$result_s = DB::update('update advertise set image=? where idx=?', array($img_adr, $rt[0]->idx));
		
		$result = ($result_f && $result_s)? true: false;
		
		
		
		$s3 = AWS::createClient('s3');
			
		$s3->putObject(array(
				'Bucket'		=> 'boxone-image',
				'Key'			=> 'advertise/'.$img_name,
				'SourceFile'	=> $image,
		));
		
		return array('code' => 1, 'msg' => 'created', 'data' => $result);
	}
	
	function update($admin_last, $idx, $name, $website_link, $image, $alt){
		if (!(inputErrorCheck($admin_last, 'admin_last')
			&& inputErrorCheck($idx, 'idx')
			&& inputErrorCheck($name, 'name')
			&& inputErrorCheck($website_link, 'website_link')
			//&& inputErrorCheck($image, 'image')
			&& inputErrorCheck($alt, 'alt')))
			return;
		
		if ($image){
			$result_f = DB::update('update advertise set admin_last=?, name=?, website_link=?, alt=?, upload=now() where idx=?',
					array($admin_last, $name, $website_link, $alt, $idx));
			
			$time = DB::select('select upload from advertise where idx=?', array($idx));
			
			
			
			// delete before image from s3
			$s3 = AWS::createClient('s3');
			
			$before = $s3->getIterator('ListObjects', array(
					'Bucket'	=> 'boxone-image',
					'Prefix'	=> 'advertise/'.$idx.'_'
			));
			
			foreach ($before as $i){
				$s3->deleteObject(array(
						'Bucket'	=> 'boxone-image',
						'Key'		=> $i['Key']		// check
				));
			}
			
			
			
			// add new image to s3
			$s3AdvAdr = "https://s3-ap-northeast-1.amazonaws.com/boxone-image/advertise/";
			$ext = $image->getClientOriginalExtension();	// 파일 확장자 얻어오기
			
			$img_name = $idx."_".$time[0]->upload.".".$ext;
			$img_adr = $s3AdvAdr.$img_name;
			
			$result_s = DB::update('update advertise set image=? where idx=?', array($img_adr, $idx));
			
			
			
			$result = ($result_f && $result_s)? true: false;
			
			
			
			$s3 = AWS::createClient('s3');
			
			$s3->putObject(array(
					'Bucket'		=> 'boxone-image',
					'Key'			=> 'advertise/'.$img_name,
					'SourceFile'	=> $image,
			));
		}
		else{
			$result = DB::update('update advertise set admin_last=?, name=?, website_link=?, alt=?, upload=now() where idx=?',
					array($admin_last, $name, $website_link, $alt, $idx));
		}
		
		if ($result == true)
			return array('code' => 1, 'msg' => 'update success', 'data' => $result);
		else
			return array('code' => 0, 'msg' => 'update failure');
	}
	
	/*
	// delete는 필요없는걸로?
	function delete(){
		return;
	}
	*/
	
	function setEmpty($admin_last, $idx){	// not delete
											// just delete image, website_link, name, alt (+id?)
		if (!(inputErrorCheck($admin_last, 'admin_last')
			&& inputErrorCheck($idx, 'idx')))
			return;
		
		$result = DB::update('update advertise set admin_last=? name=?, website_link=?, image=?, alt=?, upload=now() where idx=?',
				array($admin_last, '', '', '', '', $idx));
		
		// delete before image from s3
		$s3 = AWS::createClient('s3');
		
		$target = $s3->getIterator('ListObjects', array(
				'Bucket'	=> 'boxone-image',
				'Prefix'	=> 'advertise/'.$idx.'_'
		));
		
		foreach ($target as $i){
			$s3->deleteObject(array(
					'Bucket'	=> 'boxone-image',
					'Key'		=> $i['Key']		// check
			));
		}
		
		if ($result == true)
			return array('code' => 1, 'msg' => 'set empty success', 'data' => $result);
		else
			return array('code' => 0, 'msg' => 'set empty failure');
	}
	
	function getAdvertiseAll(){
		$result = DB::select('select idx, id, name, image, upload, admin_last from advertise');
		
		return array('code' => 1, 'msg' => 'success', 'data' => $result);
	}
	
	function getAdvertiseByIdx($idx){
		// need input check?
		
		$result = DB::select('select id, image, website_link, name, alt, upload, admin_last from advertise where idx=?', array($idx));
		
		return array('code' => 1, 'msg' => 'success', 'data' => $result);
	}
}