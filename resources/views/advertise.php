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
       	<table class="title" width="45%" align="center">
		  <tr align="center">
		  	<td width="100" >No.</td>
		  	<td width="200">Location</td>
		    <td width="500" align="left">Name</td>
		    <td width="200">Image</td>
		  </tr>
		</table>
		
     <?php foreach($adList as $i) :?>
            <div id="ad_board_wrap" class="cl_b content">
               <table class="ad_board">
                  <!-- 광고목록 글 -->
                  <tr>
                     <td class="ad_pc"><?= $i->idx?></td>
                     <td class="ad_pc"><?= $i->id?></td>
                     <td class="ad_board_title"><a onclick='adModify(<?=$i->idx?>);'><?= $i->name?></a></td>
                     <!--td class="ad_board_title"><a onclick="commContent(<?= $i->idx?>);"><?= $i->name?></a></td-->
                     <td class="ad_pc"><?= $i->image?></td>
                  </tr>
                  <!-- /광고목록 글 -->
               </table>
            </div>
   <?php endforeach;?>
   
    
    

</body>