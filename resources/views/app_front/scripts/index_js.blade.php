<script>

    function submitBookingSearch(event){

        var searchTravelDate = $('.s-travel-date').val();
        var searchBusType = $('.s-bus-type').val();
        var searchTravelOrigin = $('.s-travel-origin').val();
        var searchTravelDestination = $('.s-travel-destination').val();

        if (!searchTravelDate){
            $('#s-travel-date-text').text('Travel Date is Required').css('color', '#D24D57');
            $('#search-travel-btn').attr('disabled', true);
        }

        $('.s-travel-date').bind('click', function(){
            $('#s-travel-date-text').text('');
            $('#search-travel-btn').attr('disabled', false);
        });

        // if (!searchBookingType){
        //     $('#s-booking-type-text').text('Booking Type is Required').css('color', '#D24D57');
        //     $('#search-travel-btn').attr('disabled', true);
        // }

        // $('.s-booking-type').bind('click', function(){
        //     $('#s-booking-type-text').text('');
        //     $('#search-travel-btn').attr('disabled', false);
        // });

        // if (!searchTravelOrigin){
        //     console.log('origin: ', searchTravelOrigin);
        //     $('#s-travel-origin-text').text('Origin is Required').css('color', '#D24D57');
        //     $('#search-travel-btn').attr('disabled', true);
        // }

        // $('.s-travel-origin').bind('click', function(){
        //     $('#s-travel-origin-text').text('');
        //     $('#search-travel-btn').attr('disabled', false);
        // });

        // if (!searchTravelDestination){
        //     $('#s-travel-destination-text').text('Destination is Required').css('color', '#D24D57');
        //     $('#search-travel-btn').attr('disabled', true);
        // }

        // $('.s-travel-destination').bind('click', function(){
        //     $('#s-travel-destination-text').text('');
        //     $('#search-travel-btn').attr('disabled', false);
        // });

    if (searchTravelDate) {
        $.ajax({
            
            url: "{{ url('/search_trips') }}",
            method: 'POST',
            data: { 
                _token: function() {
                    return "{{ csrf_token() }}"
                },
            searchTravelDate,
            searchBusType,
            searchTravelOrigin,
            searchTravelDestination
              
            },
            cache: false,
            success:function(html){
                $('.search-spinner').html('<div class="spinner-dash" style="text-align: center;"><img class="displayed" src="/bookhivez/images/ajax-loader-circle.gif" /></div>');  
                setTimeout(hideSpinner, 1000); 
                var sResults = html;
                function hideSpinner(){
                    $('.search-spinner').html(sResults);
                }
            }
        });
    }
    
}



</script>