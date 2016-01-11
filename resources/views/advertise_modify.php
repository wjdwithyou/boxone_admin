<!DOCTYPE html>
<html>
    <head>
    	<?php
    		include ("libraries.php");
    	?>
        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    </head>
  <script>
		$(document).ready(function(){
		       $("#input_file").change(function(){
		           readURL(this);
		       });
		   })
		   
		   function readURL(input) {
		      if (input.files && input.files[0]) {
		      var reader = new FileReader();
		      
		      reader.onload = function (e) {
		         $('#input_img').attr('src', e.target.result);
		      }
		              
		      reader.readAsDataURL(input.files[0]);
		      }
		   }
		 
  </script>
    <body>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<div id="content">
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
		    <td class="color" width="230">Name</td>
		    <td><input type="text" class="form-control" id="adm_name" name="name" value="<?= $info->name?>"></td>
		  </tr>
		  <tr>
		    <td class="color">Link</td>
		    <td><input type="text" class="form-control" id="adm_link" name="link" value="<?= $info->website_link?>"></td>
		  </tr>
		  <tr>
		    <td rowspan="2" class="color">Image</td>
		    <td><input class="img_pre" id="input_file" type="file" name="img"></td>
		  </tr>
		  <tr>

		    <td height="170"><img height="150" id="input_img" class="img-thumbnail" src="<?=$adr_img?>advertise/<?=$idx?>_img.png"/></td>

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