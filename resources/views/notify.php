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
	  <li role="presentation" class="active"><a href="#">Notify</a></li>
	  <li role="presentation"><a href="<?= $adr_ctr ?>Member/member">Member</a></li>
	  <li role="presentation"><a href="<?= $adr_ctr ?>Product/product">Product update</a></li>
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

<hr class="header_hr3"></hr>
<div class="notify_wrap">
	<div class="footer_div bo_color2">
			<span>Copyright ⓒ 2016 Tourplatform Inc. All rights reserved.</span>
	</div>
	<div class="footer_div bo_color2">
			<span>사업자등록번호: 206-87-02228</span>
			<span class="li_bar3"></span>
			<!-- <span>통신판매업신고번호: 제 2016-서울성동-00313호</span>
			<span class="li_bar3"></span> -->
			<span>대표이사: 강현수</span>
			<span class="li_bar3"></span>
			<span>주소: 서울특별시 성동구 왕십리로 222 한양대학교 한양종합기술원 HIT 313호</span>
			<span class="li_bar3"></span>
			<span>대표전화: 02-2220-4886</span>
			<span class="li_bar3"></span>
			<span>팩스: 02-2220-4886</span>
	</div>
</div>
</body>
</html>