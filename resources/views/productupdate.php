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
   	 	$("#loading").show();
        if(("#loading").is(":visible"))
        $("#test").load("<?= $adr_ctr ?>Product/insertProd");
        
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
			<button>update</button>
		</div>
		
		<div id="loading" hidden>
			<div class="cmn-spinner__radar"></div>
			<p>Loading... Please wait</p>
		</div>

	</div>
	
</body>
</html>