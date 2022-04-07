<script type="text/javascript">
    
    function viewProfile(event){
        event.preventDefault();
        $.ajax({
            url: "{{ url('/view-profile') }}",
            method: 'GET',
            cache: false,
            success: function(html){
                $('.main-d').html(html);
            }
        });
    }

    function updateProfile(event){
       event.preventDefault();
       $.ajax({
           url: "{{ url('/update-profile-page') }}",
           method: 'GET',
           cache: false,
           success: function(html){
               $('.main-d').html(html);
           }
       });
    }

    function returnDashboard(event){
        event.preventDefault();
        window.location.href = "{{ url('/dashboard') }}";
    }

    function updateUsernameAndPassword(event){
        $.ajax({
            url: "{{ url('/update-username-and-password') }}",
            method: 'GET',
            cache: false,
            success: function(html){
                $('.main-d').html(html);
            }
        });
    }

</script>