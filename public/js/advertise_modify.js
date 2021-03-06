
function adNew(){
	var adr_ctr = $("#adr_ctr").val();
	
	var name = $("#adm_name").val();
	var link = $("#adm_link").val();
	var location = $("#adm_location").val();
	var comment = $("#adm_comment").val();
	
	var img = $("#input_file");
	
	if (img[0].files && img[0].files[0])
		var img1 = img[0].files[0]; // 임시
	//var comment = idx["comment"].value;
	
	if(name==""){
		alert("Please enter the name");
	}
	else if(link==""){
		alert("Please enter the link");	
	}
	else if(location==""){
		alert("Please enter the link");	
	}
	else{
		data = new FormData();
		
	    data.append("img", img1);
	    data.append("location", location);
	    data.append("name", name);
	    data.append("link", link);
	    data.append("comment", comment);
	    
	    $.ajax({
	        data: data,
	        type: "POST",
	        async: false,
	        url: adr_ctr + "Advertise/create",
	        cache: false,
	        contentType: false,
	        processData: false,
			success: function(result){
				//alert (JSON.stringify(result));
				result = JSON.parse(result);
				
				if (result.code == 1){
					alert("등록되었습니다.");
					top.document.location.href = adr_ctr + "Advertise/index";
				}
				else
					alert("잘못된 접근입니다.");
			},
			error: function(request, status, error){
				console.log(request.responseText);
				alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
			}
		});
	}
}


function adUpdate(idx){
	var adr_ctr = $("#adr_ctr").val();
	
	var name = $("#adm_name").val();
	var link = $("#adm_link").val();
	var comment = $("#adm_comment").val();
	
	var img = $("#input_file");
	
	if (img[0].files && img[0].files[0])
		var img1 = img[0].files[0]; // 임시
	else
		var img1 = '';
	//var comment = idx["comment"].value;
	
	if(name==""){
		alert("Please enter the name");
	}
	else if(link==""){
		alert("Please enter the link");	
	}
	/*
	else if(comment==""){
		alert("Please write the comment");
	}
	*/
	else{
		data = new FormData();
		
	    data.append("img", img1);
	    data.append("idx", idx);
	    data.append("name", name);
	    data.append("link", link);
	    data.append("comment", comment);
	    
	    $.ajax({
	        data: data,
	        type: "POST",
	        async: false,
	        url: adr_ctr + "Advertise/update",
	        cache: false,
	        contentType: false,
	        processData: false,
			success: function(result){
				//alert (JSON.stringify(result));
				result = JSON.parse(result);
				
				if (result.code == 1){
					alert("수정되었습니다.");
					location.href = adr_ctr + "Advertise/index";
				}
				else{
					alert("잘못된 접근입니다.");
				}
			},
			error: function(request, status, error){
				console.log(request.responseText);
				alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
			}
		});
	}
}

function checkNameId(i){
	var id = $(i).val();
	
	if (id.length > 30){
		alert("최대 30자 입니다.");
		$(i).focus();
	}
}

function checkLink(i){
	var id = $(i).val();
	
	if (id.length > 250){
		alert("최대 250자 입니다.");
		$(i).focus();
	}
}
