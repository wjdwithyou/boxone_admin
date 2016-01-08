function adModify(ad_idx){
	// Login Check
	
	var adr_ctr = $("#adr_ctr").val();
	
	location.href = adr_ctr+"Advertise/indexModify?idx="+ad_idx;
}