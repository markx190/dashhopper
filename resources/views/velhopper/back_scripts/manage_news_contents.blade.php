<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>

function manageNewsContents(event){
    event.preventDefault();
        $.ajax({
        url: '{{ url("/news-contents-table") }}',
        method: 'GET',
        cache: false,
        success: function(html){
            $('.main-d').html(html);
            $('.docs-body').hide();
            $('.docs-spinner').html('<div class="row spinner-red-docs"><div class="col-md-12"><img class="displayed" src="/reddrop_back/dist/assets/img/ajax-loader-circle.gif" /></div>');  
            setTimeout(loadNewsContentsDataTable, 1000);
        }
    });
}

    // function filterOnlineDriversByDate(event){
    //     event.preventDefault();
    //     const fromVal = $('.from-date').val();
    //     console.log('from: ', fromVal);
    //     const toVal = $('.to-date').val();
    //     console.log('to: ', toVal);

    //     $('#btnSearchTrip').attr('disabled', true);

    //     if (!fromVal){
    //         $('#from-text').text('Please fill in this field').css('color', '#CF000F');
    //     }

    //     if (!toVal){
    //         $('#to-text').text('Please fill in this field').css('color', '#CF000F');
    //     }
    //     $('#from-trip').bind('click', function(){
    //         $('#from-text').text('');
    //         $('#btnSearchTrip').attr('disabled', false);
    //     });
    //     $('#to-trip').bind('click', function(){
    //         $('#to-text').text('');
    //         $('#btnSearchTrip').attr('disabled', false);
    //     });

    //     loadOnlineDriversDataTable(fromVal, toVal);
    // }
    
function loadNewsContentsDataTable(){
    $('.spinner-red-docs').hide();
    $('.docs-body').show();
    $('#news-content-table').DataTable().destroy();
        table = $('#news-content-table').DataTable({
            "searching": true,
            "processing": false,
            "serverSide": false,
            "paginate": true,
            "responsive": false,
            "paging": true,
            "pageLength": 5,
            "ajax": {
                'url': '{{ url("/news-contents-datatable") }}',
                "data" : {
                    // "onlineFrom": fromVal,
                    // "onlineTo": toVal,
                    // "_token"	: "{{ csrf_token() }}"
	    		}
            },
            columnDefs: [
                { width: 10, targets: 0 },
                { width: 10, targets: 1 },
                { width: 10, targets: 2 },
                { width: 10, targets: 3 },
                { width: 10, targets: 4 },
                { width: 10, targets: 5 }
            ],
            
            columns:[
            {
                data: 'news_id_no',
                name: 'news_id_no'
            },
            {
                data: 'article_name',
                name: 'article_name'
            },
            {
                data: 'position',
                name: 'position'
            },
            {
                data: 'content_type',
                name: 'content_type'
            },
            {
                data: 'content_status',
                name: 'content_status'
            },
            {
                data: 'action',
                name: 'action'
            }
        ]
    });   
}

function addContents(hicIdNo, docsBtn, button){
    $('#addNewsContentsModal').modal('show');        
    
    $('.s-btn').html('<button id="add-docs-btn" type="submit" name="Submit" class="btn btn-success btn-sm pull-right s-btn">Submit</button>')
    $('#add-contents-form').on('submit', function(event){
        event.preventDefault();
        $('#add-news-btn').attr('disabled', true);

        const articleName = $('#add-contents-form input[name="article_name"]');
        const article_name = articleName.val();
        console.log('article: ', articleName);

        const contentLocation = $('.news-location').val();

        const contentType = $('#add-contents-form input[name="content_type"]');
        const content_type = contentType.val();
        
        const contentStatus = $('#add-contents-form input[name="content_status"]');
        const content_status = contentStatus.val();
        
        const createdBy = $('#add-contents-form input[name="created_by"]');
        const created_by = createdBy.val();

    if (!article_name){
        $('#a-article-text').text('Article Name is Required').css('color', '#D24D57');
        $('#add-news-btn').attr('disabled', true);
    }

    $('#add-article-name').bind('click', function(){
        $('#a-article-text').text('');
        $('#add-news-btn').attr('disabled', false);
    });

    if (!contentLocation){
        $('#a-location-text').text('Content Location is required').css('color', '#D24D57');
        $('#add-news-btn').attr('disabled', true);
    }

    $('#news-location').bind('click', function(){
        $('#a-location-text').text('');
        $('#add-news-btn').attr('disabled', false);
    });
        
    if (article_name && contentLocation) {
    $.ajax({
    url: "{{ url('/add-news-content') }}",
    method:"POST",
    data:new FormData(this),
    contentType: false,
    cache: false,
    dataType: 'JSON',
    processData: false,
    success:function(data)
    {
        console.log(data.errorStatus);
        // $('.alert-m').html('<div class="row"><div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> Document was uploaded</div></div></div>'); 
        // setTimeout(goTolistOfDocuments, 3000);
    }
        });
        }
    });
       
}