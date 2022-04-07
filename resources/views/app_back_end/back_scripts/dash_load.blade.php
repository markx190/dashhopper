<script>

    function dash_viewer(event){

        $('.main-d').html('<div class="row spinner-red-dash"><div class="col-md-12"><img class="displayed" src="/reddrop_back/dist/assets/img/ajax-loader-circle.gif" /></div>');  
        $('.dash-active').hide();
        $('.cards').hide();
        $('.charts').hide();

        setTimeout(dashHideSpinner, 1000);
    }

    function dashHideSpinner(){
        $('.spinner-red-dash').hide();
        $('.main-d').show();
        $('.dash-active').show();
        $('.cards').show();
        $('.charts').show();
    }

</script>