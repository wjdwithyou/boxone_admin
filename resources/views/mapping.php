<!DOCTYPE html>
<head>
		<?php
			header("Content-Type: text/html; charset=UTF-8");
			include ("libraries.php");
		?>
	<script src="<?=$adr_js?>mapping.js"></script>
	
	<link rel="stylesheet" type="text/css" href="mystyle.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

 <!-- jQuery 라이브러리 참조 -->
 

</head>
<body>
	
<?php include("header.php"); ?>
	<hr class="header_hr2"></hr>
	
	<div class="center">
	<img class="img_logo" src="<?=$adr_img?>advertise/boxone.png"/>
	</div>
		
	<div class="menu_nav center">
 	<ul class="nav nav-tabs nav-justified">
	  <li role="presentation" ><a href="<?= $adr_ctr ?>Advertise/index">Advertise</a></li>
	  <li role="presentation" class="active"><a href="#">Product mapping</a></li>
	  <li role="presentation" ><a href="<?= $adr_ctr ?>Notify/test">Notify</a></li>
	  <li role="presentation"><a href="<?= $adr_ctr ?>Member/member">Member</a></li>
	  <li role="presentation"><a href="<?= $adr_ctr ?>Product/product">Product update</a></li>
	</ul>
	</div>

	
	<div class="center">
		<table class="tb_search">
			<tr>
				<td><label for="id" class="control-label">카테고리</label></td>
				<td><select id="small" name="small" class="form-control" onchange="changebrand();">
					  <option value='0'>전체선택</option>
					  <?php for($i=0 ; $i < count($cateList) ; $i++) :?>
					  <option value='<?=$cateList[$i]->idx?>'><?= $cateList[$i]->name?></option>
					  <?php endfor;?>
					</select></td>
				<td><label for="id" class="control-label">브랜드</label></td>
				<td><select id="brand" class="form-control">
					 <option value='0'>전체선택</option>
					  <?php for($i=0 ; $i < count($brandList) ; $i++) :?>
					  <option value='<?=$brandList[$i]->brand?>'><?=$brandList[$i]->brand?></option>
					  <?php endfor;?>
					</select></td>
				<td><label class="control-label">이름</label></td>
				<td><input class="form-control" id="product_name"></td>
				<td><button onclick="proSearch();" class="btn btn-default">검색</button></td>
			</tr>
		</table>
	</div>
	<div class="center">
		
		<div id="search_result">
		</div>
	</div>

  	
	
		
	


<?php include("footer.php"); ?>	
</body>
</html>













