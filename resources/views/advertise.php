<!DOCTYPE html>
<html>
	<head>
		<?php 
			include ("libraries.php");
		?>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="<?=$adr_js?>login.js"></script>

	<script>

	</script>
	
	
	</head>

<body>
<?php include("header.php"); ?>

	<hr class="header_hr2"></hr>
	<div class="center">
	<img class="img_logo" src="<?=$adr_img?>advertise/boxone.png"/>
	</div>
		
	<div class="menu_nav center">
 	<ul class="nav nav-tabs nav-justified">
	  <li role="presentation" class="active"><a href="#">Advertise</a></li>
	  <li role="presentation"><a href="<?= $adr_ctr ?>Mapping/mapping">Product mapping</a></li>
	  <li role="presentation"><a href="<?= $adr_ctr ?>Notify/test">Notify</a></li>
	  <li role="presentation"><a href="<?= $adr_ctr ?>Member/member">Member</a></li>
	  <li role="presentation"><a href="<?= $adr_ctr ?>Product/product">Product update</a></li>
	</ul>
	</div>	

	<div id="ad_board_wrap" class="cl_b content">

 	<button type="button" id="btn_write" class="bo_btn btn_right" onclick='adModify(0);'>등록하기</button>
	<button type="button" id="btn_albumtype" class="bo_btn btn_left">앨범형</button>
	<button type="button" id="btn_boardtype" class="bo_btn btn_left">게시판형</button>
	<div class="update">
	<span style="cursor:pointer" class="sort_abc">[가나다순]</span>
	<span style="cursor:pointer" class="sort_update">[업데이트순]</span>
	</div>

    <!-- 게시판형 -->
 	<div class="type_board" style="display:none">
       	<table class="title" align="center">
		  <tr align="center">
		  	<td class="ad_num" width="50px">No.</td>
		  	<td class="ad_pc">Location</td>
		    <td class="ad_board_title" align="left">Name</td>
		    <td class="ad_pc">Image</td>
		    <td class="ad_pc" >Upload time</td>
		    <td class="ad_pc" >Recent uploader</td>
		    <td class="ad_num" width="50px">Delate</td>
		  </tr>
		  
		  <?php for($i=1 ; $i < count($adList) ; $i++) :?>
                  <!-- 광고목록 글 -->
                  <tr>
                     <td class="ad_num"><?= $adList[$i]->idx?></td>
                     <td class="ad_pc"><?=$adList[$i]->id?></td>
                     <td class="ad_board_title" style="font-weight:bold" ><a style="cursor:pointer" onclick='adModify(<?=$adList[$i]->idx?>);'><?= (empty($adList[$i]->name))? '&lt;empty&gt;': $adList[$i]->name?></a></td>
					 <td class="ad_img"><img width="150px" height="80px" src="<?=$adList[$i]->image?>"/></td>
                     <td class="ad_pc"><?= substr($adList[$i]->upload,0,-3) ?></td>
                     <td class="ad_pc"><?= $adList[$i]->admin_last?></td>
                     <td class="ad_num"><span style="cursor:pointer" onclick='adEmpty(<?=$adList[$i]->idx?>);'>[Del]</span></td>

                  </tr>
                  <!-- /광고목록 글 -->
          <?php endfor;?>
	  	</table>
	<!-- /게시판형 -->
	</div>
	<!-- 앨범형 -->
	<div class="type_album">
		<div class="row">
		 <?php for($i=1 ; $i < count($adList) ; $i++) :?>      

		  <div class="col-sm-6 col-md-3">
		    <div class="thumbnail">
		      <img class="img_thumb" src="<?=$adList[$i]->image?>" alt="...">
		      <div class="caption">
		        <div class="ad_album_title"><a style="cursor:pointer" onclick='adModify(<?=$adList[$i]->idx?>);'><?= (empty($adList[$i]->name))? '&lt;empty&gt;': $adList[$i]->name?></a></div>
		        <?= $adList[$i]->idx?> - <?= $adList[$i]->id?>
		        <br><?= $adList[$i]->admin_last?> | <?= substr($adList[$i]->upload,0,-3) ?> | 
		        <span style="cursor:pointer" onclick='adEmpty(<?=$adList[$i]->idx?>);'>[비우기]</span>
		      </div>
		    </div>
		  </div>
		  	<?php endfor;?>
		</div>
	<!-- /앨범형 -->
	
  	</div>
  </div>
<?php include("footer.php"); ?>	
</body>