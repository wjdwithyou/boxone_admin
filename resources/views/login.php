<!DOCTYPE html>
<head>
	<?php 
		include ("libraries.php");
	?>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript" src="<?=$adr_js?>jquery.cookie.js"></script>
		
		<script>
		
		$(document).ready(function(){
			 // 저장된 쿠키값을 가져와서 ID 칸에 넣어준다. 없으면 공백으로 들어감.
		    var userInputId = getCookie("userInputId");
		    $("input[name='id']").val(userInputId); 
		     
		    if($("input[name='id']").val() != ""){ // 그 전에 ID를 저장해서 처음 페이지 로딩 시, 입력 칸에 저장된 ID가 표시된 상태라면,
		        $("#idSaveCheck").attr("checked", true); // ID 저장하기를 체크 상태로 두기.
		    }
		     
		    $("#idSaveCheck").change(function(){ // 체크박스에 변화가 있다면,
		        if($("#idSaveCheck").is(":checked")){ // ID 저장하기 체크했을 때,
		            var userInputId = $("input[name='id']").val();
		            setCookie("userInputId", userInputId, 7); // 7일 동안 쿠키 보관
		        }else{ // ID 저장하기 체크 해제 시,
		            deleteCookie("userInputId");
		        }
		    });
		     
		    // ID 저장하기를 체크한 상태에서 ID를 입력하는 경우, 이럴 때도 쿠키 저장.
		    $("input[name='id']").keyup(function(){ // ID 입력 칸에 ID를 입력할 때,
		        if($("#idSaveCheck").is(":checked")){ // ID 저장하기를 체크한 상태라면,
		            var userInputId = $("input[name='id']").val();
		            setCookie("userInputId", userInputId, 7); // 7일 동안 쿠키 보관
		        }
		    });
			function setCookie(cookieName, value, exdays){
			    var exdate = new Date();
			    exdate.setDate(exdate.getDate() + exdays);
			    var cookieValue = escape(value) + ((exdays==null) ? "" : "; expires=" + exdate.toGMTString());
			    document.cookie = cookieName + "=" + cookieValue;
			}
			 
			function deleteCookie(cookieName){
			    var expireDate = new Date();
			    expireDate.setDate(expireDate.getDate() - 1);
			    document.cookie = cookieName + "= " + "; expires=" + expireDate.toGMTString();
			}
			 
			function getCookie(cookieName) {
			    cookieName = cookieName + '=';
			    var cookieData = document.cookie;
			    var start = cookieData.indexOf(cookieName);
			    var cookieValue = '';
			    if(start != -1){
			        start += cookieName.length;
			        var end = cookieData.indexOf(';', start);
			        if(end == -1)end = cookieData.length;
			        cookieValue = cookieData.substring(start, end);
			    }
			    return unescape(cookieValue);
			}
			
		    $("#login").click(function(){
		        var id = theForm["id"].value;
				var passwd = theForm["passwd"].value;
				
				if(id==""){
					alert("Please enter the ID");
				}
				else if(passwd==""){
					alert("Please enter the Password");	
				}
				else{
					alert("?");
					justLogin();
				}
		    });
		});
		
		function enterCheck(){
			if(event.keyCode==13){
			justLogin();
			}
		}
		</script>
		
		<script src="<?=$adr_js?>snow.js"></script>
		<script>
			function onLoadFunc(){
				var process = new Process("<?=$adr_img?>advertise/snow.png", 17, 17, 0, 0, 1800, 900);
 
				process.run(120, 250);
			}
		</script>
