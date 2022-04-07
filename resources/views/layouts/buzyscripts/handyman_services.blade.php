<script type="text/javascript">

function handymanServices(event){
    event.preventDefault();
    $.ajax({
        url: '/handyman_services',
        method: 'get',
        cache: false,
        success: function(html){
            $('#mainContent').hide();
            $('#mainContent').after('<div id="handyman-services"></div>');
            $('#handyman-services').html(html);
        }
    });
}

</script>