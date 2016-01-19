<!DOCTYPE html>
<head>
		<?php
			header("Content-Type: text/html; charset=UTF-8");
		 
			include ("libraries.php");
		?>
	<script type="text/javascript" src="http://localhost:8000/bootstrap/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="http://localhost:8000/js/notify.js"></script>
		
	<link rel="stylesheet" type="text/css" href="mystyle.css">

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
	  <li role="presentation" class="active"><a href="#">Member</a></li>
	  <li role="presentation"><a href="<?= $adr_ctr ?>Product/index">Product update</a></li>
	</ul>
	</div>
		<div id="board_wrap">
			
		<div class="type_album">
		<div class="row">
<!-- 사진 -->
	
    <div class="container">
      <div class="section">
        <div class="section__content clearfix">
          <div class="card effect__random" data-id="1">
            <div class="card__front">
              <img src="<?=$adr_ctr?>img/zico.jpg" class="card__text">
            </div>
            <div class="card__back">
              <div class="card__text">
              	<h2>JangWon</h2>
			    <p>Project manager<br>
			    e-mail: abcd@tourplatform.com<br>
			    phon: 010-1234-5678</p>
			  </div>
            </div>
          </div>
       <!-- /card -->
          <div class="card effect__random" data-id="2">
            <div class="card__front">
              <img src="<?=$adr_ctr?>img/you.gif" class="card__text">
            </div>
            <div class="card__back">
              <div class="card__text">
              	<h2>SaeMi</h2>
			    <p>Designer<br>
			    e-mail: abcd@tourplatform.com<br>
			    phon: 010-1234-5678</p>
			  </div>
            </div>
          </div>
        <!-- /card -->
          <div class="card effect__random" data-id="3">
            <div class="card__front">
              <img src="<?=$adr_ctr?>img/sul.jpg" class="card__text">
            </div>
            <div class="card__back">
              <div class="card__text">
              	<h2>YoungHan</h2>
			    <p>Junior project manager<br>
			    e-mail: abcd@tourplatform.com<br>
			    phon: 010-1234-5678</p>
			  </div>
            </div>
          </div>
        <!-- /card -->
          <div class="card effect__random" data-id="4">
            <div class="card__front">
              <img src="<?=$adr_ctr?>img/moon.jpg" class="card__text">
            </div>
            <div class="card__back">
              <div class="card__text">
              	<h2>YoungHo</h2>
			    <p>Developer<br>
			    e-mail: abcd@tourplatform.com<br>
			    phon: 010-1234-5678</p>
			  </div>
            </div>
          </div>
        <!-- /card -->
                  <div class="card effect__random" data-id="5">
            <div class="card__front">
              <img src="<?=$adr_ctr?>img/junsoo.jpg" class="card__text">
            </div>
            <div class="card__back">
              <div class="card__text">
              	<h2>JinGyeong</h2>
			    <p>Contents<br>
			    e-mail: abcd@tourplatform.com<br>
			    phon: 010-1234-5678</p>
			  </div>
            </div>
          </div>
        <!-- /card -->
          <div class="card effect__random" data-id="6">
            <div class="card__front">
              <img src="<?=$adr_ctr?>img/boyoung.jpg" class="card__text">
            </div>
            <div class="card__back">
              <div class="card__text">
              	<h2>SeungCheol</h2>
			    <p>Developer<br>
			    e-mail: abcd@tourplatform.com<br>
			    phon: 010-1234-5678</p>
			  </div>
            </div>
          </div>
        <!-- /card -->
          <div class="card effect__random" data-id="7">
            <div class="card__front">
              <img src="<?=$adr_ctr?>img/bogum.jpeg" class="card__text">
            </div>
            <div class="card__back">
              <div class="card__text">
              	<h2>YeRi</h2>
			    <p>Developer<br>
			    e-mail: abcd@tourplatform.com<br>
			    phon: 010-1234-5678</p>
			  </div>
            </div>
          </div>
        <!-- /card -->
          <div class="card effect__random" data-id="8">
            <div class="card__front">
              <img src="<?=$adr_ctr?>img/sooji.jpg" class="card__text">
            </div>
            <div class="card__back">
              <div class="card__text">
              	<h2>MyeongSoo</h2>
			    <p>Developer<br>
			    e-mail: abcd@tourplatform.com<br>
			    phon: 010-1234-5678</p>
			  </div>
            </div>
          </div>
        <!-- /card -->
        <div class="card effect__random" data-id="9">
            <div class="card__front">
              <img src="<?=$adr_ctr?>img/default.png" class="card__text">
            </div>
            <div class="card__back">
              <div class="card__text">
              	<h2>???</h2>
			    <p>????<br>
			    e-mail: abcd@tourplatform.com<br>
			    phon: 010-1234-5678</p>
			  </div>
            </div>
          </div>
        <!-- /card -->
      </div><!-- /section -->

 
</div>
<!-- /#wrapper -->  	
<!--/사진-->	    
		</div>
		</div>
	</div>
		<script>
	
	(function() {

  // cache vars
  var cards = document.querySelectorAll(".card.effect__random");
  var timeMin = 1;
  var timeMax = 10;
  var timeouts = [];

  // loop through cards
  for ( var i = 0, len = cards.length; i < len; i++ ) {
    var card = cards[i];
    var cardID = card.getAttribute("data-id");
    var id = "timeoutID" + cardID;
    var time = randomNum( timeMin, timeMax ) * 1000;
    cardsTimeout( id, time, card );
  }

  // timeout listener
  function cardsTimeout( id, time, card ) {
    if (id in timeouts) {
      clearTimeout(timeouts[id]);
    }
    timeouts[id] = setTimeout( function() {
      var c = card.classList;
      var newTime = randomNum( timeMin, timeMax ) * 1000;
      c.contains("flipped") === true ? c.remove("flipped") : c.add("flipped");
      cardsTimeout( id, newTime, card );
    }, time );
  }

  // random number generator given min and max
  function randomNum( min, max ) {
    return Math.random() * (max - min) + min;
  }

})();
	</script>
</body>
</html>