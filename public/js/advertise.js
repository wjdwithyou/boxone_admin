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
		
		$("#btn_albumtype").hide();
		$("#btn_boardtype").click(function(){
			$("#btn_albumtype").show();
			$("#btn_boardtype").hide();
			$(".type_board").show();
			$(".type_album").hide();
		});
		$("#btn_albumtype").click(function(){
			$("#btn_albumtype").hide();
			$("#btn_boardtype").show();
			$(".type_board").hide();
			$(".type_album").show();
		});
		
		//Back to top
		$('body').append('<div id="toTop"><i class="fa fa-angle-double-up fa-1x"> Top</i></div>');
        $("#toTop").bind("click", function () {$("body").animate({ scrollTop: 0 }, 200);});
		$(window).scroll(function () {
			if ($(this).scrollTop() != 0) {
				$('#toTop').fadeIn();
			} else {
				$('#toTop').fadeOut();
			}
		});   
	});		
	

function adModify(ad_idx){
	var logined = $("#logined").val();
	var adr_ctr = $("#adr_ctr").val();
	
	if (logined == '0'){
		alert("잘못된 접근입니다.");
		location.href = adr_ctr + "Login/index";
	}
	
	location.href = adr_ctr+"Advertise/indexModify?idx="+ad_idx;
}
