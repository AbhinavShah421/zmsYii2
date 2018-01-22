$('#loginSubmit').click(function(){
	var data=$('#login-form').serialize();
	$.ajax({
		  url:$("#login-url").val(),
		  type:"post",
		  data:data, 
		  success : function (response) {
						 var response = $.parseJSON(response);
						 window.location.href = "index";					
//				
			},
				error : function(bb) { 
					alert("page found success fullerrrorrrrr"); 
					}
	});
//		  beforeSend: function( xhr ) {
//		    xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
//		  }
//		})
//		  .done(function( data ) {
//		    if ( console && console.log ) {
//		      console.log( "Sample of data:", data.slice( 0, 100 ) );
//		    }
			
			
			var data={'list_user':'list_user'}
			$.ajax({ url:"/zmsYii2/user/dashboard",
				type:"post",
				data:data, 
				success : function (response) {
				
						 $("#dash-contant").html(response); 
								
				},
					error : function(bb) { 
						 }
					});
		
});
//.................................submenu.....................
$(".main-menu").click(function(){
//	alert("working");
});