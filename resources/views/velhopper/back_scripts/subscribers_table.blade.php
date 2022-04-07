<script>

function viewListOfSubscribers(event){
    event.preventDefault();
        $.ajax({
        url: '{{ url("/manage-subscribers") }}',
        method: 'GET',
        cache: false,
        success: function(html){
            $('.main-d').html(html);
            $('.docs-body').hide();
            $('.docs-spinner').html('<div class="row spinner-red-docs"><div class="col-md-12"><img class="displayed" src="/reddrop_back/dist/assets/img/ajax-loader-circle.gif" /></div>');  
            setTimeout(loadSubscribersDataTable, 1000);
        }
    });
}

function loadSubscribersDataTable(){
    $('.spinner-red-docs').hide();
    $('.docs-body').show();
    $('#subscribers-table').DataTable().destroy();
        table = $('#subscribers-table').DataTable({
            "searching": true,
            "processing": false,
            "serverSide": false,
            "paginate": true,
            "responsive": false,
            "paging": true,
            "pageLength": 5,
            "ajax": {
                'url': '{{ url("/subscribers-datatables") }}',
                "data" : {
                    // "onlineFrom": fromVal,
                    // "onlineTo": toVal,
                    // "_token"	: "{{ csrf_token() }}"
	    		}
            },
            columnDefs: [
                { className: 'dt-body-center', targets: 3 },
                { targets: 3, orderable: false },
                { width: 80, targets: 0 },
                { width: 180, targets: 1 },
            ],
            
            columns:[
            {
                data: 'first_name',
                name: 'first_name'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'created_at',
                name: 'created_at'
            },
            {
                data: 'action',
                name: 'action'
            }
        ]
    });   
}

</script>