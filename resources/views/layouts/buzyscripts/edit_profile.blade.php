<script type="text/javascript">

    $('#goToEditProfile').on('click', function(e){
        e.preventDefault();
        $.ajax({
            url: '/goToEditProfile',
            method: 'get',
            cache: false,
            success: function(html){
                $('#preferences').hide();
                $('#preferences').after('<section id="editProfilePage"></section>');
                $('#editProfilePage').html(html);
            }
        })
    });  

</script>