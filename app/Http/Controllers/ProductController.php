<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use DB;

class ProductController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		$page = 'product';
		return view($page, array('page' => $page));
	}
	
	public function insertProd()
	{
		$conn = mssql_connect('cafe24', 'cstourplatform', 'q1w2e3r4!@cosmos99');
		
		if ($conn)
		{
			echo "Connection established.\n";
		
			$query1 = mssql_query("SELECT Distinct TABLE_NAME FROM information_schema.TABLES WHERE TABLE_NAME like 'cgProdMain_%'");
			$i = 0;
			$j = 0;
			while ($data1 = mssql_fetch_array($query1))
			{
				$table = $data1['TABLE_NAME'];
				$query2 = mssql_query("SELECT ProdInc, MallKind, MallID, Ccode3, Brand, PnameD, Lprice, PimgD FROM $table");
				while ($data2 = mssql_fetch_array($query2))
				{
					$cnt = DB::select("SELECT count(*) as cnt FROM product WHERE prod_id = ".$data2['ProdInc']);
					if ($cnt[0]->cnt == 0)
					{ 
						$result = DB::table('product')->insertGetId(
							array(
								'mall_id' => $data2['MallID'],
								'mall_kind' => $data2['MallKind'],
								'prod_id' => $data2['ProdInc'],
								'cate_small' => $data2['Ccode3'],
								'brand' => $data2['Brand'],
								'hit_count' => 0,
								'bookmark_count' => 0,
								'name' => $data2['PnameD'],
								'price' => floor($data2['Lprice'] * 1204.40),
								'img' => $data2['PimgD']								
							)
						);
						$i++;
					}
					else
					{
						$result = DB::update("UPDATE product SET brand=?, name=?, price=?, img=? WHERE prod_id=? and name=''", 
							array($data2['Brand'], $data2['PnameD'], $this->makeMoney($data2['Lprice']), $data2['PimgD'], $data2['ProdInc'])); 
						$j++;
					}
				}
			}
			echo "$i products inserted and $j products updated.";
		}
		else
		{
			echo "Connection could not be established.\n";
			die (print_r(sqlsrv_errors(), true));
		}
		
		mssql_close($conn);
	}

	function makeMoney($num)
	{
		$num = floor($num*1204.40)."";
		$str = "";
		while (strlen($num) > 3)
		{
			$str = substr($num, strlen($num)-3, 3).",".$str;
			$num = substr($num, 0, strlen($num)-3);
		}
		$str = $num.",".substr($str,0,strlen($str)-1);
			
		return $str;
	}
}
