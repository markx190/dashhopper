<script type="text/javascript">

function startPage(){
	$('.contenSpinner').show()
	setTimeout(getMainContent, 3000);
}

function getMainContent(){
    $.ajax({
	url: "/mainContent",	
	type: "get",		
	cache: false,
	success: function (html){
		$('#mainContent').html(html);
		$('.contentSpinner').hide();	
		}
    });
}



</script>