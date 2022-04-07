<script type="text/javascript">

    $('#goToChangeAvatar').on('click', function(e){
        e.preventDefault();
        $.ajax({
            url: '/goToChangeAvatar',
            method: 'get',
            cache: false,
            success: function(html){
                $('#preferences').hide();
                $('#preferences').after('<section id="changeAvatarPage"></section>');
                $('#changeAvatarPage').html(html);
            }
        })
    });  
    
</script>