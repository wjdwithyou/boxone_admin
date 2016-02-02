<?php
namespace App\Http\models;
use DB;

// include?

// 160202 J.Style
// No comment.
class ProductModel{
	// 160202 J.Style
	// No comment.
	function getProductAll(){
		$product = DB::select('select idx, name from product');
		
		return array('code' => 1, 'msg' => 'success', 'data' => $product);
	}
	
	// 160202 J.Style
	// No comment.
	function getHotdealAll(){
		$hotdeal = DB::select('select idx, name from hotdeal_product');
		
		return array('code' => 1, 'msg' => 'success', 'data' => $hotdeal);
	}
}