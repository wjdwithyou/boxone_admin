
	<?php
		header("Content-Type: text/html; charset=UTF-8");
		include ("libraries.php");
	?>


<style>
$("#chroom").append

	.row{
		margin-top: 30px;
	}
	.thumbnail{
		height: 300px;
		font-size: 11px;
	}
	.img_thumb{
		clear:right;
		margin-top: 0px;
		height: 180px !important;
	}
	.check{
		padding:3px;
		float: right;
	}
	.check_img{
		width:20px;
		height:20px;
	}
</style>

<p>총 <?=count($proList)?>개의 상품이 검색되었습니다.</p>
<p class="bind_pro"></p>
<button onclick="bind(<?=count($proList)?>);" class="btn btn-default">묶여라 얍!</button>
<br><br><br>
<div class="center">-묶인상품-</div>
<!--binding products table-->
<div class="type_album">
	<div class="row">
		<?php for($i=0 ; $i < count($proList) ; $i++) :?>
		<?php if($proList[$i]->binding!=0 && $proList[$i]->isbest==1) :?>   
		  <div class="col-sm-6 col-md-3">
		  	<div class="thumbnail">
			  	<div class="check">
					<img onclick="test(<?=$i?>);" class="check_img img_<?=$i?>" style="cursor:pointer" src="<?=$adr_ctr?>img/heart.png">
				</div>
				<p id="m_img_<?=$i?>" hidden><?=$proList[$i]->isbest?></p>
				<p id="b_idx_<?=$i?>" hidden><?=$proList[$i]->binding?></p>
				<img class="img_thumb" src="<?=$proList[$i]->img?>" alt="...">
				<div class="caption">
					<a style="cursor:pointer" onclick='detail(<?=$proList[$i]->binding?>)'><?= $proList[$i]->name?></a><br>
					브랜드 : <?= $proList[$i]->brand?><br>        
				          상품코드 : <p id="idx_pro_<?=$i?>" hidden><?= $proList[$i]->prod_id?></p><?= $proList[$i]->prod_id?><br>
				          가격 : <p id="price_<?=$i?>" hidden><?= $proList[$i]->price?></p><?= $proList[$i]->price?> 
				</div>
		    </div>
		  </div>
		<?php endif;?>
		<?php endfor;?>
	</div>
</div>

<div class="center">-단일상품-</div>
<!--non binding products table-->
<div class="type_album">
	<div class="row">
		<?php for($i=0 ; $i < count($proList) ; $i++) :?>
		<?php if($proList[$i]->binding==0):?>   
		  <div class="col-sm-6 col-md-3">
		  	<div class="thumbnail">
			  	<div class="check">
					<img onclick="test(<?=$i?>);" class="check_img img_<?=$i?>" style="cursor:pointer" src="<?=$adr_ctr?>img/heart.png">
				</div><p id="m_img_<?=$i?>" hidden><?=$proList[$i]->isbest?></p>
			    <img class="img_thumb" src="<?=$proList[$i]->img?>">
			    <div class="caption">
					<?= $proList[$i]->name?><br>
					브랜드 : <?= $proList[$i]->brand?><br>        
				          상품코드 : <p id="idx_pro_<?=$i?>" hidden><?= $proList[$i]->prod_id?></p><?= $proList[$i]->prod_id?><br>
				          가격 : <p id="price_<?=$i?>" hidden><?= $proList[$i]->price?></p><?= $proList[$i]->price?> 
			    </div>
		    </div>
		  </div>
		<?php endif;?>
		<?php endfor;?>
	</div>
</div>



		