<!DOCTYPE html>
<html>
    <head>
    	<?php
    		include ("libraries.php");
    	?>
        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    </head>
    
    <body>
 	<h3 align="center">Modify advertisement</h1>
 	<form action="<?=$adr_js?><?=$page?>.js" method="post">
 	<!--form action="C:/Users/User/Documents/boxone_laravel_test/public/js/advertise_modify.js" method="post"-->
    	<table align="center">
    	
    		<!-- Temp Notice -->
       		<tr align="center">
       			<td colspan="2"><font color="#FF0000">미리보기 기능은 Coming soon..</font></td>
       		</tr>
       		<!-- Temp Notice end -->
       		
		  <tr>
		    <td width="90" class="color">Name</td>
		    <td><input type="text" class="text" id="adm_name" name="name" value="<?= $info->name?>"></td>
		  </tr>
		  <tr>
		    <td class="color">Link</td>
		    <td><input type="text" class="text" id="adm_link" name="link" value="<?= $info->website_link?>"></td>
		  </tr>
		  <tr>
		    <td rowspan="2" class="color">Image</td>
		    <td><input type="file" name="img" id="input_file"></td>
		  </tr>
		  <tr>
		    <td height="170"><img id="img_preview" name="pre_img" style="display:none;"/><img src="<?=$adr_img?>advertise/<?=$idx?>_img.png"/></td>
		  </tr>
		  <tr>
		    <td colspan="2" width="500" class="color">Comment</td>
		  </tr>
		  <tr>
		    <td colspan="2"><textarea id="adm_comment" name="comment"><?= $info->alt?></textarea></td>
		  </tr>
		  <tr>
		    <td colspan="2" align="center">
		    	<button type="button" id="btn_left" class="bo_btn" onclick="history.go(-1);" value="1">
					Back
				</button>
		    	<button type="button" id="btn_right" class="bo_btn" onclick="adUpdate(<?=$idx?>);">
					Modify
				</button>
		    </td>
		  </tr>
		</table>
	</form>
    </body>
</html>