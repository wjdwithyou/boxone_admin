
function justTest(){
	var adr_ctr = $("#adr_ctr").val();
	
	var contents = $("#reply_write_content").val();
	var nickname = $("#nickname").val();
	var idx = $("#idx").val();
	
	
	$.ajax({
		url: adr_ctr + 'Notify/addNotify',
		type: 'post',
		async: false,
		data: {
			contents: contents,
			nickname: nickname,
			idx: idx
		},
		success: function(result){
			alert (JSON.stringify(result));
			result = JSON.parse(result);
			location.href= adr_ctr + 'Notify/test';			
		},
		error: function(request, status, error, result){
			//console.log(request.responseText);
		    alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
		}
	});
}