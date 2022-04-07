<script type="text/javascript">

function addSkills(event){
    event.preventDefault();
    $.ajax({
        url: '/admin_skills_page',
        method: 'GET',
        cache: false,
        success: function(html){
            $('.skill-space').html(html);
        }
    });
}

function listOfSkills(event){
    event.preventDefault();
    $.ajax({
        url: '/list-of-skills',
        method: 'GET',
        cache: false,
        success: function(html){
            $('.skill-space').html(html);
        }
    });
}

function listOfServicesDetails(event){
    event.preventDefault();
    $.ajax({
        url: "{{ url('/list-of-services-details') }}",
        method: 'GET',
        cache: false,
        success: function(html){
            $('.skill-space').html(html);
        }
    });
}

function listOfUsers(event){
    event.preventDefault();
    $.ajax({
        url: '/list-of-users',
        method: 'GET',
        cache: false,
        success: function(html){
            $('.skill-space').html(html);
        }
    });
}

function listOfTransactions(event){
    event.preventDefault();
    $.ajax({
        url: '/list-of-transactions',
        method: 'GET',
        cache: false,
        success: function(html){
            $('.skill-space').html(html);
        }
    });
}

function listOfBookings(event){
    event.preventDefault();
    $.ajax({
        url: "{{ url('/list-of-bookings') }}",
        method: 'GET',
        cache: false,
        success: function(html){
            $('.booking-space').html(html);
        }
    });
}

function clientListOfBookings(event){
    event.preventDefault();
    $.ajax({
        url: "{{ url('/client-list-of-bookings') }}",
        method: 'GET',
        cache: false,
        success: function(html){
            $('.booking-space').html(html);
        }
    });
}

$('#booking').hover(function(){
    $(this).css('color', '#D24D57');
    }, function(){
    $(this).css('color', '#444444');
});

$('.profile-links').hover(function(){
    $(this).css('color', '#D24D57');
    }, function(){
    $(this).css('color', '#444444');
});

</script>