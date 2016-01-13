<!DOCTYPE html>
<html>
	<head>
		<?php 
			include ("libraries.php");
		?>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
	</head>

<body>    
    <br>
    <h1 align="center">Contents</h1>
    
	<div id="ad_board_wrap" class="cl_b content">

       	<table class="title" align="center">
		  <tr align="center">
		  	<td class="ad_num" width="50px">No.</td>
		  	<td class="ad_pc">Location</td>
		    <td class="ad_board_title" align="left">Name</td>
		    <td class="ad_pc">Image</td>
		    <td class="ad_pc" >Upload time</td>
		  </tr>
		  <?php foreach($adList as $i) :?>      
                  <!-- 광고목록 글 -->
                  <tr>
                     <td class="ad_num"><?= $i->idx?></td>
                     <td class="ad_pc"><?= $i->id?></td>
                     <td class="ad_board_title" style="font-weight:bold" ><a onclick='adModify(<?=$i->idx?>);'><?= $i->name?></a></td>

					 <td class="ad_img"><img width="150px" height="80px" src="<?=$adr_img ?>advertise/<?=$i->idx?>_<?=$i->upload?>.png"/></td>

                     <td class="ad_pc"><?= $i->upload?></td>
                  </tr>
                  <!-- /광고목록 글 -->
        	<?php endforeach;?>
		</table>
		
     		
    </div>


</body>