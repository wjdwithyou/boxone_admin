
function justLogin(){
	//location.href = "http://localhost:8000/Advertise/index";
	//location.href = adr_ctr + "Advertise/index";
	
	var adr_ctr = $("#adr_ctr").val();
	
	var id = $("#id").val();
	var pw = $("#pw").val();
	
	//var lg = $("#logined").val();
	//var ss = $_SESSION['idx'];
	
	//alert(id);
	//alert(lg);
	//alert(ss);
	
	
	
	$.ajax({
		url: adr_ctr + 'Login/login',
		type: 'post',
		async: false,
		data: {
			id: id,
			pw: pw
		},
		success: function(result){
			//alert (JSON.stringify(result));
			result = JSON.parse(result);
			
			alert(result.code);
			
			if (result.code == 1){
				alert("로그인되었습니다.");
				alert(adr_ctr + "Advertise/index");
				location.href = adr_ctr + "Advertise/index";
			}
			else
				alert("잘못된 정보를 입력하셨습니다.");
		},
		error: function(request, status, error, result){
			//console.log(request.responseText);
		    alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
		}
	});
}