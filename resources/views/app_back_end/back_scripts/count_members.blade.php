<script>

// $(function() {
//     startRefresh();
// });

// function startRefresh() {
//     setTimeout(startRefresh, 8000);
//     countMembersNotifications();
//     dropDownListOfMembers();
// }

function countMembersNotifications(){
    $.ajax({
        url: "{{ url('/count-members-notifications') }}",
        method: 'GET',
        cache: false,
        dataType: 'JSON',
        success: function(response){
            const noOfMembers = response;
            $('.rd-count').text(noOfMembers);
            if (noOfMembers == 0){
                $('.rd-count').addClass('badge-light');
            } else {
                $('.rd-count').addClass('badge-danger');
                $('.rd-count').removeClass('badge-light');
            } 
        }
    });
}

function dropDownListOfMembers(){
    $.ajax({
        url: "{{ url('/drop-down-list-of-members-notifications') }}",
        method: 'GET',
        cache: false,
        success: function(html){
            $('.list-menu').html(html);
        }
    });
}

</script>