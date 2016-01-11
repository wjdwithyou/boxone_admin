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
       	
       		<!-- Temp Notice -->
       		<tr align="center">
       			<td colspan="5"><font color="#FF0000">PNG 파일만 넣어요 일단은ㅜㅜ</font></td>
       		</tr>
       		<!-- Temp Notice end -->
       		
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
					 <td class="ad_pc"><img src="<?=$adr_img ?>advertise/<?=$i->idx?>_img.png"/></td>
>>>>>>> 33c22ae911300e28a97851547e119957fc3c9603
                     <td class="ad_pc"><?= $i->upload?></td>
                  </tr>
                  <!-- /광고목록 글 -->
        	<?php endforeach;?>
		</table>
		
     		
    </div>


</body>