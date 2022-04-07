<script>

// $(function() {
//     startRefreshCustomer();
// });

// function startRefreshCustomer() {
//     setTimeout(startRefreshCustomer,3000);
//     // tempNotifs();
//     custCountBookNotifications();
//     custDropDownListOfBookings();
// }


function custCountBookNotifications(){
    $.ajax({
        url: "{{ url('/cust-count-book-notifications') }}",
        method: 'GET',
        cache: false,
        dataType: 'JSON',
        success: function(response){
            const noOfBookings = response;
            $('.cust-notif-count').text(noOfBookings);
            if (noOfBookings == 0){
                $('.cust-notif-count').addClass('badge-light');
            } else {
                $('.cust-notif-count').addClass('badge-danger');
                $('#cust-notif-count').removeClass('badge-light');
            }
        }
    });
}

function custDropDownListOfBookings(){
    $.ajax({
        url: "{{ url('/cust-drop-down-list-of-notifications') }}",
        method: 'GET',
        cache: false,
        success: function(html){
            $('.cust-list-menu').html(html);
        }
    });
}


</script>