<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\models\MappingModel;
use Request;

class MappingController extends Controller {
	public function mapping(){

		$mapModel = new MappingModel();
		
		$name = Request::input('name');
		$category = Request::input('category');
		$brand = Request::input('brand');
		
		$cateList = $mapModel->getSmallCategory();
		$page = 'mapping';
		$brandList = $mapModel->getAllbrand();
		
		if ($name==''&&$category==''&&$brand==''){
			$proList = array(
				"data" => array(),
				"data2" => array()
			);
		}
		else {
			$brandList = $mapModel->getAllbrand();
			$proList = $mapModel->search($category, $brand, $name);
		}
		
		return view($page, array('page'=>$page,
			'cateList'=>$cateList['data'],
			'brandList'=>$brandList['data'],
			'proList'=>$proList['data'],
			'proList_h'=>$proList['data2']
		));
	}
	public function search(){
		
		$proModel = new MappingModel();
		
		$category = Request::input('category');
		$name = Request::input('name');
		$brand = Request::input('brand');
		
		$proList = $proModel->search($category, $name, $brand);
		$page = 'mappingInfo';
		
		return view($page, array('page' => $page,
								 'proList' => $proList['data'],
								 'bind_cnt' => $proList['bind_cnt']
								 ));
		
	}
	public function changeCategory(){
		$brandModel = new MappingModel();
		$page = 'mapping';
		$category = Request::input('category');
		
		$brandList = $brandModel->changeCategory($category);
		echo json_encode($brandList);
		
		//return view($page, array('page'=>$page, 'brandList'=>$brandList['data']));
	}
	public function binding(){
		$cnt = Request::input('cnt'); //묶인상품갯수
		$list = Request::input('list'); //묶인상품 배열
		$min_idx = Request::input('min_idx'); //최저가 상품코드
		
		$f_idx = Request::input('f_idx');//대표상품의 binding 0이면 단일상문만묶임
		$f_pro = Request::input('f_pro');//대표상품의 pro_id
		$min_change = Request::input('min_change');//1이면 대표상품이 바뀜
		$min_type = Request::input('min_type');//최저가상품의 item_type
		
		$bindModel = new MappingModel();
		$bindList = $bindModel->binding($cnt, $list, $min_idx, $f_idx, $f_pro, $min_change, $min_type);
				
		//상품 업데이트후 검색
		
		$category = Request::input('category');
		$name = Request::input('name');
		$brand = Request::input('brand');
		
		$proModel = new MappingModel();
		$proList = $proModel->search($category, $name, $brand);


		$page='mappingInfo';
		return view($page, array('page' => $page,
								 'proList' => $proList['data']
								));		
	}
	
	public function bindingDetail(){
		$detailModel = new MappingModel();
		$page = 'binding_detail';
		
		$b_idx = Request::input('b_idx');
		
		$detail = $detailModel->getBinding($b_idx);
		
		return view($page, array('page'=>$page, 'detail'=>$detail['data']));
		
	}
	
	public function bindingDel(){
		$page = 'binding_detail';
		$list = Request::input('list');
		$min_change = Request::input('min_change');
		$min_idx = Request::input('min_idx');
		$min_type = Request::input('min_type');
		$ori_min_idx = Request::input('ori_min_idx');
		$ori_min_type = Request::input('ori_min_type');	
		$b_idx=Request::input('b_idx');	
		
		$delModel = new MappingModel();
		$dellist = $delModel->delBinding($list, $min_change, $min_idx, $min_type, $ori_min_idx, $ori_min_type);
		
		//상품 업데이트 후 검색
		/*
		$category = Request::input('category');
		$name = Request::input('name');
		$brand = Request::input('brand');
		
		$proModel = new MappingModel();
		$proList = $proModel->search($category, $name, $brand);

		*/
		$detailModel = new MappingModel();
		$b_idx = Request::input('b_idx');
		$page = 'binding_detail';
		$detail = $detailModel->getBinding($b_idx);

		
		return view($page, array('page'=>$page, 'detail'=>$detail['data']));
		
		
		
	}

}