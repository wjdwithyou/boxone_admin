<?php
namespace App\Http\models;
use DB;
use AWS;

include_once dirname(__FILE__)."/../method/baseFunction.php";

class MappingModel{
	function getSmallCategory(){
		$result = DB::select('select idx, name, medium_idx from category_small');
		
		return array('code' => 1, 'msg' => 'success', 'data' => $result);
	}
	function getAllbrand(){
		$result = DB::select('select brand from product union select brand from hotdeal_product');
		return array('code' => 1, 'msg' => 'success', 'data' => $result);
	}
	function getBrand($category){
		$result = DB::select('select distinct brand from product where cate_small=? order by brand asc', array($category));
		if ($result == true)
			return array('code' => 1, 'msg' => 'getbrand success', 'data' => $result);
		else
			return array('code' => 0, 'msg' => 'getbrand failure');
	}

	function search($category, $name, $brand){
		$db = 'select prod_id, cate_small, name, brand, img, binding, isbest, price from product';
		$db_h = 'select prod_id, cate_small, name, brand, img, binding, isbest, priceO as price from hotdeal_product';
		$db_name = "name like '%$name%'";
		$db_brand = "brand = '$brand'";
		$db_cate = "cate_small = '$category'";
		
		if($category==0){ //전체카테고리
			if($brand=='0'){ //전체카테고리+전체브랜드
				if($name==''){ //전체카테고리+전체브랜드+이름미입력
				$result = DB::select($db);
				}
				else{//전체카테고리+전체브랜드+이름입력
				$result = DB::select($db." where ".$db_name." union ".$db_h." where ".$db_name);
				}
			}
			else{//전체카테고리+선택브랜드
				if($name==''){ //전체카테고리+선택브랜드+이름미입력
				$result = DB::select($db." where ".$db_brand." union ".$db_h." where ".$db_brand);
				}
				else{ //전체카테고리+선택브랜드+이름입력
				$result = DB::select($db." where ".$db_brand." and ".$db_name." union ".$db_h." where ".$db_brand." and ".$db_name);
				}
			}
		}
		else{ //선택카테고리
			if($brand=='0'){//선택카테고리+전체브랜드+이름미입력
				if($name==''){
				$result = DB::select($db." where ".$db_cate." union ".$db_h." where ".$db_cate);
				echo "요기5";
				}
				else{//선택카테고리+전체브랜드+이름입력
				$result = DB::select($db." where ".$db_cate." and ".$db_name." union ".$db_h." where ".$db_cate." and ".$db_name);
				}
			}
			else{
				if($name=''){//선택카테고리+선택브랜드+미입력
				$result = DB::select($db." where ".$db_cate." and ".$db_brand." union "
				.$db_h." where ".$db_cate." and ".$db_brand);
				}
				else{ //선택카테고리+선택브랜드+이름입력
				$result = DB::select($db." where ".$db_cate." and ".$db_brand." and ".$db_name." union "
				.$db_h." where ".$db_cate." and ".$db_brand." and ".$db_name);
				}	
			}
		}
		$bind_cnt=0;
		for($i=0; $i<count($result); $i++){
			if($result[$i]->isbest==1) $bind_cnt++;
		}
		//print_r ($bind_cnt);
		

		return array('code' => 1, 'msg' => 'search success', 'data' => $result, 'bind_cnt'=>$bind_cnt);
		
	}

	function getBinding($b_idx){
		$db = 'select prod_id, cate_small, name, brand, img, binding, price from product';
		
		$result = DB::select('select prod_id from mapping_product where idx='.$b_idx);
		print_r ("결과아");
		print_r ($result);		
		//print_r ($asdfasdf);
		if($result==true)
			return array('code'=>1, 'msg' => 'detail success', 'data' => $result);
		else
			return array('code'=>0, 'msg' => 'detail fail');
	}

	
	function changeCategory($category){
		if($category=='0'){
			$result = DB::select("select brand from product union select brand from hotdeal_product order by brand ASC");
		}
		else{
		$result = DB::select("select brand from product where cate_small=? union select brand from hotdeal_product where cate_small=? order by brand ASC", array($category, $category));
		}
		
		
		if ($result == true)
			return array('code' => 1, 'msg' => 'search success', 'data' => $result);
		else
			return array('code' => 0, 'msg' => 'category failure');

	}
	function binding($cnt, $list, $min_idx, $f_idx, $f_pro, $min_change){
		$idx = DB::select('select max(idx) as m from mapping_product');
		$idx = ($idx[0]->m)+1;
		$list = array_filter($list);
		if($f_idx==0){
			for($i=0 ; $i<count($list) ; $i++){
				$result = DB::insert('insert into mapping_product (idx, prod_id) values (?, ?)',array($idx, $list[$i]));
				$result2= DB::update('update product set binding=? where prod_id=?',array($idx, $list[$i]));
				$result3= DB::update('update hotdeal_product set binding=? where prod_id=?',array($idx, $list[$i]));
				//최저가면 1넣기
				$min=DB::update('update product set isbest=1 where prod_id=?',array($min_idx));
				$min=DB::update('update hotdeal_product set isbest=1 where prod_id=?',array($min_idx));
			}
		}
		else{
			for($i=1 ; $i<=count($list) ; $i++){		
				$result = DB::insert('insert into mapping_product (idx, prod_id) values (?, ?)',array($f_idx, $list[$i]));
				$result2= DB::update('update product set binding=? where prod_id=?',array($f_idx, $list[$i]));
				$result3= DB::update('update hotdeal_product set binding=? where prod_id=?',array($f_idx, $list[$i]));
				if($min_change==1){ //묶은상품+최저가가 변하면
					$min=DB::update('update product set isbest=1 where prod_id=?',array($min_idx));
					$min=DB::update('update hotdeal_product set isbest=1 where prod_id=?',array($min_idx));
					$min=DB::update('update product set isbest=0 where prod_id=?',array($f_pro));
					$min=DB::update('update hotdeal_product set isbest=0 where prod_id=?',array($f_pro));
	
				}	
			}
		}
		return array('code' => 1, 'msg' => 'binding success', 'data' => $result);
	}
	
}