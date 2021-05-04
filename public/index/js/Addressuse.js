$(function() {
				var html = "";
				var province_idx;
				$("#input_city").append(html);
 
				$.each(cityMessage, function(idx, item) {
					if(item.parid == '1'){
					html += "<option value='" + item.regname + "' exid='" + item.regid + "'>" + item.regname + "</option>";
                    }
			
				});
				$("#input_province").append(html);
				$("#input_province").change(function(e) {
					var province =$(this).val();
					var cityList = [];
					if(province == "") return;
					$("#input_city option").remove();
					var html = "<option value=''>--请选择--</option>";
					
//					获取已选择的省份的数组下标
					$.each(cityMessage, function(idx, item) {
						if(province == item.regname && item.parid == '1') {
							province_idx=idx
						}
					})
					
//					获取已选择的省份的城市列表
					$.each(cityMessage, function(idx, item) {
						if(cityMessage[idx].parid == cityMessage[province_idx].regid) {
							cityList.push(cityMessage[idx])
						}
					})
					
//					添加城市信息给标签
					if(cityList instanceof Array && cityList.length>0){
						$.each(cityList, function(idx, item) {
							console.log(item)
							html += "<option value='" + item.regname + "' exid='" + item.regid + "'>" + item.regname + "</option>";
							
						});
					}else{
						html += "<option value='" + cityMessage[province_idx].regname + "' exid='" + cityMessage[province_idx].regid + "'>" + cityMessage[province_idx].regname + "</option>";
							
					}
					$("#input_city").append(html);
				});
			});