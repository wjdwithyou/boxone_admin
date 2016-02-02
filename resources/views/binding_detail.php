<div class="modal-body">

<div class="type_album">
	<div class="row">
	<?php for($i=0 ; $i < count($detail) ; $i++) :?>
		<div class="col-sm-6 col-md-3">
			<div class="thumbnail bind">
			  	<div class="check">
					<img onclick="test(<?=$i?>);" class="check_img img_<?=$i?>" style="cursor:pointer" src="http://localhost:8000/img/heart.png">
				</div>
				<img class="img_thumb" src="<?=$detail[$i]->img?>" alt="...">
				<div class="caption">
					
					<a><?=$detail[$i]->name?></a><br>
					브랜드 : <?= $detail[$i]->brand?><br>        
				   	상품코드 : <?= $detail[$i]->idx?><br>
				   	가격 : <?= $detail[$i]->price?>
			       	<p id="price_<?=$i?>" hidden><?=$detail[$i]->price?></p>
			       	<p id="idx_pro_<?=$i?>" hidden><?= $detail[$i]->idx?></p>
			       	<p id="ifbest_<?=$i?>" hidden><?=$detail[$i]->isbest?></p>
					<p id="b_idx_<?=$i?>" hidden><?=$detail[$i]->binding?></p> 
					<p id="item_type_<?=$i?>" hidden><?=$detail[$i]->item_type?></p>
				</div>
		    </div>
		  </div>
	<?php endfor;?>
	</div>
</div>
</div>
<div class="modal-footer">
        <span id="cancel_btn"><button type="button" class="btn btn-default" data-dismiss="modal">취소</button></span>
        <span id="update_btn" hidden><button type="button" class="btn btn-default" data-dismiss="modal" onclick="update_btn();">취소2</button></span>
        <button type="button" onclick ="proDel(<?=count($detail)?>)" class="btn btn-primary">삭제</button>
</div>