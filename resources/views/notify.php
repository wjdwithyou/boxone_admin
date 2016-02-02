<!DOCTYPE html>
<head>
		<?php
			header("Content-Type: text/html; charset=UTF-8");
		 
			include ("libraries.php");
		?>
	<script type="text/javascript" src="http://localhost:8000/bootstrap/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="http://localhost:8000/js/notify.js"></script>	
	<link rel="stylesheet" type="text/css" href="mystyle.css">
	<style>
	
	</style>
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
	  <li role="presentation" class="active"><a href="#">Notify</a></li>
	  <li role="presentation"><a href="<?= $adr_ctr ?>Member/member">Member</a></li>
	  <li role="presentation"><a href="<?= $adr_ctr ?>Product/product">Update</a></li>
	</ul>
	</div>	
	
	<div class="notify_wrap">
	<input type="hidden" id="adr_ctr" value="http://localhost:8000/"/>

	<div id="reply_input_wrap">
		<div class="reply_title reply_title2">
			<img src="<?=$adr_img ?>reply2.png">
			&nbsp;댓글 쓰기
		</div>
		
		<!-- 댓글 달기 -->
		<table id="reply_input_table" class="reply_table">
			<tr class="reply_modify_show">
				<td class="reply_profile reply_show">
					<img src="<?=$adr_img?>profile_image.png">
				</td>
				<td class="input_textarea2">
					<?php if ($logined) :?>
						<textarea id="reply_write_content" class="form-control" placeholder="최대 300자까지 등록할 수 있습니다." maxlength="300" rows="4"></textarea>
					<?php else :?>
						<textarea id="reply_write_content" class="form-control" placeholder="로그인 후에 이용해 주세요." maxlength="300" rows="4"></textarea>
					<?php endif;?>
					<button type="button" class="add_reply2" onclick="justTest();">
						등록
					</button>
				</td>
			</tr>
		</table>
	</div>
	</div>
		<!-- <hr class="header_hr2"></hr> -->
	<div class="bgcolor">
	<div class="notify_wrap">
		<!-- 댓들내용 -->
			<div id="reply_wrap">
			<div id="reply_inner">
				<div class="reply_title">
					<img src="<?=$adr_img ?>reply2.png">
					&nbsp;댓글
				</div>
				
				<!-- 댓글 -->
				<?php for($i=1 ; $i < count($noList) ; $i++) :?> 
				<table class="reply_table">
					<tr class="reply_show">
						<div id="idx" hidden><?= $noList[$i]->idx ?></div>
						<td class="reply_profile" rowspan="3">
							<img src="<?=$adr_img?>profile_image.png">
						</td>
						<td>
							<span id="nickname" class="reply_writer"><?=$noList[$i]->nickname?></span>
							&nbsp;
							<span class="reply_date bo_color"><?=$noList[$i]->upload?></span>
						</td>
					</tr>
					<tr class="reply_show">
						<td class="reply_content">
							<span class="ori_content"><?=$noList[$i]->contents?></span>
							<div hidden class="mod_content"><textarea id="reply_write_content" class="form-control" maxlength="300" rows="4"><?=$noList[$i]->contents?></textarea></div></td>
					</tr>
					<tr>
						<td>
							<div class="f_l bo_color reply_a reply_rm">
								<a onclick="#">답글달기</a>
							</div>
							<?php if ($noList[$i]->nickname == $_SESSION['id']) :?>
							<div class="f_r bo_color reply_a reply_rm">
								<a class="reply_show" onclick="noModify($(this),<?=$noList[$i]->idx?>);">수정</a>
								<a class="reply_show reply_del_show" onclick="noDelete(<?=$noList[$i]->idx?>);">삭제</a>
								<a class="reply_modify_show" onclick="clearModify($(this));" hidden>취소</a>
							</div>
							<?php endif;?>
						</td>
					</tr>	

				</table>
				<?php endfor;?>
				</div>
			</div>
	</div>
</div>

<?php include("footer.php"); ?>	
</body>
</html>