<!DOCTYPE html>
<head>
		<?php
			header("Content-Type: text/html; charset=UTF-8");
		 
			include ("libraries.php");
		?>

	<link rel="stylesheet" type="text/css" href="mystyle.css">
	<script>
	
	/*
	$(document).ready(function(){
       $("button").click(function(){
          $("#loading").show();
          $("button").hide();
             
       });
    });
    */
    </script>
    
	<script for="product" event="onreadystatechange">
	/*
	if(pageInit && (this.readyState=="complete"))
	{
	alert("ok");
	}
		*/
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
	  <li role="presentation"><a href="<?= $adr_ctr ?>Mapping/mapping">Product mapping</a></li>
	  <li role="presentation" ><a href="<?= $adr_ctr ?>Notify/test">Notify</a></li>
	  <li role="presentation"><a href="<?= $adr_ctr ?>Member/member">Member</a></li>
	  <li role="presentation" class="active"><a href="#">Update</a></li>
	</ul>
	</div>
	
	<div class="center">
	
		<div id="test">
			<a href="<?= $adr_ctr ?>Product/insertProd" target="product"><button>Product update</button></a>
			<a href="<?= $adr_ctr ?>Google/crawlReviewAll" target="review"><button>Review hotdeal</button></a>
			
			<div id="loading" hidden class="cmn-spinner__radar"></div>
			
		</div>
		
		<div class="hori">
		<div class="pro c_f_l">
		<iframe name="product" id="product" width="100%" height="400px" scrolling="auto" frameborder="1">
			</iframe>
			</div>
		<div class="rev c_f_l">
		<iframe name="review" id="review" width="100%" height="400px" scrolling="auto" frameborder="1">
		
		</iframe>
		</div>
		</div>

	</div>

<?php include("footer.php"); ?>	
</body>
</html>