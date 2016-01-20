<!DOCTYPE html>
<head>
		<?php
			header("Content-Type: text/html; charset=UTF-8");
		 
			include ("libraries.php");
		?>

	<link rel="stylesheet" type="text/css" href="mystyle.css">
	<script>
	$(document).ready(function(){
   	 $("button").click(function(){
   	 	$("button").hide();
   	 	$("#loading").show();
    	});
    });
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
	  <li role="presentation" ><a href="<?= $adr_ctr ?>Advertise/index">Advertise</a></li>
	  <li role="presentation" ><a href="<?= $adr_ctr ?>Notify/test">Notify</a></li>
	  <li role="presentation"><a href="<?= $adr_ctr ?>Member/member">Member</a></li>
	  <li role="presentation" class="active"><a href="#">Product update</a></li>
	</ul>
	</div>
	
	<div class="center">

		<div id="test">
			<a href="<?= $adr_ctr ?>Product/insertProd" target="product"><button>update</button></a>
		</div>
		
		<div id="loading" hidden>
			<div class="cmn-spinner__radar"></div>
			<p>Loading... Please wait</p>
		</div>
		<iframe name="product" width="100%" height="800px" scrolling="auto" frameborder="0">
		
		</iframe>

	</div>
	
</body>
</html>