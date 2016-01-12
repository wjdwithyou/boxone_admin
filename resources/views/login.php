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
			
		    $("form").submit(function(){
		        var id = theForm["id"].value;
				var passwd = theForm["passwd"].value;
				
				if(id==""){
					alert("Please enter the ID");
				}
				else if(passwd==""){
					alert("Please enter the Password");	
				}
				else{
					justLogin();
				}
		    });
		});
		
		</script>
	<style type="text/css">
	
	.content{
		max-width: 400px;
		width: 400px;
		margin: 0 auto;
		padding-top: 10%;
	}
	td, tr {
		
		padding: 5px !important;

	}
	.title{
		width: 50px;
		text-align: center;
		vertical-align: middle;

	}
	.btn{
		height: 100% !important;
	}
	.tabl_btn{
		padding: 0px 0px 0px 5px !important;
		
	}
	label{
		margin-bottom: 0px !important;
	}
	</style>
</head>

<body>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<<<<<<< HEAD

<div class="content">
<form id="theForm" class="form-horizontal" >


  <div class="form-group">
    <label for="id" class="col-sm-2 control-label" >ID</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="id" name="id" placeholder="ID">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" name="passwd" placeholder="Password">
      
    </div
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox" id="idSaveCheck"> Remember me
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Sign in</button>
    </div>
  </div>
</form>
</div>

</body>
=======
	<div class="content">
	<form id="theForm" class="form-horizontal" >
		<table>
			<tr>
				<td class="title"><label for="id" class="control-label" >ID</label></td>
				<td> <input type="text" class="form-control" id="id" name="id" placeholder="ID"></td>
				<td rowspan="2" class="tabl_btn"><button type="submit" class="btn btn-default">Log in</button></td>
			</tr>
			<tr>
				<td class="title"><label for="inputPassword3" class="control-label">Password</label></td>
				<td><input type="password" class="form-control" id="inputPassword3" name="passwd" placeholder="Password"></td>
			</tr>
			<tr>
				<td></td>
				<td rowspan="2"> <input type="checkbox" id="idSaveCheck">  Remember me </td>
			</tr>
		</table>
	</form>
	</div>
</body>

<!--
<!DOCTYPE html>
	<head>
		<?php 
			//include ("libraries.php");
		?>
		<title>Admin Page Login</title>
	</head>
	<body>
		<form>
			<table>
				<tr>
					<td colspan="3">Admin Page Login</td>
				</tr>
				<tr>
					<td>ID</td>
					<td><input type="text" id="login_id" placeholder="admin id"/></td>
					<td rowspan="2"><button type="button" onclick="justLogin();">Login</button></td>
				</tr>
				<tr>
					<td>PW</td>
					<td><input type="password" id="login_pw" placeholder="admin pw" onkeypress="if(event.keyCode==13){justLogin();}"/></td>
				</tr>
			</table>
		</form>
	</body>
</html>
-->
>>>>>>> 00df1daf09906181718eb2672f29a318cd9d38f0
