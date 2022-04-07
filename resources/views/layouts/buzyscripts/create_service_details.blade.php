<script type="text/javascript">

    $('#goToListOfServiceDetails').on('click', function(e){
        e.preventDefault();
        $.ajax({
            url: "{{ url('/show-list-of-services-details') }}",
            method: 'get',
            cache: false,
            success: function(html){
                $('.service-space').html(html);
            }
        })
    });  
    
</script>