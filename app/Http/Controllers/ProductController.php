<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use DB;

class ProductController extends Controller {
	public function product(){
		$page = 'productupdate';
		return view($page, array('page' => $page));
	}
	
	public function insertProd()
	{
		ob_start();
		ob_end_clean();
		$this->printMsg('상품 데이터 입력 시작<br>');

		$currency = 1211.20;

		// 테이블 목록 가져오기
		$tableInfo = DB::connection('sqlsrv')->select("SELECT Distinct TABLE_NAME FROM information_schema.TABLES WHERE TABLE_NAME like 'cgProdMain_%'");
		$cnt_prdtIns = $cnt_prdtUpd = $cnt_hotIns = $cnt_hotUpd = $cnt = 0;

		foreach($tableInfo as $tableList)
		{
			// mssql에서 상품 목록 가져오기
			$table = $tableList->TABLE_NAME;			
			$tablePrice = 'cgPrice'.substr($table, 6);
			$prdtInfo = DB::connection('sqlsrv')->select("SELECT * FROM $table");

			$this->printMsg($table.'에서 총 '.count($prdtInfo).'개의 상품이 검색되었습니다.');

			foreach($prdtInfo as $prdtList)
			{
				// 할인이 없을 시 product 테이블에
				if ($prdtList->Lprice == $prdtList->Sprice)
				{
					// 해당 정보가 없으면 isnert, 있으면 update
					$cnt = DB::connection('mysql')->select("SELECT count(*) as cnt FROM product WHERE prod_id = ?", array($prdtList->ProdInc));
					if ($cnt[0]->cnt == 0)
					{
						$result = DB::connection('mysql')->delete("DELETE FROM hotdeal_product WHERE prod_id=?", array($prdtList->ProdInc)); 
						$result = DB::connection('mysql')->table('product')->insertGetId(
							array(
								'mall_id' => $prdtList->MallID,
								'mall_kind' => $prdtList->MallKind,
								'prod_id' => $prdtList->ProdInc,
								'cate_small' => $prdtList->Ccode3,
								'brand' => $prdtList->Brand,
								'hit_count' => 0,
								'bookmark_count' => 0,
								'name' => $prdtList->PnameD,
								'price' => floor($prdtList->Lprice * $currency),
								'img' => $prdtList->PimgD								
							)
						);
						$cnt_prdtIns++;
						$this->printMsg(" $prdtList->MallID 의 $prdtList->PnameD 가 product 테이블에 생성되었습니다.");
					}
					else
					{
						$result = DB::update("UPDATE product SET brand=?, name=?, price=?, img=? WHERE prod_id=?", 
							array($prdtList->Brand, $prdtList->PnameD, floor($prdtList->Lprice * $currency), $prdtList->PimgD, $prdtList->ProdInc)); 
						$cnt_prdtUpd++;
						$this->printMsg(" $prdtList->MallID 의 $prdtList->PnameD 가 product 테이블에 업데이트 되었습니다.");
					}	
				}
				// 할인이 있을 시 hotdeal_product 테이블에 insert
				else
				{
					// 위와 동일
					$cnt = DB::connection('mysql')->select("SELECT count(*) as cnt FROM hotdeal_product WHERE prod_id = ?", array($prdtList->ProdInc));
					$saleP = floor((($prdtList->Lprice - $prdtList->Sprice) / $prdtList->Lprice)*100);
					if ($cnt[0]->cnt == 0)
					{
 						$result = DB::connection('mysql')->delete("DELETE FROM product WHERE prod_id=?", array($prdtList->ProdInc));
						$result = DB::connection('mysql')->table('hotdeal_product')->insertGetId(
							array(
								'mall_id' => $prdtList->MallID,
								'mall_kind' => $prdtList->MallKind,
								'prod_id' => $prdtList->ProdInc,
								'cate_small' => $prdtList->Ccode3,
								'brand' => $prdtList->Brand,
								'hit_count' => 0,
								'bookmark_count' => 0,
								'name' => $prdtList->PnameD,
								'priceO' => floor($prdtList->Lprice * $currency),
								'priceS' => floor($prdtList->Sprice * $currency),
								'saleP' => $saleP,
								'img' => $prdtList->PimgD								
							)
						);
						$cnt_hotIns++;
						$this->printMsg(" $prdtList->MallID 의 $prdtList->PnameD 가 hotdeal_product 테이블에 생성되었습니다.");
					}	
					else
					{
						$result = DB::update("UPDATE hotdeal_product SET brand=?, name=?, priceO=?, priceS=?, saleP=?, img=? WHERE prod_id=?", 
								array($prdtList->Brand, $prdtList->PnameD, floor($prdtList->Lprice * $currency), floor($prdtList->Sprice * $currency), $saleP, $prdtList->PimgD, $prdtList->ProdInc)); 
						$cnt_hotUpd++;
						$this->printMsg(" $prdtList->MallID 의 $prdtList->PnameD 가 hotdeal_product 테이블에 업데이트 되었습니다.");
					}
				}
			}
		}
		echo "$cnt_prdtIns products inserted and $cnt_prdtUpd products updated in table Product.\n";
		echo "$cnt_hotIns products inserted and $cnt_hotUpd products updated in table Hotdeal_product.";
		echo "<script>$('#loading').hide();</script>";
	}

	function printMsg($msg)
	{
		echo $msg.'<br>';
		echo str_pad('',256);
		ob_flush();
		flush();
	}
}
