function justLogin(){
	var adr_ctr = $("#adr_ctr").val();
	
	var id = $("#login_id").val();
	var pw = $("#login_pw").val();
	
	$.ajax({
		url: adr_ctr + 'Login/login',
		type: 'post',
		async: false,
		data: {
			id: id,
			pw: pw
		},
		success: function(result){
			result = JSON.parse(result);
			
			if (result.code == 1){
				alert("Admin Page Login");
				//href = ...
			}
			else
				alert("잘못된 정보를 입력하셨습니다.");
		},
		error: function(request, status, error){
			console.log(request.responseText);
		    alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
		}
	});
}