<script>

// $(function() {
//     startRefresh();
// });

// function startRefresh() {
//     setTimeout(startRefresh,3000);
//     // tempNotifs();
//     countBookNotifications();
//     dropDownListOfBookings();
// }

function countBookNotifications(){
    $.ajax({
        url: "{{ url('/count-book-notifications') }}",
        method: 'GET',
        cache: false,
        dataType: 'JSON',
        success: function(response){
            const noOfBookings = response;
            $('.notif-count').text(noOfBookings);
            if (noOfBookings == 0){
                $('.notif-count').addClass('badge-light');
            } else {
                $('.notif-count').addClass('badge-danger');
                $('.notif-count').removeClass('badge-light');
            } 
        }
    });
}

function dropDownListOfBookings(){
    $.ajax({
        url: "{{ url('/drop-down-list-of-notifications') }}",
        method: 'GET',
        cache: false,
        success: function(html){
            $('.list-menu').html(html);
        }
    });
}

</script>