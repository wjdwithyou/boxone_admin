function adModify(ad_idx){
	var logined = $("logined").val();
	var adr_ctr = $("#adr_ctr").val();
	
	if (logined == '0'){
		alert("잘못된 접근입니다.");
		location.href = adr_ctr + "Login/index";
	}
	
	location.href = adr_ctr+"Advertise/indexModify?idx="+ad_idx;
}