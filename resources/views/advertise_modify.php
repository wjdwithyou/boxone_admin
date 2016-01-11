<!DOCTYPE html>
<html>
    <head>
    	<?php
    		include ("libraries.php");
    	?>
    	<!--
 		<script type="text/javascript" src="C:/Users/User/Documents/boxone_laravel_test/public/js/jquery-1.11.3.min.js"></script>
  		<script type="text/javascript" src="C:/Users/User/Documents/boxone_laravel_test/public/js/advertise_modify.js"></script>
  		-->
        <title>Laravel</title>
        <!--
		<link rel="stylesheet" href="C:/Users/User/Documents/boxone_laravel_test/public/css/advertise_modify.css">
		-->
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    </head>
  
    <body>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<div id="content">
 	<h3 align="center">Modify advertisement</h1>
 	<form action="C:/Users/User/Documents/boxone_laravel_test/public/js/advertise_modify.js" method="post">
    	<table align="center">
		  <tr>
		    <td class="color" width="230">Name</td>
		    <td><input type="text" class="form-control" id="adm_name" name="name" value="<?= $info->name?>"></td>
		  </tr>
		  <tr>
		    <td class="color">Link</td>
		    <td><input type="text" class="form-control" id="adm_link" name="link" value="<?= $info->website_link?>"></td>
		  </tr>
		  <tr>
		    <td rowspan="2" class="color">Image</td>
		    <td><input class="img_pre" type="file" name="img" id="input_file"></td>
		  </tr>
		  <tr>
		    <td class="img_pre" height="221"><img id="img_preview" class="img-thumbnail" name="pre_img" style="display:none;"/></td>
		  </tr>
		  <tr>
		    <td class="color">Comment</td>
		    <td><textarea class="form-control" rows="8" id="adm_comment" name="comment"><?= $info->alt?></textarea></td>
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