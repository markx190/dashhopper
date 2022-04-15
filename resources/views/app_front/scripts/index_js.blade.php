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

    if (searchTravelDate){
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
                $('.search-spinner').html('<br /><br /><div class="spinner-dash" style="text-align: center;"><img class="displayed" src="/bookhivez/images/ajax-loader-circle.gif" /></div>');  
                setTimeout(hideSpinner, 1000); 
                var sResults = html;
                function hideSpinner(){
                    $('.search-spinner').html(sResults);
                }
            }
        });
    }
}

function bookATrip(button){
    var bookId = button.getAttribute('data-bus-id');
    console.log('id: ', bookId);
}
</script>