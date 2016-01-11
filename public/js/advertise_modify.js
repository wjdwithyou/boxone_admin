/*
 * 확인버튼 누르기전에 필요한 과정들
 * 작성자: 박예리
 * 날짜: 2016-01-07
 */


// 수정이므로 기존 내용을 불러온다.
/*
$(document).ready(function() {
	if ($("#comm_idx").length > 0)
	{
		var comm_idx = $("#comm_idx").val();
		var adr_ctr = $("#adr_ctr").val();
		$.ajax
		({
			url: adr_ctr+"Community/getModifyContent",
			type: 'post',
			async: false,
			data:{
				idx: comm_idx,
				adr_ctr: adr_ctr
			},
			success: function(result)
			{
				//alert (JSON.stringify(result));
				result = JSON.parse(result);
				if (result.code)
				{
					var cate = result.data.cate;
					for (var i = 0 ; i < cate.length ; i++)
						stackCate(cate[i][0], cate[i][1]);
					
					$("#cmw_title").val(result.data.title);
					$(".panel-body").html(result.data.contents);
					
					tempImgNum = result.num;
				}
				else
				{
					alert ("권한이 없습니다.");
					history.back();
				}
			},
			error: function(request,status,error)
			{
				console.log(request.responseText);
			    alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
			}
		});	
	}
});

//내용이 입력되어있는가 확인하기
function adModify(theForm){
	var name = theForm["name"].value;
	var link = theForm["link"].value;
	var comment = theForm["comment"].value;
	
	if(name==""){
		alert("Please enter the name");
	}
	else if(link==""){
		alert("Please enter the link");	
	}
	else if(comment==""){
		alert("Please write the comment");
	}
	else{
		alert("ok");
	}
	
	
}
/*
function adModify2(idx)
{
	var name = $("#ad_name").val();
	var comment = $(".panel-body").html();
	var link = $("#ad_link").val();
	
	if (name == "")
		alert ("Please enter a name");
	else if (link == "")
		alert ("Please enter a link");
	else if (comment == "")
		alert ("Please write comment");
	else
		$.ajax
		({
			url: adr_ctr+"Community/update",
			type: 'post',
			async: false,
			timeout: 10000,
			data:{
				idx: idx,
				cate: cate,
				title: title,
				content: content
			},
			success: function(result)
			{
				//alert (JSON.stringify(result));
				result = JSON.parse(result);
				if (result.code == 1)
				{
					var adr_ctr = $("#adr_ctr").val();
					alert ("게시글이 수정되었습니다.");
					chkWrite = false;
					location.href = adr_ctr + "Community/indexContent?idx=" + result.data;  
				}
				else
					alert ("잘못된 접근입니다.");
			},
			error: function(request,status,error)
			{
				console.log(request.responseText);
			    alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
			}
		});
	
}

*/


/*
 * 업로드 이미지 미리보기
 * 작성자: 박예리
 * 날짜: 2016-01-07
 */  

/*
$(document).ready(function(){
		$.fn.setPreview = function(opt){
		    "use strict";
		    var defaultOpt = {
		        inputFile: $(this),
		        img: null,
		        w: 200,
		        h: 200
		    };
		    $.extend(defaultOpt, opt);
		 
		    var previewImage = function(){
		        if (!defaultOpt.inputFile || !defaultOpt.img) return;
		 
		        var inputFile = defaultOpt.inputFile.get(0);
		        var img       = defaultOpt.img.get(0);
		 
		        // FileReader
		        if (window.FileReader) {
		            // image 파일만
		            if (!inputFile.files[0].type.match(/image\//)) return;
		 
		            // preview
		            try {
		                var reader = new FileReader();
		                reader.onload = function(e){
		                    img.src = e.target.result;
		                    img.style.width  = defaultOpt.w+'px';
		                    img.style.height = defaultOpt.h+'px';
		                    img.style.display = '';
		                };
		                reader.readAsDataURL(inputFile.files[0]);
		            } catch (e) {
		                // exception...
		            }
		        // img.filters (MSIE)
		        } else if (img.filters) {
		            inputFile.select();
		            inputFile.blur();
		            var imgSrc = document.selection.createRange().text;
		 
		            img.style.width  = defaultOpt.w+'px';
		            img.style.height = defaultOpt.h+'px';
		            img.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(enable='true',sizingMethod='scale',src=\""+imgSrc+"\")";            
		            img.style.display = '';
		        // no support
		        } else {
		            // Safari5, ...
		        }
		    };
		 
		    // onchange
		    $(this).change(function(){
		        previewImage();
		    });
		};
		 
		 
		$(document).ready(function(){
		    var opt = {
		        img: $('#img_preview'),
		        w: 250,
		        h: 167
		    };
		 
		    $('#input_file').setPreview(opt);
		});
});
*/

/*
function func(){
	// var adr_ctr
	
	if (img[0].files && img[0].files[0])
		var img1 = img[0].files[0];
	
	data = new FormData();
	
	data.append("img", img1);
	
	$.ajax({
        data: data,
        type: "POST",
        url: adr_ctr + "Advertise/update",
        cache: false,
        contentType: false,
        processData: false,
		success: function(result){
			//alert (JSON.stringify(result));
			result = JSON.parse(result);
			
			if (result.code == 1){
				var adr_ctr = $("#adr_ctr").val();
				alert("수정되었습니다.");
				chkWrite = false;
				location.href = adr_ctr + "Advertise/index";
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
*/

var chkWrite = true;

function adUpdate(idx){
	var adr_ctr = $("#adr_ctr").val();
	
	var name = $("#adm_name").val();
	var link = $("#adm_link").val();
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
	        url: adr_ctr + "Advertise/update",
	        cache: false,
	        contentType: false,
	        processData: false,
			success: function(result){
				//alert (JSON.stringify(result));
				result = JSON.parse(result);
				
				if (result.code == 1){
					alert("수정되었습니다.");
					chkWrite = false;
					location.href = adr_ctr + "Advertise/index";
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



