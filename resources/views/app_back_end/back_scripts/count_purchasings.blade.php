<script>

// $(function() {
//     startRefresh();
// });

// function startRefresh() {
//     setTimeout(startRefresh, 8000);
//     countPurchaseNotifications();
//     dropDownListOfPurchase();
// }

function countPurchaseNotifications(){
    $.ajax({
        url: "{{ url('/count-purchasings-notifications') }}",
        method: 'GET',
        cache: false,
        dataType: 'JSON',
        success: function(response){
            const nPurchase = response;
            $('.rd-p-count').text(nPurchase);
            if (nPurchase == 0){
                $('.rd-p-count').addClass('badge-light');
            } else {
                $('.rd-p-count').addClass('badge-danger');
                $('.rd-p-count').removeClass('badge-light');
            } 
        }
    });
}

function dropDownListOfPurchase(){
    $.ajax({
        url: "{{ url('/drop-down-list-of-purchasings-notifications') }}",
        method: 'GET',
        cache: false,
        success: function(html){
            $('.list-menu').html(html);
        }
    });
}

</script>