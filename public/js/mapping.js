var adr_ctr = $("#adr_ctr").val();

function proSearch(){
	var adr_ctr = $("#adr_ctr").val();
	var category = $("#small option:selected").val();
	var brand = $("#brand option:selected").val();
	var name = $("#product_name").val();

    $.ajax({
        url: adr_ctr + "Mapping/search",
        type: "POST",
        async: false,
        data:{
        	category : category,
        	name : name,
        	brand : brand
		},
		success: function(result){
			$("#search_result").html(result);
		},
		error: function(request, status, error){
			console.log(request.responseText);
			alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
		}
	});
	
}

function changebrand(){
	var adr_ctr = $("#adr_ctr").val();
	var category = $("#small option:selected").val();
	alert(category);
	
	data = new FormData();

    data.append("category", category);
	
    $.ajax({
        data: data,
        type: "POST",
        async: false,
        url: adr_ctr + "Mapping/changeCategory",
        cache: false,
        contentType: false,
        processData: false,
		success: function(result){
			alert (JSON.stringify(result));
			result = JSON.parse(result);
			var len = result.data.length;
			
			$("#brand").html('');
			$("#brand").append("<option value='0'>전체선택</option>");
			for (var i = 0 ; i < len ; i++)
				$("#brand").append("<option>" + result.data[i].brand + "</option>");
			
			if (result.code == 1){
				//alert("카테고리검색!");
				//location.href = adr_ctr + "Mapping/mapping";
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

function bind($count){
	var category = $("#small option:selected").val();
	var brand = $("#brand option:selected").val();
	var name = $("#product_name").val();
	var adr_ctr = $("#adr_ctr").val();
	var cnt=0;
	var list=[];
	var min_price=999999999;
	var min_idx, f_idx, f_pro;
	var g_cnt=0;
	var min_change=0;
	for(var i=0 ; i<$count ; i++){ //체크된 상품을 확인
		if($(".img_"+i).attr('src') == 'http://localhost:8000/img/heart_on.png'){
			//묶음상품을 선택했을 경우
			if($("#m_img_"+i).text()=="1"){
				g_cnt++;
				if(g_cnt==2){
					alert("묶인상품은 하나만 선택해주세요");
					$("#search_result").html(result);									
				}
				f_idx=$("#b_idx_"+i).text();
				f_pro=$("#idx_pro_"+i).text();
			}
			else{
				list[cnt]=$("#idx_pro_"+i).text();
			}
			//가격비교를한다..			
			if(min_price>parseInt($("#price_"+i).text())){
				min_price=parseInt($("#price_"+i).text());
				min_idx=$("#idx_pro_"+i).text();
			}
			cnt++;
		}
	}
	if( g_cnt==1 && min_idx!=f_pro ){
		alert("최저가가 바꼈습니다");
		min_change=1;	
	}
	
	alert(list+"총 "+cnt+"개의 상품이 묶이길바랍니다.");
	alert("최저가 상품은 "+min_idx+"번째상품 "+min_price+"원입니다.");
	
	$.ajax({
		url: adr_ctr + "Mapping/binding",
		type: 'post',
		async: false,
		data: {
			category: category,
			brand: brand,
			name: name,
			cnt: cnt,
			list: list,
			f_idx: f_idx,
			f_pro: f_pro,
			min_idx: min_idx,
			min_change: min_change
		},
		success: function(result){
			alert(JSON.stringify(result));
			$("#search_result").html(result);
		},
		error: function(request, status, error){
			console.log(request.responseText);
			alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
		}
	});
	
}

function detail($b_idx){
	
	$.ajax({
		url: adr_ctr + "Mapping/bindingDetail",
		type: 'post',
		async: false,
		data: {
			b_idx: $b_idx					
		},
		success: function(result){
			if (1){
				alert("상세페이지!");
				window.open= adr_ctr + "Mapping/bindingDetail";
			}
			else{
				alert("상세페이지실패.");
			}
		},
		error: function(request, status, error, result){
			console.log(request.responseText);
		    alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
		}
	});
	
}

function test($i){

	var src = ($(".img_"+$i).attr('src') == 'http://localhost:8000/img/heart.png')
	            ? 'http://localhost:8000/img/heart_on.png'
	            : 'http://localhost:8000/img/heart.png';
	         $(".img_"+$i).attr('src', src);
}
