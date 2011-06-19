
traeder = new Object();

$('#index').live('pagebeforecreate',function(event){
	
	traeder.checkLogin();
	
});

$('#login').live('pagebeforecreate',function(event){
	
	$('#login_submit').click(function () {
		traeder.submitLogin(); 
	});
	
});

traeder.checkLogin = function() {
	
	var traeder_cookie=getCookie("traeder_cookie");
	
	if (traeder_cookie!=null && traeder_cookie!="") {
		alert("logged in "+traeder_cookie);
	}
	
	else {
		alert('not logged in'); 		
		window.location = "/login.php"
	}
}

traeder.submitLogin = function() {
	
	var username = $('#login_username').val(); 
	var password = $('#login_password').val();
	
	var data ='username='+username+'&password='+password

	$.ajax({
	  type: 'POST',
	  url: '/account/api/authenticate',
	  data: data,
	  success: function(result) {
  		alert(result); 
  		}
	});
	
}





function getCookie(c_name)
{
var i,x,y,ARRcookies=document.cookie.split(";");
for (i=0;i<ARRcookies.length;i++)
{
  x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
  y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
  x=x.replace(/^\s+|\s+$/g,"");
  if (x==c_name)
    {
    return unescape(y);
    }
  }
}
