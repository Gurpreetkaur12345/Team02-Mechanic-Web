/* this is our js file */

jQuery(function(){
	jQuery(document).on("click",".btnclick",function(){
		
		var post_data = "action=custom_plugin_library&param=getPmessage";
		$.post(ajaxurl,post_data,function(response){
			console.log(response);
		});
	
	});
	
	$("#frmPost").validate({
			submitHandler:function(){
				
  				var post_data = $("#frmPost").serialize()+"&action=custom_plugin_library&param=post_form_data";
				
				$.post(ajaxurl,post_data,function(response){
					var data= $.parseJSON(response);
					console.log(data);
					console.log("Name: "+data.txtName+" Email: "+data.txtEmail);
			});
			}
})
});