</head>
<body onLoad="onLoadFunc()">
	<script src="<?=$adr_js?>/activate-power-mode.js"></script>
	<script>
		POWERMODE.colorful = true;
		document.body.addEventListener('input', POWERMODE);
	</script>
	
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<div class="content">
		<table>
			<tr>
				<td class="title"><label for="id" class="control-label" >ID</label></td>
				<td> <input type="text" class="form-control" id="id" name="id" placeholder="ID" tabindex="1"></td>

				<td rowspan="2" class="tabl_btn"><button type="button" class="btn btn-default" onclick='justLogin();'>Log in</button></td>

			</tr>
			<tr>
				<td class="title"><label for="inputPassword3" class="control-label">Password</label></td>
				<td><input type="password" class="form-control" id="pw" name="passwd" placeholder="Password" tabindex="2" onkeydown='enterCheck();'></td>
			</tr>
			<tr>
				<td></td>
				<td rowspan="2"> <input type="checkbox" id="idSaveCheck">  Remember me </td>
			</tr>
		</table>
	</div>
	
	<!--script>	// Mouse Pointer
		var MAX_PARTICLE = 100;
		var interval = 2.5; // 반영속도
		var particle_arr = new Array(MAX_PARTICLE);
		var dest_element = document.body;

		for (var i = 0; i < MAX_PARTICLE; ++i){
			particle_arr[i] = document.createElement('div'); // 각각 div 생성
			dest_element.appendChild(particle_arr[i]); // 상속(표현)
			
			particle_arr[i].innerHTML = "★"; // 모양
			particle_arr[i].x = 475; // 위치
			particle_arr[i].y = 650;
			particle_arr[i].dx = 0; // 속도
			particle_arr[i].dy = 0;
			particle_arr[i].ax = 0; // 가속도
			particle_arr[i].ay = 0;
			particle_arr[i].style.fontsize = Math.floor(5000 / (i + 100)); // 크기
			particle_arr[i].style.color = "rgb(" + Math.floor(i * 2.55) + ", 255, 191)"; // 색
			particle_arr[i].style.position = "absolute";
		}

		//console.log((JSON.stringify(particle_arr[99].style)));
 
		setInterval("draw()", 1);
 
		function draw(){
			calculate();
			
			for (var i = 0; i < MAX_PARTICLE; ++i){
				particle_arr[i].style.left = particle_arr[i].x;
				particle_arr[i].style.top = particle_arr[i].y;
			}
		}
 
		function calculate(){
			particle_arr[0].ax = (Math.random() - 0.5) * 0.1; // -0.05 ~ 0.05
			particle_arr[0].ay = (Math.random() - 0.5) * 0.1; // -0.05 ~ 0.05
			particle_arr[0].dx += particle_arr[0].ax * interval; // 속도계산(가속도적분)
			particle_arr[0].dy += particle_arr[0].ay * interval;
			particle_arr[0].x += particle_arr[0].dx * interval; // 위치계산(속도적분)
			particle_arr[0].y += particle_arr[0].dy * interval;
 
			if (particle_arr[0].x < 0 || particle_arr[0].x > 1900)
				particle_arr[0].dx = -particle_arr[0].dx;
			if (particle_arr[0].y < 0 || particle_arr[0].y > 2600)
				particle_arr[0].dy = -particle_arr[0].dy;

			for (var i = 1; i < MAX_PARTICLE; ++i){
				particle_arr[i].ax = ((particle_arr[i-1].x - particle_arr[i].x) / (750 - i / 50) * 70) - particle_arr[i].dx * interval / 8; // 가속도계산(탄성력/질량 - 저항력)
				particle_arr[i].ay = ((particle_arr[i-1].y - particle_arr[i].y) / (750 - i / 50) * 70) - particle_arr[i].dy * interval / 8;
				particle_arr[i].dx += particle_arr[i].ax * interval; // 속도계산(가속도적분)
				particle_arr[i].dy += particle_arr[i].ay * interval;
				particle_arr[i].x += particle_arr[i].dx * interval; // 위치계산(속도적분)
				particle_arr[i].y += particle_arr[i].dy * interval;
			}
		}
 
		document.onmousemove = function(){
			particle_arr[0].x = window.event.clientX;
			particle_arr[0].y = window.event.clientY;

			console.log("x:" + particle_arr[0].x);
			console.log("y:" + particle_arr[0].y);
		}
	</script-->
</body>
