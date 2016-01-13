	$(document).ready(function(){
  	 	$(".sort").click(function(){
			table=$("table.title");
			tr = table.find("tr:gt(0)");
			tr.sort(function(a, b) {
			
			        var keyA = $('td:eq(2)',a).text().toLowerCase();
			        var keyB = $('td:eq(2)',b).text().toLowerCase();
			
			        return (keyA > keyB) ? 1 : 0;
			        });
			
			tr.each(function(){$(this).appendTo(table);
		
				
			});
		});
	});		
	

function adModify(ad_idx){
	var logined = $("logined").val();
	var adr_ctr = $("#adr_ctr").val();
	
	if (logined == '0'){
		alert("잘못된 접근입니다.");
		location.href = adr_ctr + "Login/index";
	}
	
	location.href = adr_ctr+"Advertise/indexModify?idx="+ad_idx;
}
