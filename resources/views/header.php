	<head>
		<?php 
			include ("libraries.php");
		?>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="<?=$adr_js?>login.js"></script>
	<style type="text/css">
		.inner {
		    max-width: 1024px;
		    height: 16px;
		    margin: 0 auto;
		    padding-left: 8px;
		    padding-right: 8px;
		}
		.f_l {
		    float: left;
		}
		.f_r {
		    float: right;
		}
		.img_24 {
		    width: 24px;
		    height: 24px;
		}
		.br_50 {
		    border-radius: 50%;
		}
		#header_top_wrap {
		    position: relative;
		    margin-top: 8px;
		    font-size: 11px;
		}
		#header_profile {
		    position: absolute;
		    top: -4px;
		    right: 108px;
		}						

		
	</style>

	</head>
	<div class="inner">
		<div id="header_top_wrap">
			<div class="f_l">
				BOXONE 관리자페이지
			</div>
			<div class="f_r">
				<div>
				<img class="img_24 br_50" src="<?=$adr_img?>profile_image.png" id="header_profile">
				<?= $_SESSION['id']; ?>님 | <span style="cursor: pointer" onclick='logout();'>로그아웃</span>
				</div>
			</div>
		</div>
		
	</div>
	