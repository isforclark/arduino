$(document).ready(function(){
	console.log("ready ..");
	$.ajax({url:"http://122.117.134.145/CI/index.php/PMController/getSkill/num/10" , success: function(result){
		datas = JSON.parse(result);
		console.log("ajax..");
		var str ="";
		for(var k in datas){
			str+= "<option>"+(datas[k]['sitename'])+"</option>";
		}
        $("#sp").html(str);
        $('#sp').selectpicker('refresh');
        $('#sp').selectpicker('render');      
    }});

    $('#search').click(function(){
    	var selected = $('#sp').find('option:selected').val();
    	$.ajax({url:"http://122.117.134.145/CI/index.php/PMController/getSkill/num/10" , success: function(result){
			datas = JSON.parse(result);
			var str ="<table class='table table-responsive table-striped table-hover'><thead><tr><th>站名</th><th>即時濃度</th><th>上一小時濃度</th><th>警訊</th></tr></thead><tbody>";
			for(var k in datas){
				if(datas[k]['sitename'] == selected){
					var immediate = datas[k]['immediate'] ;
					var warn ;
					var icon ;
					if( immediate< 35 && immediate>= 0){
						warn ='正常活動';
						icon ="<i class='fa fa-smile-o' aria-hidden='true' style='color:green;'></i>";
					}else if(immediate<53 && immediate >= 35){
						warn ='正常活動:有心臟、呼吸道及心血管疾病的成人與孩童感受到徵狀時，應考慮減少體力消耗，特別是減少戶外活動。';
						icon ="<i class='fa fa-smile-o' aria-hidden='true' style='color:lightgreen;'></i>";
					}else if(immediate < 70 && immediate>=53){
						warn ='任何人如果有不適，如眼痛，咳嗽或喉嚨痛等，應該考慮減少戶外活動;有心臟、呼吸道及心血管疾病的成人與孩童，應考慮減少體力消耗，特別是減少戶外活動。老人應減少體力消耗。具有氣喘的人可能需增加使用吸入劑頻率。';
						icon ="<i class='fa fa-frown-o' aria-hidden='true' style='color:red;'></i>";
					}else{
						warn ='任何人如果有不適，如眼痛，咳嗽或喉嚨痛等，應減少體力消耗，特別是減少戶外活動;有心臟、呼吸道及心血管疾病的成人與孩童，以及老人應避免體力消耗，特別是避免戶外活動。具有氣喘的人可能需增加使用吸入劑頻率。';
						icon ="<i class='fa fa-frown-o' aria-hidden='true' style='color:red;'></i>";
					}
					str+="<tr>";
					str+= "<td>"+(datas[k]['sitename'])+"</td>";
					str+= "<td>"+(datas[k]['immediate'])+"</td>";
					str+= "<td>"+(datas[k]['onehourago'])+"</td>";		
					str+= "<td>"+icon+warn+"</td></tr>";
				}
			}
			str+="</tbody></table>";
	        $("#result").html(str);        
	    }});
    });

	$('.search_button').click(function(){
		var num = $(this).val();

		console.log(num);
		var urlStr = "http://122.117.134.145/CI/index.php/PMController/getSkill/num/"+num;
		var labels = [] ;
		var immediates = [];
		$.ajax({url:urlStr , success: function(result){
			datas = JSON.parse(result);
			console.log(datas[0]);
			var str ="<table class='table table-responsive table-striped table-hover'><thead><tr><th>站名</th><th>即時濃度</th><th>上一小時濃度</th><th>警訊</th></tr></thead><tbody>";
			for(var k in datas){
				var immediate = datas[k]['immediate'] ;
				var warn ;
				var icon ;
				if( immediate< 35 && immediate>= 0){
					warn ='正常活動';
					icon ="<i class='fa fa-smile-o' aria-hidden='true' style='color:green;'></i>";
				}else if(immediate<53 && immediate >= 35){
					warn ='正常活動:有心臟、呼吸道及心血管疾病的成人與孩童感受到徵狀時，應考慮減少體力消耗，特別是減少戶外活動。';
					icon ="<i class='fa fa-smile-o' aria-hidden='true' style='color:lightgreen;'></i>";
				}else if(immediate < 70 && immediate>=53){
					warn ='任何人如果有不適，如眼痛，咳嗽或喉嚨痛等，應該考慮減少戶外活動;有心臟、呼吸道及心血管疾病的成人與孩童，應考慮減少體力消耗，特別是減少戶外活動。老人應減少體力消耗。具有氣喘的人可能需增加使用吸入劑頻率。';
					icon ="<i class='fa fa-frown-o' aria-hidden='true' style='color:red;'></i>";
				}else{
					warn ='任何人如果有不適，如眼痛，咳嗽或喉嚨痛等，應減少體力消耗，特別是減少戶外活動;有心臟、呼吸道及心血管疾病的成人與孩童，以及老人應避免體力消耗，特別是避免戶外活動。具有氣喘的人可能需增加使用吸入劑頻率。';
					icon ="<i class='fa fa-frown-o' aria-hidden='true' style='color:red;'></i>";
				}
				str+="<tr>";
				str+= "<td>"+(datas[k]['sitename'])+"</td>";
				str+= "<td>"+(datas[k]['immediate'])+"</td>";
				str+= "<td>"+(datas[k]['onehourago'])+"</td>";		
				str+= "<td>"+icon+warn+"</td></tr>";
				labels.push(datas[k]['sitename']);
				immediates.push(datas[k]['immediate']);
				console.log(labels);
				console.log(immediates);
			}
			str+="</tbody></table>";
	        $("#result").html(str);        
	    }});
	});	
});
