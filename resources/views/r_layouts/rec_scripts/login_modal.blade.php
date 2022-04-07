<script>
    function showLoginForm(event){
        $('#loginModal').modal('show');  
        $('.login-pad').hide();
        $('#login-btn').attr('disabled', true); 
        $('.s-space').html('<div class="row spinner-red-login s-login"><div class="col-md-12"><img class="displayed" src="/reddrop_front/images/ajax-loader-circle.gif" /></div>');  
        setTimeout(hideLoginSpinner, 1000);        
    } 

    function hideLoginSpinner(){
        $('.spinner-red-login').hide();
        $('.login-pad').show();
        $('#login-btn').attr('disabled', false);
    }   
</script>