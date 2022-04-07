<script type="text/javascript">

function travelServices(event){
    event.preventDefault(event);
    $.ajax({
        url: "{{ url('/travel-services') }}",
        method: 'get',
        cache: false,
        success: function(html){
            // $('#mainContent').hide();
            $('#mainContent').html('<div id="travel-services"></div>');
            $('#travel-services').html(html);
        }
    });
}

function standardTravelServices(event){
    event.preventDefault(event);
    $.ajax({
        url: "{{ url('/standard-travel-services') }}",
        method: 'get',
        cache: false,
        success: function(html){
            // $('#mainContent').hide();
            $('#mainContent').html('<div id="travel-services"></div>');
            $('#travel-services').html(html);
        }
    });
}

</script>