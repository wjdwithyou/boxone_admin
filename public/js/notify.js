
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
function noDelete(idx){
	
	var adr_ctr = $("#adr_ctr").val();
	
	var result = confirm('정말로 지우실거에요?');

        if(result) {
                       
        } else {
            return;
        }

		
	$.ajax({
		url: adr_ctr + 'Notify/delNotify',
		type: 'post',
		async: false,
		data: {
			idx: idx
		},
		success: function(result){
			alert (JSON.stringify(result));
			result=JSON.parse(result);
			
			if(result.code==1){
				alert("삭제되었습니다.");
				location.href = adr_ctr + 'Notify/test';	
			}
			else{
				alert("삭제실패ㅠ");
			}
		},
		error: function(request, status, error, result){
			alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
		}
	}); 
}
function noModify(e, idx){
	
	if(!(e.closest("table").find(".mod_content").is(":visible"))){
		e.closest("table").find(".ori_content").hide();
		e.closest("table").find(".mod_content").show();
		e.closest("table").find(".reply_modify_show").show();
		e.closest("table").find(".reply_del_show").hide();
	}
	else{
		alert("수정!");
		var adr_ctr = $("#adr_ctr").val();
		var contents = e.closest("table").find("#reply_write_content").val();
		alert(idx);
		alert(contents);
		
		$.ajax({
			url: adr_ctr + 'Notify/modNotify',
			type: 'post',
			async: false,
			data: {
				idx: idx,
				contents: contents				
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
}
function clearModify(e){
	
	e.closest("table").find(".ori_content").show();
	e.closest("table").find(".mod_content").hide();
	e.closest("table").find(".reply_modify_show").hide();
	e.closest("table").find(".reply_del_show").show();
		
}
