
$(document).ready(function(){	  
	   //...............................showing users.........................
			
			
			$('#suggestAnimal').on('input',function(){		
			
				$.get("/zmsYii2/animalmaster/datalistanimals", {search: $(this).val()}, function(data){			
					$("datalist").empty();
					$("datalist").html(data);
				});		
				var opt = $('#datalistanimals option[value="'+$(this).val()+'"]');
			//	alert(opt.data('id'));
				if(opt.data('id')!=undefined){
				var data={'modifyid':opt.data('id')}; 
				$.ajax({ url:"/zmsYii2/animalmaster/updateanimal",
					type:"post",
					data:data, 
					success : function (response) {
						    
							 $("#main_contant").html(response); 
					         $("#main_heading").html("<h4> Modify"+" "+opt.val()+"</h4>")		 
					},
						error : function(bb) { 
							alert("page found success fullerrrorrrrr"); }
						});
				}
			});
			
			
			$('#suggest').on('input',function(){		
				$.get("/zmsYii2/usermaster/datalistuser", {search: $(this).val()}, function(data){			
					$("datalist").empty();
					$("datalist").html(data);
				});		
				var opt = $('#browsers option[value="'+$(this).val()+'"]');
				
				if(opt.data('id')!=undefined){
				var data={'modifyid':opt.data('id')}; 
				$.ajax({ url:"/zmsYii2/usermaster/updateuser",
					type:"post",
					data:data, 
					success : function (response) {
						    
							 $("#main_contant").html(response); 
					         $("#main_heading").html("<h4> Modify"+" "+opt.val()+"</h4>")		 
					},
						error : function(bb) { 
							alert("page found success fullerrrorrrrr"); }
						});
				}
			});
			/*
			 * serching zoo....................
			 * 
			 * 
			 */
			$("#suggestzoo").on('input',function(){
				$.get("/zmsYii2/zoomaster/datalistzoo",{search:$(this).val()}, function(data){
					$("datalist").empty();
                     $("datalist").html(data);
				});
				
				var opt = $('#browsers option[value="'+$(this).val()+'"]');
				
				if(opt.data('id')!=undefined){
				var data={'modifyid':opt.data('id')}; 
				$.ajax({ url:"/zmsYii2/zoomaster/updatezoo",
					type:"post",
					data:data, 
					success : function (response) {
						    
							 $("#main_contant").html(response); 
					         $("#main_heading").html("<h4> Modify"+" "+opt.val()+"</h4>")		 
					},
						error : function(bb) { 
							alert("page found success fullerrrorrrrr"); }
						});
				}
				
			});
	
});
//............................adding users......................................
$('#add_user').click(function(){
//	alert("working");
	var name=$("#add_user").attr('name');  
	var data={'username':name}; 
	$.ajax({ url:"/zmsYii2/usermaster/create",
		type:"post",
		data:data, 
		success : function (response) {
				 $("#main_contant").html(response); 
		          $("#main_heading").html("<h4>Add New User</h4>")		 
		},
			error : function(bb) { 
				alert("page found success fullerrrorrrrr"); }
			});
	

});
/*
 *...............................listing users.............................
 */

$('#list_user').click(function(){
	var data={'listusers':'listusers'}; 
	$.ajax({
	url:"/zmsYii2/usermaster/index",
	type:"post",
	data:data, 
	success : function (response) {
		
			 $("#main_contant").html(response); 
	         
	},
		error : function(bb) { 
			 }
		});
});


/*
*listing animals.........................................
*/


$("#listAnimals").click(function(){
//	alert("working");
	var data={'listanimals':'listanimals'}; 
	$.ajax({
	url:"/zmsYii2/animalmaster/index",
	type:"post",
	data:data, 
	success : function (response) {
		
			 $("#main_contant").html(response); 
	         
	},
		error : function(bb) { 
			 }
		});
});  

/*
 adding animals................................................
 
 * */
/*$(".addanimal").click(function(){
//	alert("working");
	var data={'addanimal':'addanimal'}; 
	$.ajax({
	url:"/zmsYii2/animalmaster/create",
	type:"post",
	data:data, 
	success : function (response) {
		
			 $("#main_contant").html(response); 
	         
	},
		error : function(bb) { 
			 }
		});
});*/
/*
 * dashboard ajax call.........................................
 * 
 */

/*$(".dashboard").click(function(){
	var data={'dashboard':'dashboard'}; 
	$.ajax({
	url:"/zmsYii2/site/index",
	type:"post",
	data:data, 
	success : function (response) {
		
			 $("#main_contant").html(response); 
	         
	},
		error : function(bb) { 
			 
		  }
		});
	
	var data={'list_user':'list_user'}
	$.ajax({ url:"/zmsYii2/user/dashboard",
		type:"post",
		data:data, 
		success : function (response) {
			
				 $("#dash-contant").html(response); 
		          $("#main_heading").html("<h4>Manager And Zoo Details</h4>")		 
		},
			error : function(bb) { 
				 }
			});
});*/
/*
*  Manage zoo assign manager ajax call..................................
*  
*/

$("#managezoo").click(function(){
	var data={'managezoo':'managezoo'}
	$.ajax({
		url:"/zmsYii2/userzoomap/create",
	    type:'post',
	    data:data,
	    success: function(response){
	    	 $("#main_contant").html(response); 
	    },
	    error: function(err){
	    	alert(err);
	    }
	});
});
/*
 * Add Zoo Ajax call.......................................................
 * 
 * 
 */
$(".add_zoo").click(function(){
	var data={'addzoo':'addzoo'}
	$.ajax({
		url:"/zmsYii2/zoomaster/create",
	    type:'post',
	    data:data,
	    success: function(response){
	    	 $("#main_contant").html(response); 
	    },
	    error: function(err){
	    	alert(err);
	    }
	});
});
/*
 * Listing zoo.......................................................................
 * 
 * 
 */

$(".zoodata").click(function(){
	var data={'listzoo':'listzoo'}; 
	$.ajax({
	url:"/zmsYii2/zoomaster/index",
	type:"post",
	data:data, 
	success : function (response) {
		
			 $("#main_contant").html(response); 
	         
	},
		error : function(bb) { 
			 
		}
		});
});
/*
 *managezoo user.......................................................................... 
 * 
 */
