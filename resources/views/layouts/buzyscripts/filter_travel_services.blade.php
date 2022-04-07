<script type="text/javascript">

function filterTravelServices(event){
    event.preventDefault();
    $('#travel-services-filter-btn').attr('disabled', true);    
    // const inputToken = $('#travel-filter-form input[name="_token"]');
	// const token = inputToken.val();
    
    $('#industryFilter').bind('click', function(){
    $('#service-filter-text').text('');
    $('#travel-services-filter-btn').attr('disabled', false);
    });

    const serviceValue = $('#industryFilter').val();
    console.log('service value: ', serviceValue);

    const regionValue = $('.select2').val();
    console.log('region value: ', regionValue);

    if (!serviceValue){
        $('#service-filter-text').text('Service is required').css('color', '#D24D57');
    }

    if (serviceValue && regionValue){
        callTravelFilter();
    }
    
    function callTravelFilter(){
    $.ajax({
        url: '{{ url("/filter-travel-services") }}',
        method: 'POST',
        data: { 
		_token: function() {
            return "{{csrf_token()}}"
        },
		serviceValue,
		regionValue,
	    },
        cache: false,
	    success: function (html){
            // $('#travel-services').hide();
            $('#travel-services').html('<div id="result-travel-services"></div>');
            $('#result-travel-services').html(html);          
        }
    });
    }
}


function filterStandardTravelServices(event){
    event.preventDefault();
    $('#travel-services-filter-btn').attr('disabled', true);    
    // const inputToken = $('#travel-filter-form input[name="_token"]');
	// const token = inputToken.val();
    
    $('#industryFilter').bind('click', function(){
    $('#service-filter-text').text('');
    $('#travel-services-filter-btn').attr('disabled', false);
    });

    const serviceValue = $('#industryFilter').val();
    const regionValue = $('.select2').val();

    if (!serviceValue){
        $('#service-filter-text').text('Service is required').css('color', '#D24D57');
    }

    if (serviceValue && regionValue){
        callStandardTravelFilter();
    }
    
    function callStandardTravelFilter(){
    $.ajax({
        url: '{{ url("/filter-standard-travel-services") }}',
        method: 'POST',
        data: { 
		_token: function() {
            return "{{csrf_token()}}"
        },
		serviceValue,
		regionValue,
	    },
        cache: false,
	    success: function (html){
            // $('#travel-services').hide();
            $('#travel-services').html('<div id="result-standard-travel-services"></div>');
            $('#result-standard-travel-services').html(html);          
        }
    });
    }
}

</script>