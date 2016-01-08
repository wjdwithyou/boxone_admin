<!DOCTYPE html>
<html>
	<head>
		<?php 
			include ("libraries.php");
		?>
		<!--
		<link rel="stylesheet" href="C:/Users/User/Documents/boxone_laravel_test/public/css/main.css">
		-->
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
	</head>

<body>    
    <br>
    <h1 align="center">Contents</h1>
    
	<div id="ad_board_wrap" class="cl_b content">

       	<table class="title" align="center">
		  <tr align="center">
		  	<td class="ad_num">No.</td>
		  	<td class="ad_pc">Location</td>
		    <td width="498" align="left">Name</td>
		    <td width="150">Image</td>
		    <td width="150">Upload time</td>
		  </tr>
		</table>
		
     		<?php foreach($adList as $i) :?>            
               <table class="ad_board">
                  <!-- 광고목록 글 -->
                  <tr>
                     <td class="ad_num"><?= $i->idx?></td>
                     <td class="ad_pc"><?= $i->id?></td>
                     <td class="ad_board_title"><a onclick='adModify(<?=$i->idx?>);'><?= $i->name?></a></td>
                     <td class="ad_pc"><?= $i->image?></td>
                     <td class="ad_pc"><?= $i->upload?></td>
                  </tr>
                  <!-- /광고목록 글 -->
               </table>
        	<?php endforeach;?>
    </div>


</body>