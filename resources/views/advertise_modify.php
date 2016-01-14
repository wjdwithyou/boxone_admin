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
		       
		       if( <?=$idx?> == 0){ 	//새로등록
		       	
		       	$(".modify").hide();
		       	$("#mod_title").hide();
		       	$(".insert").show();
		       	$("#new_title").show();
		       	$(".link").attr("readonly",false);
		       }
		       else{					//수정
		        $(".insert").hide();
		        $("#new_title").hide();
		        $("#mod_title").show();	
		       }
		       
		       
		       $("#input_file").change(function(){
		           readURL(this);
		       });
		    });
		       
		   
		   
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
    	<script src="<?=$adr_ctr ?>js/activate-power-mode.js"></script>
		<script>
			POWERMODE.colorful = true;
			document.body.addEventListener('input', POWERMODE);
		</script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<div id="content">
		 	<h3 id="mod_title" align="center">Modify advertisement</h3>
		 	<h3 id="new_title" align="center">New advertisement</h3>
		 	<form action="<?=$adr_js?><?=$page?>.js" method="post">
		    	<table align="center">
				  <tr>
				    <td class="color" width="230">Name</td>
				    <td><input type="text" class="form-control" id="adm_name" name="name" value="<?= $info->name?>"></td>
				  </tr>
				  <tr>
				    <td class="color" width="230">Location</td>
				    <td><input type="text" class="form-control link" id="adm_location" name="location" value="<?= $info->id?>" readonly></td>
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
		
				    <td height="170"><img width="200" height="150" id="input_img" class="img-thumbnail" src="<?=$info->image?>"/></td>
					
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
				    	<button type="button" id="btn_right" class="bo_btn modify" onclick="adUpdate(<?=$idx?>);">
							Modify
						</button>
						<button type="button" id="btn_right" class="bo_btn insert" onclick="adNew()">
							Insert
						</button>
				    </td>
				  </tr>
				</table>
			</form>
			<script>
				$("#adm_name").focusout(function(){
					checkNameId("#adm_name");
				});
				$("#adm_location").focusout(function(){
					checkNameId("#adm_location");
				});
				$("#adm_link").focusout(function(){
					checkLink("#adm_link");
				});
			</script>
		</div>
    </body>
</html>