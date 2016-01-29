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
		$result = DB::select('select brand from product union select brand from hotdeal_product order by brand ASC');
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
		$db = 'select "p" as item_type, idx, cate_small, name, brand, img, binding, isbest, price from product';
		$db_h = 'select "h" as item_type, idx, cate_small, name, brand, img, binding, isbest, priceO as price from hotdeal_product';
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
		$db = 'select "p" as item_type, idx, name, brand, img, binding, isbest, price from product';
		$db_h = 'select "h" as item_type, idx, name, brand, img, binding, isbest, priceO as price from hotdeal_product';
		
		$result = DB::select($db.' where binding=? union '.$db_h.' where binding=? order by price ASC', array($b_idx, $b_idx));
	
		
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
	function binding($cnt, $list, $min_idx, $f_idx, $f_pro, $min_change, $min_type){
		$idx = DB::select('select max(idx) as m from mapping_product');
		$idx = ($idx[0]->m)+1;
		$list = array_filter($list);
		
		//print_r ($list);
		
		if($f_idx==0){
			for($i=0 ; $i<count($list) ; $i++){
				$result = DB::insert('insert into mapping_product (idx, prod_idx, item_type) values (?, ?, ?)',array($idx, $list[$i][0], $list[$i][1]));
				if($list[$i][1]=='p') $result2= DB::update('update product set binding=? where idx=?',array($idx, $list[$i][0]));
				else $result3= DB::update('update hotdeal_product set binding=? where idx=?',array($idx, $list[$i][0]));
			}//최저가면 1넣기
			if($min_type=='p') $min=DB::update('update product set isbest=1 where idx=?',array($min_idx));
			else $min=DB::update('update hotdeal_product set isbest=1 where idx=?',array($min_idx));
		}
		else{
			for($i=1 ; $i<=count($list) ; $i++){		
				$result = DB::insert('insert into mapping_product (idx, prod_idx, item_type) values (?, ?, ?)',array($f_idx, $list[$i][0], $list[$i][1]));
				if($list[$i][1]=='p') $result2= DB::update('update product set binding=? where idx=?',array($f_idx, $list[$i][0]));
				else $result3= DB::update('update hotdeal_product set binding=? where idx=?',array($f_idx, $list[$i][0]));
				
				if($min_change==1){ //묶은상품+최저가가 변하면
					if($list[$i][1]=='p'){
						$min=DB::update('update product set isbest=1 where idx=?',array($min_idx));
						$min=DB::update('update product set isbest=0 where idx=?',array($f_pro));	
					}
					else{
						$min=DB::update('update hotdeal_product set isbest=1 where idx=?',array($min_idx));
						$min=DB::update('update hotdeal_product set isbest=0 where idx=?',array($f_pro));
					}
				}	
			}
		}
		return array('code' => 1, 'msg' => 'binding success', 'data' => $result);
	}
	
	function delBinding($list, $min_change, $min_idx, $min_type, $ori_min_idx, $ori_min_type){
			
		if($min_change==1){ //대표상품이 삭제되었을 경우
			if($ori_min_type=='p'){
				$min=DB::update('update product set isbest=0 and binding=0 where idx=?',array($ori_min_idx));
				if($min_type=='p'){
					$min=DB::update('update product set isbest=1 where idx=?',array($min_idx));
				}
				else{
					$min=DB::update('update hotdeal_product set isbest=1 where idx=?',array($min_idx));
				}
			}
			else{
				$min=DB::update('update hotdeal_product set isbest=0 and binding=0 where idx=?',array($ori_min_idxidx));
				if($min_type=='p'){
					$min=DB::update('update product set isbest=1 where idx=?',array($min_idx));
				}
				else{
					$min=DB::update('update hotdeal_product set isbest=1 where idx=?',array($min_idx));
				}
			}				
		}

		for($i=0 ; $i<count($list) ; $i++){
			$result=DB::delete('delete from mapping_product where prod_idx=? and item_type=?',array($list[$i][0],$list[$i][1]));
			if($list[$i][1]=='p'){
				$result=DB::update('update product set binding=0 where idx=?',array($list[$i][0]));
			}
			else{
				$result=DB::update('update hotdeal_product set binding=0 where idx=?',array($list[$i][0]));
			}
		}
		return array('code' => 1, 'msg' => 'delete success', 'data' => $result);
	}

	
}