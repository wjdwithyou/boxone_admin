
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
<div class="center">-묶인상품-</div><br>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"></h4>
      </div>  
      <div id="detail_result">
	  </div>  
    </div>
  </div>
</div>
<!--binding products table-->
<div id="binding_product" class="type_album">
	<div class="row">
		<?php for($i=0 ; $i < count($proList) ; $i++) :?>
		<?php if($proList[$i]->binding!=0 && $proList[$i]->isbest==1) :?>   
		  <div class="col-sm-6 col-md-3">
		  	<div class="thumbnail">
			  	<div class="check">
					<img onclick="test(<?=$i?>);" class="check_img img_<?=$i?>" style="cursor:pointer" src="<?=$adr_ctr?>img/heart.png">
				</div>
				<img class="img_thumb" src="<?=$proList[$i]->img?>" alt="...">
				<div class="caption">
					<a data-toggle="modal" data-target="#exampleModal" style="cursor:pointer" onclick='detail(<?=$proList[$i]->binding?>)'>
						<?=$proList[$i]->name?>
					</a><br>
					브랜드 : <?= $proList[$i]->brand?><br>        
			      	상품코드 : <?= $proList[$i]->idx?><br>
			       	가격 : <?= $proList[$i]->price?>
			       	<p id="price_<?=$i?>" hidden><?= $proList[$i]->price?></p>
			       	<p id="idx_pro_<?=$i?>" hidden><?= $proList[$i]->idx?></p>
			       	<p id="m_img_<?=$i?>" hidden><?=$proList[$i]->isbest?></p>
					<p id="b_idx_<?=$i?>" hidden><?=$proList[$i]->binding?></p> 
					<p id="item_type_<?=$i?>" hidden><?=$proList[$i]->item_type?></p>
				</div>
		    </div>
		  </div>
		<?php endif;?>
		<?php endfor;?>
	</div>
</div>

<div class="center">-단일상품-</div><br>
<!--non binding products table-->
<div class="type_album">
	<div class="row">
		<?php for($i=0 ; $i < count($proList) ; $i++) :?>
		<?php if($proList[$i]->binding==0):?>   
		  <div class="col-sm-6 col-md-3">
		  	<div class="thumbnail">
			  	<div class="check">
					<img onclick="test(<?=$i?>);" class="check_img img_<?=$i?>" style="cursor:pointer" src="<?=$adr_ctr?>img/heart.png">
				</div>
			    <img class="img_thumb" src="<?=$proList[$i]->img?>">
			    <div class="caption">
					<?= $proList[$i]->name?><br>
					브랜드 : <?= $proList[$i]->brand?><br>        
				          상품코드 : <?= $proList[$i]->idx?><br>
				          가격 : <?= $proList[$i]->price?>
		          <p id="m_img_<?=$i?>" hidden><?=$proList[$i]->isbest?></p>
		          <p id="price_<?=$i?>" hidden><?= $proList[$i]->price?></p> 
		          <p id="idx_pro_<?=$i?>" hidden><?= $proList[$i]->idx?></p>
		          <p id="item_type_<?=$i?>" hidden><?=$proList[$i]->item_type?></p>
			    </div>
		    </div>
		  </div>
		<?php endif;?>
		<?php endfor;?>
	</div>
</div>


<script>
	
</script>
		