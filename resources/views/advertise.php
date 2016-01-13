<!DOCTYPE html>
<html>
	<head>
		<?php 
			include ("libraries.php");
		?>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script>

	</script>
	
	
	</head>

<body>

	<hr class="header_hr2"></hr>
	<div class="center">
	<img class="img_logo" src="<?=$adr_img?>advertise/boxone.png"/>
	</div>
	
	<div class="menu_nav center">
 	<ul class="nav nav-tabs nav-justified">
	  <li role="presentation" class="active"><a href="#">Advertise</a></li>
	  <li role="presentation"><a href="#">Notify</a></li>
	  <li role="presentation"><a href="#">Member</a></li>
	  <li role="presentation"><a href="#">Etc</a></li>
	</ul>
	</div>	

	<div id="ad_board_wrap" class="cl_b content">
 	<button type="button" id="btn_write" class="bo_btn" onclick='adModify(0);'>New ad</button>
 		
 		
       	<table class="title" align="center">
		  <tr align="center">
		  	<td class="ad_num" width="50px">No.</td>
		  	<td class="ad_pc">Location</td>
		    <td class="ad_board_title" align="left"><span style="cursor:pointer" class="sort">Name</span></td>
		    <td class="ad_pc">Image</td>
		    <td class="ad_pc" >Upload time</td>
		    <td class="ad_pc" >Recent uploader</td>
		  </tr>
		  
		  <?php for($i=1 ; $i < count($adList) ; $i++) :?>      
                  <!-- 광고목록 글 -->
                  <tr>
                     <td class="ad_num"><?= $adList[$i]->idx?></td>
                     <td class="ad_pc"><?= $adList[$i]->id?></td>
                     <td class="ad_board_title" style="font-weight:bold" ><a onclick='adModify(<?=$adList[$i]->idx?>);'><?= $adList[$i]->name?></a></td>

					 <td class="ad_img"><img width="150px" height="80px" src="<?=$adr_img ?>advertise/<?=$adList[$i]->idx?>_<?=$adList[$i]->upload?>.png"/></td>
                     <td class="ad_pc"><?= $adList[$i]->upload?></td>
                     <td class="ad_pc"><?= $adList[$i]->admin_last?></td>
                  </tr>
                  <!-- /광고목록 글 -->
          <?php endfor;?>
		  
	
		</table>
		
     		
    </div>


</body>